<?php

if (!isset($_SESSION['user'])) {
    header('location: ' . $arrConfig['url_site'] . '/login.php');
    exit();
}

$role_id = my_query("SELECT role_id FROM users WHERE id = " . $_SESSION['user']['id'])[0]['role_id'];

$userrole = my_query("SELECT * FROM roles WHERE id = " . $role_id)[0];

if (intval($userrole['permission_level']) >= 25) {
    header('location: ' . $arrConfig['url_admin'] . '/index.php');
    exit();
}
