<?php
/**
 * Formulaire de contact — Ecofinconseils
 * Déploie ce fichier avec le contenu de dist/ sur LWS, puis exécute :
 *   composer require phpmailer/phpmailer
 * à la racine du site. Configure TO_EMAIL ci-dessous.
 */
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

// ——— Configuration : adresse qui reçoit les messages ———
const TO_EMAIL = 'contact@ecofinconseils.com';

// ——— Récupération et validation ———
$name    = isset($_POST['name'])    ? trim(strip_tags((string) $_POST['name']))    : '';
$email   = isset($_POST['email'])   ? trim((string) $_POST['email'])               : '';
$phone   = isset($_POST['phone'])   ? trim(strip_tags((string) $_POST['phone']))   : '';
$subject = isset($_POST['subject']) ? trim(strip_tags((string) $_POST['subject'])) : '';
$message = isset($_POST['message']) ? trim(strip_tags((string) $_POST['message'])) : '';

$errors = [];
if ($name === '') $errors[] = 'name';
if ($phone === '') $errors[] = 'phone';
if ($subject === '') $errors[] = 'subject';
if ($message === '') $errors[] = 'message';
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'email';

if (count($errors) > 0) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Validation failed', 'fields' => $errors]);
    exit;
}

// Limite de longueur pour éviter abus
if (strlen($name) > 200 || strlen($phone) > 50 || strlen($subject) > 300 || strlen($message) > 10000) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid length']);
    exit;
}

$autoload = __DIR__ . '/vendor/autoload.php';
if (!is_file($autoload)) {
    http_response_code(503);
    echo json_encode([
        'ok' => false,
        'error' => 'Server not configured. Run: composer require phpmailer/phpmailer'
    ]);
    exit;
}

require $autoload;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$fromEmail = $email !== '' ? $email : TO_EMAIL;
$bodyEmailLine = $email !== '' ? "Email : $email" : "Email : (non renseigné)";

$mail = new PHPMailer(true);
try {
    // LWS : envoi via mail() PHP (pas de SMTP à configurer)
    $mail->isMail();
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->setFrom($fromEmail, $name);
    $mail->addAddress(TO_EMAIL);
    if ($email !== '') {
        $mail->addReplyTo($email, $name);
    }
    $mail->Subject = '[Ecofinconseils] ' . $subject;
    $mail->Body    = "Nom : $name\n$bodyEmailLine\nTéléphone : $phone\n\nMessage :\n$message";
    $mail->AltBody = "Nom : $name\n$bodyEmailLine\nTéléphone : $phone\n\nMessage :\n$message";

    $mail->send();
    echo json_encode(['ok' => true]);
} catch (Exception $e) {
    error_log('Contact form: ' . $mail->ErrorInfo);
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Send failed']);
}
