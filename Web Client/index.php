<?php
session_start(); //initialize session
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //check session status to confirm login
    header("location: login.php"); //not logged in? send to login page
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
</head>
<body>
    <div>
        <h1>congrats, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, you logged in without destroying the site</h1>
    </div>
    
    <h3>Im sorry these buttons are so ugly</h3>
    <p>
        <a href="reset_pass.php">Reset Your Password</a>
        <br>
        <br>
        <a href="logout.php">Sign Out of Your Account</a>
    </p>
</body>
</html>