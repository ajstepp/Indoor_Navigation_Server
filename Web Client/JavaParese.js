function calc(url) {
    var img = new Image(), iwdith, height;
    var iWidth, iHeight;
    img.src = url; 
    img.onload = function GetDim() {
        iWidth = this.width;
        iHeight = this.height;

        alert(iWidth + 'x' + iHeight);
    }

    return (iHeight, iWidth);

}

calc("avatar.png");
