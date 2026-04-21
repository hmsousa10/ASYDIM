<?php
include "../../../includes/config.inc.php";
include "../../../includes/db.inc.php";
include "../../../includes/functions.inc.php";

@session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$id = $_SESSION["user"]["id"];
$cropped_image = $_POST["cropped_image"];
$image = $_FILES["image"];
$image_url = '';

if (!empty($cropped_image)) {
    $image_parts = explode(";base64,", $cropped_image);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $image_id = uniqid();
    $image_name = $image_id . '.' . $image_type;
    $upload_dir = $arrConfig['dir_site'] . '/assets/uploads/';
    $image_path = $upload_dir . $image_name;
    $image_url = $arrConfig['url_site'] . '/assets/uploads/' . $image_name;

    if (!file_put_contents($image_path, $image_base64)) {
        header("location: " . $arrConfig["url_users"] . "/account.php?error=1");
        exit;
    }
} else if ($image['size'] > 0) {
    // Generate a unique ID for the image
    $image_id = uniqid();
    $image_extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    $image_name = $image_id . '.' . $image_extension;

    // Validate and upload the image
    $upload_dir = $arrConfig['dir_site'] . '/assets/uploads/';
    $image_path = $upload_dir . $image_name;
    $image_url = $arrConfig['url_site'] . '/assets/uploads/' . $image_name;

    if (!move_uploaded_file($image["tmp_name"], $image_path)) {
        header("location: " . $arrConfig["url_users"] . "/account.php?error=1");
        exit;
    }
}

if ($image_url != '') {
    $statement = "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone', `image`='$image_url' WHERE id=" . $id;
} else {
    $statement = "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone' WHERE id=" . $id;
}

$user = my_query($statement);

if ($user) {
    $_SESSION["user"]["name"] = $name;
    $_SESSION["user"]["email"] = $email;
    $_SESSION["user"]["phone"] = $phone;
    if ($image_url != '') {
        $_SESSION["user"]["image"] = $image_url;
    }
    header("location: " . $arrConfig["url_users"] . "/account?success=1");
    exit;
} else {
    header("location: " . $arrConfig["url_users"] . "/account?error=1");
    exit;
}