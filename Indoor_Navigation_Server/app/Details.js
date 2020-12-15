
window.addEventListener('load', () => { //event listener to make sure window loads before loading tools
     document.addEventListener("dblclick", mark); //if double click, call mark
     document.addEventListener('mousedown', startPainting); //if click and hold, start painting
     document.addEventListener('mouseup', stopPainting); //when release, stop painting
     document.addEventListener('mousemove', sketch); //follow the line and draw it
 });

 const canvas = document.getElementById('canvas'); //get canvas object

 const context = canvas.getContext('2d'); //assign canvas context

 const Stored_Coordinates = new Array();
 //set initial coordinates
 let coord = {
     x: 0,
     y: 0
 };

function coordinate(x, y) {
    this.x = x;
    this.y = y;
}
//function to create POI on canvas
 function mark(event) {
     getPosition(event); //call the getPosition method to find out where the click is
     context.beginPath(); //navigate to path
     context.rect(coord.x - 15, coord.y - 15, 30, 30); //draw a rectangle outline of the clicked location
     context.strokeStyle = 'black'; //make color of rectangle black
     context.lineWidth = 1; //thin line width
     context.stroke(); //draw this rectangle
     Stored_Coordinates.push(new coordinate(coord.x, coord.y));
     var check = Stored_Coordinates.length - 1;
     //alert ("X:" + Stored_Coordinates[check].x + "  Y:" + Stored_Coordinates[check].y);
     //call CanvasInput.min.js input function to create a new textbox under the rect in canvas
     var input = new CanvasInput({
         canvas: document.getElementById('canvas'), //get canvas object
         x: coord.x - 75, //center on x
         y: coord.y + 20, // drop below rect on y
         placeHolder: 'Enter area name here..' //placeholder text
     });

 }function coordinate(x, y) {
    this.x = x;
    this.y = y;
}
//function to create POI on canvas
 function mark(event) {
     getPosition(event); //call the getPosition method to find out where the click is
     context.beginPath(); //navigate to path
     context.rect(coord.x - 15, coord.y - 15, 30, 30); //draw a rectangle outline of the clicked location
     context.strokeStyle = 'black'; //make color of rectangle black
     context.lineWidth = 1; //thin line width
     context.stroke(); //draw this rectangle
     Stored_Coordinates.push(new coordinate(coord.x, coord.y));
     var check = Stored_Coordinates.length - 1;
     //alert ("X:" + Stored_Coordinates[check].x + "  Y:" + Stored_Coordinates[check].y);
     //call CanvasInput.min.js input function to create a new textbox under the rect in canvas
     var input = new CanvasInput({
         canvas: document.getElementById('canvas'), //get canvas object
         x: coord.x - 75, //center on x
         y: coord.y + 20, // drop below rect on y
         placeHolder: 'Enter area name here..' //placeholder text
     });

 }

let paint = false; //initially set the paint functions to off

//function to get current coordinates on the canvas
 function getPosition(event) {
     coord.x = event.clientX - canvas.offsetLeft;
     coord.y = event.clientY - canvas.offsetTop;
 }

//function to begin the drawing process
 function startPainting(event) {
     paint = true;
     getPosition(event);
 }

//function to stop the painting process
 function stopPainting() {
     paint = false;
 }
//function to actually paint line of mouse
 function sketch(event) {
     if (!paint) return; //if paint is false, do nothing
     context.beginPath(); //start path

     context.lineWidth = 10; //set line width for paint

     context.lineCap = 'square'; //set edge cap style

     context.strokeStyle = 'red';//set line color

     context.moveTo(coord.x, coord.y);//move to coordinates


     getPosition(event);//find out where the mouse has moved

     context.lineTo(coord.x, coord.y);//draw line to new mouse point

     context.stroke(); //fill this line
  }
