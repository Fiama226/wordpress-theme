<?php
/**
 * Modèle de configuration SMTP — À COPIER en mail-config.php
 *
 *   cp mail-config.sample.php mail-config.php
 *
 * mail-config.php est ignoré par Git (.gitignore) : il ne doit JAMAIS
 * être versionné ni déployé depuis le dépôt.
 *
 * Sous WordPress, préférez le plugin « WP Mail SMTP » et déclarez les
 * identifiants dans wp-config.php plutôt que dans un fichier du thème.
 */

use PHPMailer\PHPMailer\PHPMailer;

define('SMTP_HOST',      'smtp.office365.com');
define('SMTP_PORT',      587);
define('SMTP_SECURE',    PHPMailer::ENCRYPTION_STARTTLS);
define('SMTP_USER',      'CHANGEME@example.com');
define('SMTP_PASS',      'CHANGEME');            // ne jamais committer la vraie valeur
define('SMTP_FROM',      'CHANGEME@example.com');
define('SMTP_FROM_NAME', 'IKA SOLUTION — Notifications');
define('MAIL_TO',        'CHANGEME@example.com');
