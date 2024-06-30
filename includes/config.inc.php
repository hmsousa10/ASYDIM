<?php
@session_start();
global $arrConfig;

error_reporting(E_ALL);
if($_SERVER['HTTP_HOST'] == 'web.colgaia.local' || $_SERVER['HTTP_HOST'] == 'localhost') {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

$arrConfig['servername'] = 'localhost';
$arrConfig['username'] = 'root';
$arrConfig['password'] = '';
$arrConfig['dbname'] = 'asydim';

// isLoginKey - alterar a chave de codificação para o Backoffice
$arrConfig['isLoginKey'] = '';

// acessos FrontOffice
$arrConfig['url_site'] = 'http://localhost/PAP-main';
$arrConfig['dir_site'] = 'C:\xampp\htdocs\PAP-main';

// acessos BackOffice
$folderAdmin = 'admins';
$arrConfig['url_admin']=$arrConfig['url_site'].'/'.$folderAdmin;
$arrConfig['dir_admin']=$arrConfig['dir_site'].'/'.$folderAdmin;

// acessos BackOffice
$folderUser = 'users';
$arrConfig['url_users']=$arrConfig['url_site'].'/'.$folderUser;
$arrConfig['dir_users']=$arrConfig['dir_site'].'/'.$folderUser;

// caminhos Docs e/ou fotografias
$arrConfig['url_fotos']=$arrConfig['url_site'].'/upload';
$arrConfig['dir_fotos']=$arrConfig['dir_site'].'/upload';
$arrConfig['fotos_auth'] = array ('image/jpeg', 'image/jpg', 'image/png', 'image/gif');
$arrConfig['fotos_maxUpload'] = 3000000;

// caminhos Ficheiros
$arrConfig['files_auth'] = array ('application/pdf');
$arrConfig['files_maxUpload'] = 10000000;

// número de registo de página, para situações de paginação
$arrConfig['num_reg_pagina'] = 25;