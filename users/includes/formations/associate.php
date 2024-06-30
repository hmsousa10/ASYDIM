<?php
include '../../../includes/config.inc.php';
include '../../../includes/db.inc.php';
include '../../../includes/functions.inc.php';

@session_start();

$userID = $_SESSION['user']['id'];

$timezone = date_default_timezone_get("Europe/Lisbon");
$now = date('Y-m-d');

$formation = $_POST['formation'];

$formationsStatement = "SELECT * FROM formations WHERE id=$formation";
$formations = my_query($formationsStatement);

if(count($formations) <= 0) {
    echo "Formation is invalid";
    die();
}

$formationUsersStatement = "SELECT * FROM formation_users WHERE user_id=$userID AND formation_id=$formation";
$formationUsers = my_query($formationUsersStatement);

if(count($formationUsers) > 0) {
    echo "Formation already associated";
    die();
}

$statement = "INSERT INTO `formation_users`(`beginning_date`, `user_id`, `formation_id`) VALUES ('$now', $userID, $formation)";
$result = my_query($statement);

header('location: ' . $arrConfig['url_users'] . '/formations');