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
 //   document.body.appendChild(a);
//    a.download = 'Completed_Map.json'; 
//    a.click();
//    document.body.removeChild(a);

    var getblob = new XMLHttpRequest();
    getblob.onreadystatechange = function() {
    	if (getblob.readyState == 4 && getblob.status == 200){
		console.log("got something");
    		console.log(getblob.response);
	}
    
    }
    getblob.open("GET", a.href, false);
    getblob.send();
		
    let reader = new FileReader();
    reader.readAsDataURL(file);
    var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if( xhr.readyState==4 && xhr.status==200 ) {
		console.log(xhr);
		}
	};  

    xhr.open("POST", '/uploadBlob.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var params = "fileName='"+path+"'&imageData='"+getblob.response+ "'";
    xhr.send(params);
    window.location.replace("index.php");
//    window.location.replace("index.php");

//    $.post("uploadBlob.php", {fileName: "TestingCm/MediaCenter.png", imageData: file})
//	.done(function(data) {
//		alert("Data Loaded: " + data);
//	}
//	);

//    $.ajax({
//            type: 'POST',
//            url: '/uploadBlob.php',
//            data: { name: "TestingCm/MediaCenter.png", imageData: file },
//            processData: false,
//            contentType: 'application/json',
//	    success: function(data) {
//	    alert("bwah");
//	    }
//        }).done(function(data) {
//            // print the output from the upload.php script
//		alert("maybeSuccess?");
//        });
});

