<?php

//these are all local variables as they pertain to my local instance, please reconfigure to match the server before commiting
define('DB_SERVER', '10.20.0.2');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'NavPass!');
define('DB_NAME', 'csi4999');
 
//create connection to SQL database internally 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
//test if connection is successful or not (this error will appear upon submission of forms if failed)
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
