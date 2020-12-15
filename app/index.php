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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Indoor Navigation Server-</title>
    <!-- Bootstrap CSS file, along with other bootstrap and CSS files-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="adjustments.css">
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
                <a class="navbar-brand" href="#"><img src="logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#aboutUs">About Us</a></li>
                    <li><a href="mapCreator.php">Map Creator</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="navPicture1.png">
            <div class="carousel-caption">
                <h1>Indoor Navigation Server</h1>
                <br>
                <a href="mapCreator.php"><button type="button" class="btn btn-default">Create Map</button></a>
            </div>
            </div> <!--- End Active -->
            <div class="item">
                <img src="navPicture2.png">
                <div class ="carousel-caption">
                    <h1>On the go Directions inside of buildings</h1>
                </div>
            </div>
            <div class="item">
                <img src="navPicture3.jpg">
                <div class="carousel-caption">
                    <h1>Upload your own maps and bring your buildings to life with indoor navigation</h1>
                </div>
            </div>
        </div>
        <!--- Start Slider Controls-->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div> <!---- End of Slider -->

    <div class="container text-center">
        <h2>The Services We Used</h2>
        <div class="row">
            <div class="col-sm-4">
                <img src="html5.png" id="icon">
                <h4>HTML5</h4>
            </div>
            <div class="col-sm-4">
                <img src="bootstrap.png" id="icon">
                <h4>BootStrap</h4>
            </div>
            <div class="col-sm-4">
                <img src="css3.png" id="icon">
                <h4>CSS3</h4>
            </div>
        </div>
    </div>

    <div class="container text-lower" id="aboutUs">
        <div class="row">
            <div class="col-md-6">
                <a id="aboutUs"><h4>How we developed the Indoor Navigation Server....</h4></a>
                <p>The Indoor Navigation server was developed as a senior project by Andrew Stepp, Brendan Cielik, Yize Ma, Meihu Qin, Joe Prizlow, and Connor Madek.
                To developed the front end of the website that you are currently viewing, we used a combination of HTML, BootStrap, and CSS. The
                back end utilizes a MySQL database to store the user profiles and pictures uploaded by the users.
                </p>
                <p> The purpose of this application is to provide a navigation service to be used while inside buildlings to provide the fastest routes
                to various rooms and points of interest. The shortest path will be found using Dijkstra's algorithm to ensure the user is doing the least amount
                of walking required.
                </p>
            </div>
            <div class="col-md-6">
                <img src="logoOakland.png" class="img-responsive">
            </div>
        </div>
    </div>

    <!-- JS files: jQuery first, then Popper.js, then Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    -->
</body>
</html>
