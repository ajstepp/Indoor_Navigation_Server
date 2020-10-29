// wait for the content of the window element 
// to load, then performs the operations. 
// This is considered best practice. 
window.addEventListener('load', ()=>{ 
		
	document.addEventListener('mousedown', startPainting); 
	document.addEventListener('mouseup', stopPainting); 
	document.addEventListener('mousemove', sketch); 

}); 
	
const canvas = document.querySelector('#canvas'); 

// Context for the canvas for 2 dimensional operations 
const context = canvas.getContext('2d'); 
	
// Stores the initial position of the cursor 
let coord = {x:0 , y:0}; 

// This is the flag that we are going to use to 
// trigger drawing 
let paint = false; 
	
// Updates the coordianates of the cursor when 
// an event e is triggered to the coordinates where 
// the said event is triggered. 
function getPosition(event){ 
coord.x = event.clientX - canvas.offsetLeft; 
coord.y = event.clientY - canvas.offsetTop; 
} 

// The following functions toggle the flag to start 
// and stop drawing 
function startPainting(event){ 
paint = true; 
getPosition(event); 
} 
function stopPainting(){ 
paint = false; 
} 
	
function sketch(event){ 
if (!paint) return; 
context.beginPath(); 
	
context.lineWidth = 10; 

// Sets the end of the lines drawn 
// to a round shape. 
context.lineCap = 'square'; 
	
context.strokeStyle = 'red'; 
	
// The cursor to start drawing 
// moves to this coordinate 
context.moveTo(coord.x, coord.y); 

// The position of the cursor 
// gets updated as we move the 
// mouse around. 
getPosition(event); 

// A line is traced from start 
// coordinate to this coordinate 
context.lineTo(coord.x , coord.y); 
	
// Draws the line. 
context.stroke(); 
} 

