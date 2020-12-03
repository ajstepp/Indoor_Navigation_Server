<?php
session_start();
$_SESSION = array();    //reset session variables
session_destroy();  //end session
header("location: login.php");  //send back to login page
exit;
?>