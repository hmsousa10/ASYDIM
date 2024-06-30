<?php
include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

@session_start();

$id = $_GET["id"];

$name = $_POST["name"];
$slug = $_POST["slug"];
$duration = $_POST["duration"];

$description = $_POST["description"];

$beginning_date = $_POST["beginning_date"];
$end_date = $_POST["ending_date"];

$beginning_date_timestamp = strtotime($beginning_date);
$end_date_timestamp = 0;

if ($end_date != 0) {
    $end_date_timestamp = strtotime($end_date);
}

if ($end_date != "" && $end_date_timestamp <= $beginning_date_timestamp) {
    header(
        "location: " . $arrConfig["url_admin"] . "/formations/index.php?error=1"
    );
    return;
}

$slug = strtolower(trim($slug));
$slug = str_replace(" ", "-", $slug);

if ($end_date == "") {
    $statement = "UPDATE `formations` SET `name`='$name',`description`='$description',`beginning_date`='$beginning_date',`ending_date`=null, `slug`='$slug', `duration`=$duration WHERE id=$id";
} else {
    $statement = "UPDATE `formations` SET `name`='$name',`description`='$description',`beginning_date`='$beginning_date',`ending_date`='$end_date', `slug`='$slug', `duration`=$duration WHERE id=$id";
}

$formation = my_query($statement);

header(
    "location: " . $arrConfig["url_admin"] . "/formations/index.php?error=0"
);
