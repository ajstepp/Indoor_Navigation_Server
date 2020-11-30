window.addEventListener('load', () => {});

document.getElementById('save').addEventListener('click', function () {
    // retrieve the canvas data
    
    var POI =JSON.stringify(Stored_Coordinates);
    // create a blob object representing the data as a JSON string
    var file2 = new Blob([POI], {
        type: 'application/json'
    });

    // trigger a click event on an <a> tag to open the file explorer
    var b = document.createElement('b');
    b.href = URL.createObjectURL(file2);
    b.download = 'Coords.json';
    document.body.appendChild(b);
    b.click();
    document.body.removeChild(b);
    alert ("X:" + Stored_Coordinates[0].x + "  Y:" + Stored_Coordinates[0].y);
});
