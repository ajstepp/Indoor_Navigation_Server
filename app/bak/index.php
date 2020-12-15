<?php
session_start(); //initialize session
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //check session status to confirm login
	header("location: login.php"); //not logged in? send to login page
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
</head>
<body>


    <h2> Your Buildings </h2>

    <?php

		require_once "utils.php";
		$query = "SELECT * FROM Buildings WHERE	userName = '".$_SESSION["username"]."';";
		$Buildings = mysqli_query($link, $query);
		if(mysqli_num_rows($Buildings) > 0){
			while( $row = mysqli_fetch_array($Buildings)){
				echo '<div class="BuildingClass">';
				echo $row["siteName"];
				echo "<a href='newMap.php?building=".$row["id"]."'>[+]</a>";
				echo '<div class="FloorClass">';

					$floorQuery = "SELECT * FROM Maps WHERE buildingId = '".$row["id"]."';";
					$floors = mysqli_query($link, $floorQuery);
					if(mysqli_num_rows($floors) > 0) {
						while($j = mysqli_fetch_array($floors)){
							echo "<a href='routeBuilder.php?floor=".$j['fileName']."'><img src='/uploads/".$j["fileName"]."' height=300 width=300> </a><br>";

						}
					}
					echo '</div>';

					echo "</div>";
			}
		}
    ?>



    <p>
	<a href="newBuilding.html">Create a new Building</a>
<br>
<br><br>
	<br>
        <a href="reset_pass.php">Reset Your Password</a>
        <br>
        <a href="logout.php">Sign Out of Your Account</a>
    </p>
</body>
</html>
