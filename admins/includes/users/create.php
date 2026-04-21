<?php

// ============================================================
// ASYDIM — Create User (Admin)
// ============================================================

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

if (session_status() === PHP_SESSION_NONE) session_start();
include $arrConfig['dir_site'] . "/admins/adminverification.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit();
}

$name  = trim($_POST['name']  ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$role  = (int)($_POST['role'] ?? 0);

// --- Validation ---
if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: " . $arrConfig["url_admin"] . "/users/create.php?error=2");
    exit();
}

$role_query = my_query("SELECT * FROM roles WHERE id = ?", [$role]);
if (empty($role_query)) {
    header("location: " . $arrConfig["url_admin"] . "/users/create.php?error=1");
    exit();
}

// Check for duplicate email
$existing = my_query("SELECT id FROM users WHERE email = ?", [$email]);
if (!empty($existing)) {
    header("location: " . $arrConfig["url_admin"] . "/users/create.php?error=3");
    exit();
}

// Generate a secure temporary password (no 9-char limit problem here)
$generated_password = generate_password(12);
$hashed_password    = password_hash($generated_password, PASSWORD_BCRYPT);

$result = my_query(
    "INSERT INTO users (name, email, phone, password, role_id) VALUES (?, ?, ?, ?, ?)",
    [$name, $email, $phone, $hashed_password, $role]
);

if (!$result) {
    header("location: " . $arrConfig["url_admin"] . "/users/create.php?error=4");
    exit();
}

// Send welcome email (non-fatal if it fails)
try {
    send_welcome_email($name, $email, $generated_password, $arrConfig);
} catch (Exception $e) {
    error_log("Welcome email failed for $email: " . $e->getMessage());
}

header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=0");
exit();

// ===========================================

function generate_password(int $length = 12): string
{
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%';
    $result = '';
    $max = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $result .= $chars[random_int(0, $max)];
    }
    return $result;
}

function send_welcome_email(string $name, string $email, string $password, array $arrConfig): void
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;
    $mail->Host       = $arrConfig['smtp_host']     ?? 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Port       = $arrConfig['smtp_port']     ?? 2525;
    $mail->Username   = $arrConfig['smtp_user']     ?? '';
    $mail->Password   = $arrConfig['smtp_password'] ?? '';
    $mail->setFrom($arrConfig['smtp_from'] ?? 'hi@asydim.pt', 'ASYDIM');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Bem-vindo à ASYDIM!';
    $mail->isHTML(true);
    $mail->Body    = generate_email_body($name, $password);
    $mail->AltBody = "Olá $name,\n\nA sua conta foi criada com sucesso.\nPassword temporária: $password\n\nAtenciosamente,\nASYDIM";
    $mail->send();
}

function generate_email_body(string $name, string $password): string
{
    return "<!DOCTYPE html>
<html lang='pt'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Bem-vindo à ASYDIM</title>
</head>
<body style='font-family: DM Sans, Arial, sans-serif; background:#f4faf7; margin:0; padding:0;'>
    <div style='max-width:600px; margin:40px auto; background:white; border-radius:16px; overflow:hidden; box-shadow:0 4px 24px rgba(0,0,0,0.08);'>
        <div style='background:linear-gradient(135deg,#071a12,#0d2818); padding:32px 40px; text-align:center;'>
            <h1 style='font-family:Syne,Arial,sans-serif; color:#00c96d; margin:0; font-size:2rem;'>ASYDIM</h1>
            <p style='color:rgba(240,253,246,0.6); margin:8px 0 0; font-size:0.95rem;'>Consultoria e Formação Sustentável</p>
        </div>
        <div style='padding:40px;'>
            <h2 style='font-family:Syne,Arial,sans-serif; color:#071a12; margin-top:0;'>Olá, $name!</h2>
            <p style='color:#5a7d6a; line-height:1.7;'>A sua conta na plataforma ASYDIM foi criada com sucesso. Utilize as credenciais abaixo para iniciar sessão.</p>
            <div style='background:#f4faf7; border:1px solid rgba(0,201,109,0.15); border-radius:12px; padding:24px; margin:24px 0;'>
                <p style='margin:0 0 8px; color:#5a7d6a; font-size:0.9rem;'>Password temporária:</p>
                <p style='margin:0; font-size:1.4rem; font-weight:700; color:#071a12; letter-spacing:0.05em;'>$password</p>
            </div>
            <p style='color:#5a7d6a; line-height:1.7;'>Recomendamos que altere a sua password após o primeiro acesso.</p>
            <p style='color:#5a7d6a; margin-bottom:0;'>Atenciosamente,<br><strong style='color:#071a12;'>Equipa ASYDIM</strong></p>
        </div>
        <div style='background:#f4faf7; padding:16px 40px; text-align:center; border-top:1px solid rgba(0,201,109,0.1);'>
            <p style='color:#7c9a8e; font-size:0.8rem; margin:0;'>&copy; " . date('Y') . " ASYDIM. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>";
}
