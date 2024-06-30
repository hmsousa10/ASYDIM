<?php
include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

$id = $_GET["id"];

if ($id == null) {
    header("location: ../../formations/index.php");
}

$statement = "SELECT * FROM formation_users WHERE id=" . $id;
$formation = my_query($statement);

if (count($formation) == 0) {
    header("location: ../../formations/index.php");
    return;
}

$nextState = 0;
$formation = $formation[0];

if ($formation["approved"] == 0) {
    $nextState = 1;
} else {
    $nextState = 0;
}

$statement =
    "UPDATE formation_users SET `approved`=" . $nextState . " WHERE id=" . $id;
$updatedFormation = my_query($statement);

header(
    "location: ../../formations/show.php?id=" .
        $formation["formation_id"] .
        "&error=0"
);
