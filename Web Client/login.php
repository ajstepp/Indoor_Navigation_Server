<?php
// Create session
session_start();
 
// Check if session is already created, if so, reroute to index
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
require_once "utils.php";   //utilities to connect to DB
 
// create variables
$username =""; 
$password = "";
$username_err = "";
$password_err = "";
 
// use method post for form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // check if a username has been entered
    if(empty(trim($_POST["username"]))){    //trim white space out
        $username_err = "No username entered";   //errror message if no username entered
    } else{
        $username = trim($_POST["username"]);   //trimmed to remove white space, string assigned to variable 
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){    //trim white space out
        $password_err = "No password entered";  //error message if no password entered
    } else{
        $password = trim($_POST["password"]);   //trimmed to remove white space, string assigned to variable
    }
    
    // validate login
    if(empty($username_err) && empty($password_err)){   //make sure no error messages are present
        $sql = "SELECT id, username, password FROM users WHERE username = ?";   //sql outline for future use
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $username);
            
            if(mysqli_stmt_execute($stmt)){     // Attempt to execute the prepared statement
                mysqli_stmt_store_result($stmt);    // Stores result of statement
                
                if(mysqli_stmt_num_rows($stmt) == 1){   //checks existance of username                
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);   //bind resulted variables
                    if(mysqli_stmt_fetch($stmt)){   //make sure username exists 
                        if(password_verify($password, $hashed_password)){   //verify entered password matches stored
                            session_start();    //authentication verified, start session
                            
                            $_SESSION["loggedin"] = true;   //session is now logged in and attached to instance
                            $_SESSION["id"] = $id;  //pull id from database, attach to instance
                            $_SESSION["username"] = $username;  //pull username from database, attach to instance                            
                            header("location: index.php");    //move session to index page
                            
                            /* is this too much? do we not want something more generic? */
                        } else{
                            $password_err = "Invalid Password";     //add statement to error string
                        }
                    }
                    
                    /* is this too much? do we not want something more generic? */
                } else{
                    $username_err = "Invalid Username";  //display error message for username  
                }
            } else{
                echo "Something went wrong";    //statement could not execute, make sure variables/table/database has not been renamed
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);    //break connection to SQL server
}
?>
 
<!-- very basic display code to test PHP, will be replaced in the future with something that doesn't look so ugly -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="style.css">
    <title>Indoor Nav Login</title>
</head>
<body>
    <div class="loginbox">
        <img src="avatar.png" class="avatar">
        <h2>Please login to indoor navigation server</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span style="color:red";> <!--error color read, fast to identify-->
                    <br> 
                    <?php echo $username_err; ?>
                </span>
            </div>
            <br>
            <div>
                <label>Password</label>
                <input type="password" name="password">
                <span style ="color:red;"> <!--error color read, fast to identify-->
                    <br> 
                    <?php echo $password_err; ?>
                </span>
            </div>
            <br>
            <br>
            <div>
                <input type="submit" value="Login">
            </div>
            <p>Need an account? <a href="register.php">Sign Up</a></p>
        </form>
    </div>    
</body>
</html>
