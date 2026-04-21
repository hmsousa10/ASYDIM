<?php
include '../includes/config.inc.php';
session_destroy();
header('location: ' . $arrConfig['url_site'] . '/login.php');
exit();
