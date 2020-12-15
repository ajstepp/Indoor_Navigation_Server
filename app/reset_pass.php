<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){    //check login status, if not logged in send to login page
    header("location: login.php");
    exit;
}
 
require_once "utils.php"; //
 
// Define variables and initialize with empty values
$new_password = "";
$confirm_password = "";
$new_password_err = "";
$confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){   //using post method
 
    if(empty(trim($_POST["new_password"]))){    //trim new password of white space, then check to see if its empty
        $new_password_err = "Password cannot be empty";   //empty password error message 
    } elseif(strlen(trim($_POST["new_password"])) < 6){   //password charset less than arbitrary amount selected for testing 
        $new_password_err = "Password required to be 6 or more characters";     //error message for less than arbitrary amount
    } else{
        $new_password = trim($_POST["new_password"]);   //assign new password string to variable for compare
    }
    
    if(empty(trim($_POST["confirm_password"]))){    //trim confirmed password of white space, then check to see if its empty
        $confirm_password_err = "Dont forget to confirm your password";     //empty confirmed password error message 
    } else{
        $confirm_password = trim($_POST["confirm_password"]);   //assign confirmed password string to variable for compare
        if(empty($new_password_err) && ($new_password != $confirm_password)){   //test for password & confirmed password to match
            $confirm_password_err = "Password did not match.";
        }
    }
        

    if(empty($new_password_err) && empty($confirm_password_err)){   //make sure no errors exist
        $sql = "UPDATE users SET password = ? WHERE id = ?";    //skeleton update statement for password change
        
        if($stmt = mysqli_prepare($link, $sql)){    //make sure link exists to SQL server
            mysqli_stmt_bind_param($stmt, "si", $hash_password, $id);    //bind variables to sql statement 
            
            $id = $_SESSION["id"];
            $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            
            if(mysqli_stmt_execute($stmt)){     //attempt to run the statement created above
                session_destroy();  //new password stored, kill session
                header("location: login.php");  //reroute to login page
                exit();
            } else{
                echo "Something went wrong";    //an error exists within your SQL connection
            }

            mysqli_stmt_close($stmt);   //end the statement
        }
    }
    
    mysqli_close($link);    //end SQL server session 
}
?>
 
<!-- very basic display code to test PHP, will be replaced in the future with something that doesn't look so ugly -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <div>
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div>
                <label>New Password</label>
                <input type="password" name="new_password" value="<?php echo $new_password; ?>">
                <span><?php echo $new_password_err; ?></span>
            </div>
            <div>
                <label>Confirm Password</label>
                <input type="password" name="confirm_password">
                <span ><?php echo $confirm_password_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
                <a href="index.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>