<?php
require_once "utils.php";
$fileName = $_GET['fileName'];
$organization = $_SESSION['organization'];
$queryText = "SELECT blobData from Maps WHERE fileName ='".$fileName."';";
$resp = mysqli_query($link, $queryText);
$pattern = '/\s*/m';
$replace = '';
while ( $row = mysqli_fetch_array($resp, MYSQLI_BOTH) ) {

    echo $row['blobData'];


	
}

?>
