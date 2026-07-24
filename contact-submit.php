<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/mail-config.php';

function post_value(string $key): string
{
  return trim((string) ($_POST[$key] ?? ''));
}

function clean_line(string $value): string
{
  return trim(str_replace(["\r", "\n"], ' ', $value));
}

function h(string $value): string
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function redirect_with_status(string $status, string $message)
{
  $redirect = post_value('redirect');
  if ($redirect === '' || preg_match('/^https?:\/\//i', $redirect)) {
    $redirect = 'index.php#contact';
  }

  $fragment = '';
  $hashPosition = strpos($redirect, '#');
  if ($hashPosition !== false) {
    $fragment = substr($redirect, $hashPosition);
    $redirect = substr($redirect, 0, $hashPosition);
  }

  $separator = strpos($redirect, '?') !== false ? '&' : '?';
  header('Location: ' . $redirect . $separator . http_build_query([
    'mail' => $status,
    'notice' => $message,
  ]) . $fragment);
  exit;
}

function make_mailer(): PHPMailer
{
  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();
  $mail->Host = SMTP_HOST;
  $mail->SMTPAuth = true;
  $mail->Username = SMTP_USER;
  $mail->Password = SMTP_PASS;
  $mail->SMTPSecure = SMTP_SECURE;
  $mail->Port = SMTP_PORT;
  $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);

  return $mail;
}

function send_html_mail(string $to, string $toName, string $subject, string $html, string $text, ?string $replyTo = null, ?string $replyToName = null): void
{
  $mail = make_mailer();
  $mail->addAddress($to, $toName);

  if ($replyTo !== null && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
    $mail->addReplyTo($replyTo, $replyToName ?: $replyTo);
  }

  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $html;
  $mail->AltBody = $text;
  $mail->send();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  redirect_with_status('error', 'Méthode non autorisée.');
}

$type = clean_line(post_value('type') ?: 'contact');
$name = clean_line(post_value('nom'));
$phone = clean_line(post_value('telephone'));
$email = clean_line(post_value('email'));
$need = clean_line(post_value('besoin'));
$solution = clean_line(post_value('solution') ?: post_value('solution_label'));
$article = clean_line(post_value('article'));
$message = post_value('message');
$page = clean_line(post_value('page'));

if ($name === '' || $email === '' || $message === '') {
  redirect_with_status('error', 'Veuillez renseigner votre nom, votre email et votre message.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  redirect_with_status('error', 'Veuillez renseigner une adresse email valide.');
}

$labels = [
  'contact' => 'Formulaire de contact',
  'solution' => 'Demande solution IKA',
  'comment' => 'Commentaire actualité',
];

$label = $labels[$type] ?? 'Formulaire site web';
$contextRows = array_filter([
  'Besoin' => $need,
  'Solution' => $solution,
  'Article' => $article,
  'Page' => $page,
], static fn ($value) => $value !== '');

$adminRows = array_merge([
  'Nom' => $name,
  'Email' => $email,
  'Téléphone' => $phone,
], $contextRows);

$rowsHtml = '';
$rowsText = '';
foreach ($adminRows as $rowLabel => $rowValue) {
  if ($rowValue === '') {
    continue;
  }
  $rowsHtml .= '<tr><td style="padding:8px 12px;font-weight:700;color:#0d4a7e;">' . h($rowLabel) . '</td><td style="padding:8px 12px;color:#334155;">' . nl2br(h($rowValue)) . '</td></tr>';
  $rowsText .= $rowLabel . ': ' . $rowValue . "\n";
}

$adminSubject = '[IKA SOLUTION] ' . $label . ' - ' . $name;
$adminHtml = '<div style="font-family:Arial,sans-serif;color:#0f172a;line-height:1.6;">'
  . '<h2 style="color:#0d4a7e;">Nouveau message reçu</h2>'
  . '<table style="border-collapse:collapse;background:#f8fafc;border-radius:12px;overflow:hidden;">' . $rowsHtml . '</table>'
  . '<h3 style="margin-top:24px;color:#e51a37;">Message</h3>'
  . '<div style="white-space:pre-line;background:#ffffff;border:1px solid #e2e8f0;border-radius:12px;padding:16px;">' . h($message) . '</div>'
  . '</div>';
$adminText = "Nouveau message reçu\n\n" . $rowsText . "\nMessage:\n" . $message;

$userSubject = 'Nous avons bien reçu votre message';
$userHtml = '<div style="font-family:Arial,sans-serif;color:#0f172a;line-height:1.6;">'
  . '<h2 style="color:#0d4a7e;">Bonjour ' . h($name) . ',</h2>'
  . '<p>Nous avons bien reçu votre message et l’équipe IKA SOLUTION vous répondra dans les meilleurs délais.</p>'
  . '<p style="margin-top:20px;font-weight:700;color:#e51a37;">Récapitulatif de votre demande</p>'
  . '<div style="white-space:pre-line;background:#f8fafc;border-radius:12px;padding:16px;">' . h($message) . '</div>'
  . '<p style="margin-top:20px;">IKA SOLUTION LTD</p>'
  . '</div>';
$userText = "Bonjour $name,\n\nNous avons bien reçu votre message et l'équipe IKA SOLUTION vous répondra dans les meilleurs délais.\n\nVotre message:\n$message\n\nIKA SOLUTION LTD";

try {
  send_html_mail(MAIL_ADMIN_TO, 'IKA SOLUTION', $adminSubject, $adminHtml, $adminText, $email, $name);
  send_html_mail($email, $name, $userSubject, $userHtml, $userText);
  redirect_with_status('success', 'Votre message a bien été envoyé.');
} catch (Exception $exception) {
  error_log('Erreur envoi email IKA SOLUTION: ' . $exception->getMessage());
  redirect_with_status('error', 'Le message n’a pas pu être envoyé. Veuillez réessayer.');
}
