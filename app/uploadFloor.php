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
$targetDir = "/uploads/";
$targetFile = $_POST["fileName"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$buildingId = $_POST['hiddenBuildingId'];
$fullPath = $username."/".$targetFile.".png";
echo $fullPath;
if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "/var/www/html/Indoor_Navigation_Server/app/uploads/".$fullPath)){
	echo "File uploaded successfully";
}
else {
	echo "File upload failed";
}
$queryText = "INSERT INTO Maps(file, fileName, buildingId) VALUES(?, ?, ?);";
$stmt = mysqli_prepare($link, $queryText);
mysqli_stmt_bind_param($stmt, "sss", $file, $fullPath, $buildingId);
mysqli_stmt_execute($stmt);
mysqli_commit($link);
header("location: index.php");
?>
