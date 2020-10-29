const canvas = document.querySelector('#canvas');

 // Context for the canvas for 2 dimensional operations 
 const context = canvas.getContext('2d');


function grid(url) {
        var img = new Image();
        var p = 10;
        var iWidth, iHeight;
        img.src = url;
        img.onload = function GetDim() {
            iWidth = this.width;
            iHeight = this.height;
            canvas.width = iWidth;
            canvas.height = iHeight;
            context.drawImage(img, 10, 10);

            /* for (var x = 0; x <= iWidth; x += 50) {
                context.moveTo(x + p, 0);
                context.lineTo(x + p, iHeight + p);
            }


            for (var x = 0; x <= iHeight; x += 50) {
                context.moveTo(0, 0.5 + x + p);
                context.lineTo(iWidth + p, 0.5 + x + p);
            }

            context.strokeStyle = "black";
            context.stroke(); */

            alert(iWidth + 'x' + iHeight);
        }
    }

grid("testpic.jpg");