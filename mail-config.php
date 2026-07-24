<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;

define('SMTP_HOST', 'smtp.office365.com');
define('SMTP_PORT', 587);
define('SMTP_SECURE', PHPMailer::ENCRYPTION_STARTTLS);
define('SMTP_USER', 'soue@ikasolution.com');
define('SMTP_PASS', 'Gedeonr9@@@');
define('SMTP_FROM', 'soue@ikasolution.com');
define('SMTP_FROM_NAME', 'IKA SOLUTION — Notifications');
define('MAIL_ADMIN_TO', 'soue@ikasolution.com');
