<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

define('APP_ROOT',__DIR__);
define('BASE_URL','http://localhost:81/proiect-tw/Proiect');
define('VIEW_ROOT',APP_ROOT . '/views');

require(__DIR__.'/db_const.php');

$db=new PDO('mysql:host='.DB_HOST.';dbname='.DB_USER, DB_NAME, DB_PASS);

require __DIR__.'/functions.php';
require_once VIEW_ROOT.'/template/template-functions.php';