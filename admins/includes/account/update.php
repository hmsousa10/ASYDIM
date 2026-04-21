<?php
include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

@session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$id = $_SESSION["admins"]["id"];

$statement =
    "UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE id=" .
    $id;
$user = my_query($statement);

unset($_SESSION["admin"]);
header("location: " . $arrConfig["url_admin"] . "/index.php");
