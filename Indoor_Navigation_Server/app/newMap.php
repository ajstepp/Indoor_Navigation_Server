<!DOCTYPE HTML>
<html>

	<head>
		<title>Testing file upload</title>
	</head>

	<body>
		<form action="./uploadFloor.php" enctype="multipart/form-data" method="POST">
			<label>File name </label>
			<input type="text" value="fileName" name="fileName">
			<br>
			<label>File</label>
			<input type="file"  name="fileUpload" accept="image/png, image/jpeg" id="fileUpload">
			<br>
<?php
			echo '<input type="hidden" name="hiddenBuildingId" value="'.$_GET["building"].'">';

?>
			<input type="submit" value="Submit">
		</form>

	</body>





</html>
