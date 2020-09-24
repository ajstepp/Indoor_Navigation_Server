<?php
if (isset($_POST['signup-submit'])) {

    require 'dbh.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    #if (empty($username) || empty($email) || empty($password)) {
    #    header("Location: ../signup.html?error=emptyfields")
    #    exit();
    #}

    $sql = "SELECT username FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($dbConn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.html?error=sqlerror");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            header("Location: ../signup.html?error=username-in-use");
            exit();
        }
        else {

            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($dbConn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header ("Location: ../signup.html?error=sqlerror");
                exit();
            }
            else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.html?signup=success");
                exit();
            }

        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbConn);
}
else {
    header("Location: ../signup.html");
    exit();
}
?>