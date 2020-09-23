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
    <title>Welcome</title>
</head>
<body>
    <div>
        <h1>congrats, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, you logged in without destroying the site</h1>
    </div>
    
    <h3>THE BUTTONS BELOW CURRENTLY DO NOT WORK. CLICKING THEM WILL DO NOTHING</h3>
    <p>
        <a href="reset-password.php">Reset Your Password</a>
        <br>
        <a href="logout.php">Sign Out of Your Account</a>
    </p>
</body>
</html>