<?php
declare(strict_types=1);

// Receiving mailbox.
$receiving_email_address = 'mostafa.habibi6010@gmail.com';

// Use a sender on your own hosting domain to avoid SPF/DMARC rejections.
$site_from_email = 'no-reply@yourdomain.com';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  exit('Method Not Allowed');
}

// Optional AJAX check to match the template behavior.
$is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower((string) $_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if (!$is_ajax) {
  http_response_code(400);
  exit('Invalid request');
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$subject = trim((string) ($_POST['subject'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

if ($name === '' || $email === '' || $subject === '' || $message === '') {
  http_response_code(400);
  exit('All fields are required.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(400);
  exit('Please provide a valid email address.');
}

// Basic header-injection prevention.
$invalid_header_chars = array("\r", "\n", "%0a", "%0d");
foreach (array($name, $email, $subject) as $field) {
  foreach ($invalid_header_chars as $char) {
    if (stripos($field, $char) !== false) {
      http_response_code(400);
      exit('Invalid input detected.');
    }
  }
}

$safe_name = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$safe_email = htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$safe_subject = htmlspecialchars($subject, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$safe_message = htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

$mail_subject = 'Portfolio Contact: ' . $safe_subject;
$mail_body = "You received a new message from your portfolio contact form.\n\n"
  . "Name: {$safe_name}\n"
  . "Email: {$safe_email}\n"
  . "Subject: {$safe_subject}\n\n"
  . "Message:\n{$safe_message}\n";

$headers = array(
  'MIME-Version: 1.0',
  'Content-Type: text/plain; charset=UTF-8',
  'From: Mostafa Portfolio <' . $site_from_email . '>',
  'Reply-To: ' . $safe_name . ' <' . $safe_email . '>',
  'X-Mailer: PHP/' . phpversion(),
);

$sent = mail($receiving_email_address, $mail_subject, $mail_body, implode("\r\n", $headers));

if ($sent) {
  // The JS expects exact "OK" to show success.
  exit('OK');
}

http_response_code(500);
exit('Message could not be sent. Please try again later.');
?>
