<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Indoor Navigation Server-</title>
    <!-- Bootstrap CSS file, along with other bootstrap and CSS files-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src=ToJSON.js></script>
    <script src="Details.js"></script>
    <script src="CanvasInput.min.js"></script>
    <link rel="stylesheet" href="css/adjustments.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">About Us</a></li>
                    <li class="active"><a href="mapCreator.php">Map Creator</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container map-creator">
        <div class="row">
            <div class="col-lg-12 ">
                <h4>Select the action you would like to perform</h4>
                <div class="text-left">
                    <div class="btn-group-horizontal">
                        <!--
                        <button type="button" class="btn btn-default">
                            <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <input type="file" name="imgfile" />
                        </button>
                        -->
                        <button type="button" class="btn btn-default"><a href="newBuilding.php">Create a new Buildling</a></button>
                        <button type="button" class="btn btn-default"><a href="buildingViewer.php">View your Buildings</a></button>
                    </div>
                </div>

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
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>

</body>
</html>