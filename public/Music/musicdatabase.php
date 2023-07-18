<?php
//database connectivity credentials
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbsearch";
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno())
{
    die("Database connection failed " . mysqli_connect_error() . "(" .mysqli_connect_errno() . ")");
}
?>