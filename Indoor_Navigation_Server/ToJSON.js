window.addEventListener('load', () => {});

document.getElementById('save').addEventListener('click', function () {
    // retrieve the canvas data
    var canvasContents = canvas.toDataURL(); // a data URL of the current canvas image
    var data = {
        image: canvasContents,
        date: Date.now()
    };
    
    var map = JSON.stringify(data);
    var map = map + "\n";
    
    var points = "";
    
    for (var i=0; i<Stored_Coordinates.length;i++) {
        points += JSON.stringify(Stored_Coordinates[i]);
        points += "\t";
    }
    // create a blob object representing the data as a JSON string
    var file = new Blob([map, points], {
        type: 'application/json',
    });
    
    // trigger a click event on an <a> tag to open the file explorer
    var a = document.createElement('a');
    a.href = URL.createObjectURL(file);
    a.download = 'Completed_Map.json';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
});
