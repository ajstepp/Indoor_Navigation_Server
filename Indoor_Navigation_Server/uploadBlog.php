<?php
include_once("utils.php");
$fileName = $_POST['fileName'];
$data = $_POST['data'];
$query = "UPDATE Maps SET BlobData = '".$data."' WHERE fileName = '".$fileName."';";
echo $query;
#if (mysqli_query($link, )){
#	header("location: index.php");
#}

?>
