<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<canvas id="canvas"></canvas>
<div>
    <fieldset>
        <label for="first">Start:</label>
        <input id="num1" type="number" name="first">
        <br>
        <label for="second">End:</label>
        <input id="num2" type="number" name="second">
        <br>
        <input id="Calc" type="button" value="Find Shortest Path" name="solve" onclick="FindPath()">
        <br>
        <br>
        <label for="result">Shortest Path: </label>
        <input id="res" type="Text" READONLY name="result">
    </fieldset>
</div>

<?php
	$fileName = $_GET['floor'];
	echo "<input id='floor' value='".$fileName."' type='hidden'>";
?>

<script>
    var canvas = document.querySelector('canvas');
    var context = canvas.getContext('2d');
    var reader = new FileReader();
    var iWidth, iHeight, blob;

    var imagesrc = document.getElementById('floor').value;

    var blobReq = new XMLHttpRequest();
    blobReq.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
		blob = blobReq.responseText;
		console.log(blob);
            let params = new URLSearchParams(location.search);
            const path = params.get('floor');
        }
    };

    blobReq.open("GET", "getMapBlob.php?fileName=" + imagesrc, true);
    blobReq.send();


    // this function executes when the contents of the file have been fetched
    blobReq.onload = function() {
        var MapText = blob.split('\n');
        var locations = MapText[1];

        //Strip out the "Node Name" portion of the string since the numbers might interfere 
        for (var k = 0; k < 20; k++) {
            var CheckName = "Node " + k;
            locations = locations.replaceAll(CheckName, "");
        }

        locations = locations.substring(15); //jump over some useless text left over

        locations = locations.replaceAll(/[^0-9\.]+/g, " "); //remove everything that isnt numerical data, separating with comma

        To_Coord(locations); //call To_Coord from Connect.JS to turn leftover string into coordinates for mapping

        var data = JSON.parse(MapText[0]); //read JSON so that it will remove deliminations not readable
        var image = new Image(); //create new image object

        //upon image loading, this function creates the canvas object that we will paste the image onto
        image.onload = function() {
            context.clearRect(0, 0, canvas.width, canvas.height);
            iWidth = this.width;
            iHeight = this.height;
            canvas.width = iWidth;
            canvas.height = iHeight;

            context.drawImage(image, 0, 0); // draw the saved canvas
            sketch(); //call sketch to create shortest path data
        }
        image.src = data.image; // data.image contains the data URL
    };

</script>

<script src="Connect.JS"></script>


</html>
