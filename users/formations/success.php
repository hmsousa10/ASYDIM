<?php
// success.php
include '../../includes/config.inc.php';
include '../../includes/db.inc.php';

@session_start();

include $arrConfig['dir_site'] . "/users/userverification.php";

$userID = $_SESSION['user']['id'];
$formationID = $_GET['formation_id'];

$statement = "INSERT INTO formation_users (user_id, formation_id, approved) VALUES ($userID, $formationID, 1)";
$query = my_query($statement);

header('location: ../formations/index.php?success=1');
