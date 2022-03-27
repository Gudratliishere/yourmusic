var wavesurfer = WaveSurfer.create({
    container: '#waveform',
    waveColor: 'violet',
    progressColor: 'purple',
    barWidth: 4,
    height: 90,
    responsive: true,
    hideScrollBar: true,
    barRadius: 4
});

wavesurfer.load('Velet - UYAN Ft Canbay & Wolker.mp3');

var playButton = document.getElementById("playButton");
var stopButton = document.getElementById("stopButton");
var volumeButton = document.getElementById("volumeButton");

playButton.onclick = function() {
    wavesurfer.playPause();
    if (wavesurfer.isPlaying())
        playButton.src = "image/pause_button.png";
    else
        playButton.src = "image/play_button.png";
}

stopButton.onclick = function() {
    wavesurfer.stop();
    playButton.src = "image/play_button.png";
}

volumeButton.onclick = function() {
    wavesurfer.toggleMute();
    if (volumeButton.src.includes("volume_down.png"))
        volumeButton.src = "image/volume_up.png";
    else
        volumeButton.src = "image/volume_down.png";
}

wavesurfer.on('finish', function() {
    playButton.src = "image/play_button.png";
    wavesurfer.stop();
});

var time = document.getElementById("time");

wavesurfer.on('audioprocess', function() {
    var currentTime = wavesurfer.getCurrentTime();
    var seconds = (Math.floor(currentTime) % 60 < 10) ?
        '0' + Math.floor(currentTime) % 60 : Math.floor(currentTime) % 60;
    time.innerHTML = '0' + Math.floor(Math.floor(currentTime) / 60) + ':' + seconds;
});