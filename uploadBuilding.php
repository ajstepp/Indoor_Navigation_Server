<?php

require_once "utils.php";
$site_name = $_POST["Site_Name"];
$address = $_POST["Street_Address"]." ".$_POST["City_Name"]." ".$_POST["State"]." ".$_POST["Postal_Code"];
$floor_count = $_POST["Floor_Count"];
$query = "SELECT username from users WHERE sess_cookie = '".$_COOKIE["PHPSESSID"]."' LIMIT 1;";
$resp = mysqli_query($link, $query);
if(mysqli_num_rows($resp) > 0){
	while($row = mysqli_fetch_assoc($resp)){
		$username = $row["username"];
	}
}
$queryText = "INSERT INTO Buildings(siteName, floorCount, userName,address) VALUES(?, ?, ?, ?);";
echo $queryText;
$stmt = mysqli_prepare($link, $queryText);
mysqli_stmt_bind_param($stmt, "ssss", $site_name, $floor_count, $username, $address);
mysqli_stmt_execute($stmt);
mysqli_commit($link);
header("location: index.php");





#$query = "INSERT INTO Buildings(siteName, floorCount, userName,address) VALUES(".$site_name.",".$floor_count.",".$username.",".$address.");";
#echo $query;
?>
