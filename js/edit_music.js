var fileUploadMessage = document.getElementById("fileUploadMessage");
var music = document.getElementById("music");

music.onchange = function() {
    fileUploadMessage.style.visibility = "visible";
}