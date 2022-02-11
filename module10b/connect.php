<?php

$user = "root";
$password = "";
$host = "localhost";

$DBConnection = mysqli_connect($host, $user, $password);

if ($DBConnection === FALSE) {
    die("DB connection failed due to " . mysqli_error($DBConnection) . ".");
}

$select = mysqli_select_db($DBConnection, 'candidates');

if ($select === FALSE){
    die("DB connection failed due to " . mysqli_error($DBConnection) . ".");
}

?>