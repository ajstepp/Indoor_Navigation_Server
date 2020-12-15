window.addEventListener('load', () => {});


const Fetched_Coordinates = new Array();
const divided = new Array();
const PWW = new Array(1, 3, 6); //REPLACE THIS WITH READING NODE VALUES FROM THE WRITE.TXT FILE

function To_Coord(locations) {
    var parsed = locations.split(' ');

    for (var i = 0; i < parsed.length - 1; i += 2) {
        Fetched_Coordinates.push(new coordinate(parsed[i], parsed[i + 1]));
    }
}




function sketch() {

    for (var i = 0; i < PWW.length; i++) {
        //alert(Fetched_Coordinates[i]);

        context.beginPath(); //start path

        context.lineWidth = 5; //set line width for paint

        context.lineCap = 'square'; //set edge cap style

        context.strokeStyle = 'blue'; //set line color

        context.moveTo(Fetched_Coordinates[PWW[i]].x, Fetched_Coordinates[PWW[i]].y); //move to coordinates

        context.lineTo(Fetched_Coordinates[PWW[i+1]].x, Fetched_Coordinates[PWW[i+1]].y); //draw line to new mouse point

        context.stroke(); //fill this line
    }
}


function coordinate(x, y) {
    this.x = x;
    this.y = y;
}
