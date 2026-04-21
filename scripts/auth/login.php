<?php

// ============================================================
// ASYDIM — Authentication Script
// ============================================================

include '../../includes/config.inc.php';
include '../../includes/db.inc.php';
include '../../includes/functions.inc.php';

session_start();

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die('Método não permitido.');
}

$email    = trim($_POST['email']   ?? '');
$password = trim($_POST['password'] ?? '');

// --- Input validation ---
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['auth_error'] = 'E-mail inválido.';
    header('location: ' . $arrConfig['url_site'] . '/login.php');
    exit();
}

if (empty($password)) {
    $_SESSION['auth_error'] = 'Por favor insira a sua password.';
    header('location: ' . $arrConfig['url_site'] . '/login.php');
    exit();
}

if (strlen($password) > 72) {
    // bcrypt silently truncates at 72 bytes; explicitly reject to avoid confusion
    $_SESSION['auth_error'] = 'Password demasiado longa.';
    header('location: ' . $arrConfig['url_site'] . '/login.php');
    exit();
}

// --- Look up user by email (parameterised) ---
$users = my_query("SELECT * FROM users WHERE email = ?", [$email]);

if (empty($users) || !password_verify($password, $users[0]['password'])) {
    // Generic message — don't reveal whether email exists
    $_SESSION['auth_error'] = 'Credenciais inválidas.';
    header('location: ' . $arrConfig['url_site'] . '/login.php');
    exit();
}

$user = $users[0];

// --- Session regeneration to prevent session fixation ---
session_regenerate_id(true);
$_SESSION['user'] = $user;

// --- Role-based redirect ---
$role = my_query("SELECT * FROM roles WHERE id = ?", [(int)$user['role_id']]);

if (empty($role)) {
    session_destroy();
    $_SESSION['auth_error'] = 'Erro interno. Contacte o administrador.';
    header('location: ' . $arrConfig['url_site'] . '/login.php');
    exit();
}

$role = $role[0];

// Lower permission_level = higher privilege (Root=10, Admin=20, Tutor=30, Student=40)
if ((int)$role['permission_level'] <= 20) {
    header('location: ' . $arrConfig['url_admin'] . '/index.php');
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'register-formation') {
    header('location: ' . $arrConfig['url_users'] . '/formations/associate.php');
    exit();
}

header('location: ' . $arrConfig['url_users'] . '/index.php');
exit();
