<?php
session_start();
if(isset $_SESSION['id']){
require_once "utils.php";
$file = $_POST['file'];
$fileName = $_POST['fileName'];
$organization = $_SESSION['organization'];
$queryText = "INSERT INTO Maps(file, fileName, Organization) VALUES(? ? ?)";
if($stmt = mysqli_prepare($link, $queryText)){

	mysqli_stmt_bind_param("sss", $file, $fileName, $organization);
	mysqli_stmt_execute($stmt);
	mysqli_commit($link);

}

else {
	header("location: login.php");
}
?>
