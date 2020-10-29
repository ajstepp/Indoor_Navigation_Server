 window.addEventListener('load', () => {
     document.addEventListener("dblclick", mark);
     /*context.beginPath();
     context.rect(20, 20, 150, 100);
     context.stroke();*/
 });

 const canvas = document.getElementById('canvas');

 // Context for the canvas for 2 dimensional operations 
 const context = canvas.getContext('2d');


 let coord = {x: 0, y: 0};



 function mark(event) {
     getPosition(event);
     context.beginPath();
     context.rect(coord.x, coord.y, 30, 30);
     context.stroke();

     var input = new CanvasInput({
         canvas: document.getElementById('canvas'),
         x: coord.x,
         y: coord.y + 35,
         placeHolder: 'Enter area name here...'
     });

 }



 function getPosition(event) {
     coord.x = event.clientX - canvas.offsetLeft;
     coord.y = event.clientY - canvas.offsetTop;
 }
