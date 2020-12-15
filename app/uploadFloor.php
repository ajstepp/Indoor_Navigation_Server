<?php
require_once "utils.php";
if (empty($_FILES)){
	header("location: index.php");

}
#find the username associated with the phpsessid
$query = "SELECT username from users WHERE sess_cookie = '".$_COOKIE["PHPSESSID"]."' LIMIT 1;";
$resp = mysqli_query($link, $query);
if(mysqli_num_rows($resp) > 0){
	while($row = mysqli_fetch_assoc($resp)){
		$username = $row["username"];
	}
		
}
$targetFile = $_POST["fileName"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$buildingId = $_POST['hiddenBuildingId'];
$fullPath = $username."/".$targetFile.".png";
if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "/var/www/html/Indoor_Navigation_Server/app/uploads/".$fullPath)){
	echo "File uploaded successfully";
}
else {
	echo "File upload failed";
}
$queryText = "INSERT INTO Maps(fileName, buildingId) VALUES('".$fullPath."',".$buildingId.");";
echo $queryText;
$resp = mysqli_query($link, $queryText);
header("location: buildingViewer.php");
?>
