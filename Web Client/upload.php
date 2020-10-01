<?php
session_start();
if(isset $_SESSION['id']){
require_once "utils.php";
$file = $_POST['file'];
$fileName = $_POST['fileName'];
$organization = $_SESSION['organization'];
$queryText = "INSERT INTO Maps(file, fileName, Organization) VALUES(? ? ?)";
if($stmt = $mysqli.prepare($queryText)){

	$stmt.bind_param("sss", $file, $fileName, $organization);
	$stmt.execute();

}

else {
	header("location: login.php");
}
?>
