let fileUploadMessage = document.getElementById("fileUploadMessage");
let music = document.getElementById("music");

music.onclick = function ()
{
    fileUploadMessage.style.visibility = "visible";
}

music.onchange = function() {
    fileUploadMessage.innerText = "File uploaded successfully!";
    fileUploadMessage.style.color = "green";
}