<?php

include '../../includes/config.inc.php';
include '../../includes/db.inc.php';
include '../../includes/functions.inc.php';

@session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if(strlen(trim($email)) == 0) {
    echo "Invalid email.";
    die();
}

if(strlen($password) == 0 || strlen($password) > 9) {
    echo $password;

    echo "Invalid password.";
    die();
}

$users = my_query("SELECT * FROM users WHERE email = '$email';");

if(count($users) == 0) {
    echo "Couldn't find user.";
    die();
}

if(!password_verify($password, $users[0]["password"])) {
    echo "Couldn't find user.";
    die();
}

$_SESSION['user'] = $users[0];

$statement = "SELECT * FROM roles WHERE id=" . $users[0]['role_id'];
$role = my_query($statement)[0];

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

if($role['permission_level'] <= 30 && strpos($referer, 'admins') !== false) {
    header('location: ' . $arrConfig['url_admin'] . '/index.php');
    return;
}

header('location: ' . $arrConfig['url_users'] . '/index.php');