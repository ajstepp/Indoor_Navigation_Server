<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="CanvasInput.min.js"></script>
<canvas id="canvas" width = "100" height="100"></canvas> <!-- create canvas object -->
<div>
<button id="save">Save</button></div> <!-- create save button -->

<script>
    //function to take an image and press it onto a canvas dynamically
function loadImage(url) {
        var canvas = document.getElementById('canvas'); //get canvas object pointer
        var context = canvas.getContext('2d'); //add context of canvas

        var img = new Image(); //create image object
        var iWidth, iHeight; //variables for dimensions of image
        img.src = url; //set image source URL
        img.onload = function GetDim() { //forces image to load, then run GetDim() function
            iWidth = this.width; //get width
            iHeight = this.height; //get height
            canvas.width = iWidth; //set canvas width
            canvas.height = iHeight; //set canvas height
            context.drawImage(img, 0, 0); //draw image onto canvas

        }
    }


    //this is a floor plan


	let params = new URLSearchParams(location.search);
	const path = params.get('floor');
        loadImage("/uploads/" + path);

</script>

<script src=ToJSON.js></script>
<!--script that allows for saving to JSON file -->

<script src="Details.js"></script>
<!--script that allows for adding POI and drawing -->

</html>

