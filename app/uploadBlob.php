<?php
include_once "utils.php";
$fileName = $_POST['fileName'];
$data = $_POST['imageData'];
$query = "UPDATE Maps SET BlobData = ".$data." WHERE fileName = ".$fileName.";";
if(mysqli_query($link, $query)){
	echo $query;

}
else {
	echo "killme";
	var_dump($link);
}

?>


