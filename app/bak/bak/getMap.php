<?php
require_once "utils.php";
$fileName = $_GET['fileName'];
echo $fileName;
$organization = $_SESSION['organization'];
$queryText = "SELECT file from Maps WHERE fileName ='".$fileName."';";
$resp = mysqli_query($link, $queryText);
while ( $row = mysqli_fetch_array($resp, MYSQLI_BOTH) ) {
	echo $row['file'];
}

?>
