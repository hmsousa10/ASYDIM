<?php
include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

@session_start();

$id = $_GET["id"];

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$role = $_POST["role"];

$role_query = my_query("SELECT * FROM roles WHERE id = $role");

if ($role_query <= 0) {
    header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=1");
    return;
}

if ($name == "" || $email == "") {
    header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=2");
    return;
}

$statement = "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone', `role_id`=$role WHERE id = $id";
$query = my_query($statement);

header("location: " . $arrConfig["url_admin"] . "/users/index.php?error=0");
