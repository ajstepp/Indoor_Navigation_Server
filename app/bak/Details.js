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

function coordinate(name, x, y) {
    this.name = name;
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
     var check = Stored_Coordinates.length;
     //call CanvasInput.min.js input function to create a new textbox under the rect in canvas
     var input = new CanvasInput({
         canvas: document.getElementById('canvas'), //get canvas object
         x: coord.x - 75, //center on x
         y: coord.y + 20, // drop below rect on y
         value: 'Node ' + check, //placeholder text

     });
     var name = input._value;
     //var parsed = name.split("value:");
     //alert(name.toString());
     Stored_Coordinates.push(new coordinate(name, coord.x, coord.y));

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

