<?php
global $arrConfig;

// Safe session start — only if a session hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Show errors locally, hide in production
if (in_array($_SERVER['HTTP_HOST'] ?? '', ['web.colgaia.local', 'localhost'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// --- Database ---
$arrConfig['servername'] = 'localhost';
$arrConfig['username']   = 'root';
$arrConfig['password']   = '1234';
$arrConfig['dbname']     = 'asydim';

// --- SMTP (Mailtrap sandbox — update for production) ---
$arrConfig['smtp_host']     = 'sandbox.smtp.mailtrap.io';
$arrConfig['smtp_port']     = 2525;
$arrConfig['smtp_user']     = '1bf61c5d6a9dc4';
$arrConfig['smtp_password'] = '331882c3b34f92';
$arrConfig['smtp_from']     = 'hi@asydim.pt';

// isLoginKey - alterar a chave de codificação para o Backoffice
$arrConfig['isLoginKey'] = '';

// acessos FrontOffice
$arrConfig['url_site'] = 'http://localhost:8000';
$arrConfig['dir_site'] = __DIR__ . '/..';

// acessos BackOffice
$folderAdmin = 'admins';
$arrConfig['url_admin'] = $arrConfig['url_site'] . '/' . $folderAdmin;
$arrConfig['dir_admin'] = $arrConfig['dir_site'] . '/' . $folderAdmin;

// acessos BackOffice
$folderUser = 'users';
$arrConfig['url_users'] = $arrConfig['url_site'] . '/' . $folderUser;
$arrConfig['dir_users'] = $arrConfig['dir_site'] . '/' . $folderUser;

// caminhos Docs e/ou fotografias
$arrConfig['url_fotos'] = $arrConfig['url_site'] . '/upload';
$arrConfig['dir_fotos'] = $arrConfig['dir_site'] . '/upload';
$arrConfig['fotos_auth'] = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif');
$arrConfig['fotos_maxUpload'] = 3000000;

// caminhos Ficheiros
$arrConfig['files_auth'] = array('application/pdf');
$arrConfig['files_maxUpload'] = 10000000;

// número de registo de página, para situações de paginação
$arrConfig['num_reg_pagina'] = 25;

$stripe = [
    'publishable_key' => 'pk_test_51PYs9lKoFazggkS5ypPbBb6wPi4iMUYuX8AMC8E611rCRsysqHXM3lPmx6R5xyNRuIrEiNePqC8TGmYdrAa6dlmb000cn72SZx',
    'secret_key' => 'sk_test_51PYs9lKoFazggkS5qthAX7LD4WZVLio96Ok9Lr92A60dzvVnVXIcIKjEwLQFHfu02S010kalNPmaD7JElb6ycask00V5vBDIBX',
];