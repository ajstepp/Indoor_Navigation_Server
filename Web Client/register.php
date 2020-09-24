<?php
require_once "utils.php";  //call configuration file for SQL server authentication
 
//create variables
$username = "";
$password = ""; 
$confirm_password = "";
$username_err = "";
$password_err = "";
$confirm_password_err = "";
 
// specifies method of request
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){    //trim off white space from potential username, validate if there is any data within field
        $username_err = "No username entered";  //error message, left blank
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";   //prepare SQL statement for future use
        
        if($stmt = mysqli_prepare($link, $sql)){    //test connection to SQL server
            mysqli_stmt_bind_param($stmt, "s", $username);    //bind variables as perameters 
            
            if(mysqli_stmt_execute($stmt)){ //attempt SQL statement
                mysqli_stmt_store_result($stmt);    //capture results
                
                if(mysqli_stmt_num_rows($stmt) == 1){ //value returns 1, username is already taken
                    $username_err = "Username is taken";    //error message for taken username
                } else{
                    $username = trim($_POST["username"]);   //trim white space off of username
                }
            } else{
                echo "something went wrong";    //connection to SQL server failed, check variable/table/database names
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){    //trim off white space from potential password, validate if there is any data within field
        $password_err = "Enter a password";     //error mesesage if no password entered   
    } elseif(strlen(trim($_POST["password"])) < 6){     //check password length, currently arbitrary, may force special characters
        $password_err = "Password must have atleast 6 characters";  //error message if password does not meet above requirements
    } else{
        $password = trim($_POST["password"]);   //trim white space out of password and submit it? 
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){    //trim off white space from pass confirmation, validate if data exists
        $confirm_password_err = "Please confirm password";  //error message if field is blank
    } else{
        $confirm_password = trim($_POST["confirm_password"]);   //assign confirmed pass to variable after trim
        if(empty($password_err) && ($password != $confirm_password)){   //confirm no empty field, but non matching password
            $confirm_password_err = "Password did not match";  //error message for mismatch password
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){ //check to make sure no errors exist
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)"; //create insert statement 
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $username, $hash_password);  //bind variables to insert statement
            
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt)){     //execute statement and check to see if it worked
                header("location: login.php");  //it worked, redirected to login, attempt to authenticate with new credentials
            } else{
                echo "Something went wrong. Please try again later";    //SQL statement failed    
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link); //end connection to SQL server
}
?>


<!--barebones HTML as proof of working PHP-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Create Account</title>
</head>
    
<body>
    <div class="loginbox">
        <h2>Create Account</h2>
        <p>Create credentials</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span style ="color:red;"> <!--Error set to red for easy identification-->
                    <br>
                    <?php echo $username_err; ?>
                </span>
            </div>
            
            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span style ="color:red;"> <!--Error set to red for easy identification-->
                    <?php echo $password_err; ?>
                </span>
            </div>
            
            <div>
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                <span><?php echo $confirm_password_err; ?></span>
            </div>
            
            <div>
                <input type="submit" value="Create Account">
                <input type="reset" value="Reset Form">
            </div>
            
            <p>Already a member? <a href="login.php">Login here</a></p>
        </form>
    </div>    
</body>
</html>