<?php

// cancel.php
include '../../includes/config.inc.php';
include '../../includes/db.inc.php';

@session_start();

include $arrConfig['dir_site'] . "/users/userverification.php";

header('location: ../formations/index.php?canceled=1');
