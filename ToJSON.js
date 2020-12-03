window.addEventListener('load', () => {});

document.getElementById('save').addEventListener('click', function () {
    // retrieve the canvas data
    var canvasContents = canvas.toDataURL(); // a data URL of the current canvas image
    var data = {
        image: canvasContents,
        date: Date.now()
    };
    var string = JSON.stringify(data);

    // create a blob object representing the data as a JSON string
    var file = new Blob([string], {
        type: 'application/json'
    });

    // trigger a click event on an <a> tag to open the file explorer
    var a = document.createElement('a');
    a.href = URL.createObjectURL(file);
    a.download = 'data.json';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
});
