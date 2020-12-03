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
 
    <div class="mapCreator">

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
                        <button type="button" class="btn btn-default"><a href="newMap.php">Upload an Image</a></button>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <form action="./uploadBuilding.php" enctype="multipart/form-data" method="POST">
                        <label>Building Name </label>
                        <input type="text" name="Site_Name" id="Site_Name_id">
                        <br>
                        <label>Street Address </label>
                        <input type="text" name="Street_Address" id="Street_Address_id">
                        <br>
                        <label>City </label>
                        <input type="text" name="City_Name" id="City_Name_id">
                        <br>
                        <label>State </label>
                        <select name="State" id="State_id">
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                        <br>
                        <label>Postal Code </label>
                        <input type="text" name="Postal_Code" id="Postal_Code_Id">
                        <br>
                        <label>Number of Floors </label>
                        <input type="number" name="Floor_Count" id="Floor_Count_Id">
                        <input type="submit" value="Submit">
                        <br>
                        <br>
                        <br>

                <br>
                <br>
                <br>
            </div>
        </div>
    </div>

    </div>
</body>
</html>