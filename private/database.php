<?php
define('DB_NAME', 'db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
$string = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
if(!$connection = new PDO($string,DB_USER,DB_PASS))
{
    die("Failed to connect");
}