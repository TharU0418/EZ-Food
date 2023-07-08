<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ez_food";

$db = mysqli_connect($servername, $username, $password, $dbname);

if (!$db) {
    die("FAILED!!!" . mysqli_connect_errno());
}
