<?php

@session_start();

include '../../../includes/config.inc.php';
include '../../../includes/db.inc.php';
include '../../../includes/functions.inc.php';

$evaluation = $_POST['evaluation'];
$testimony = $_POST['testimony'];

$user = $_SESSION['user'];

if(trim($testimony) == "") {
    echo "Invalid testimony";
    die();
}

$statement = "INSERT INTO `testimonies`(`name`, `email`, `testimony`, `evaluation`) VALUES ('" . $user['name'] . "','" . $user['email'] . "','" . $testimony . "'," . $evaluation . ")";
$result = my_query($statement);

header('location: ' . $arrConfig['url_users'] . '/');
