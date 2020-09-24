<?php

$servername = "localhost";
$dBUsername = "root";
$dBpassword =  "";
$dBName = "NavServer";

$dbConn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBName);

if (!$dbConn) {
    die("Connection failed: ".mysqli_connect_error());
}