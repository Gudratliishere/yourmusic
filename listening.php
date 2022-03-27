<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Music | Listening</title>
    <link rel="stylesheet" href="css/listening.css">
    <script src="https://unpkg.com/wavesurfer.js"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container listening-container">
        <div class="blur">
            <div class="music">
                <img src="image/music-logo.png">
                <div class="info">
                    <h1>Name Surname</h1>
                    <div class="music-name">
                        <h3>Music Name</h3>
                        <div class="rating">
                            <img src="image/star.png" alt="">
                            <img src="image/star.png" alt="">
                            <img src="image/star.png" alt="">
                            <img src="image/star-half.png" alt="">
                            <img src="image/star-empty.png" alt="">
                        </div>
                        <span>23.03.2020</span>
                    </div>
                    <div id="waveform" class="wave"></div>
                    <div class="music-info">
                        <div class="controls">
                            <img src="image/play_button.png" id="playButton">
                            <img src="image/stop_button.png" id="stopButton">
                            <img src="image/volume_up.png" id="volumeButton">
                        </div>
                        <div class="time" id="time"></div>
                    </div>
                </div>
                <div class="user-edit">
                    <form action="edit_music.php" method="get">
                        <input type="submit" value="Edit" id="edit">
                    </form>
                    <form action="delete_music.php" method="post">
                        <input type="submit" value="Delete" id="delete">
                    </form>
                </div>
            </div>

            <form action="/" method="get" class="giving-rate">
                <span>Rate this music!</span>
                <input type="range" name="rate" id="">
                <input type="hidden" name="music" value="">
                <input type="hidden" name="user" value="">
                <input type="submit" value="Ok" min="0" max="10">
            </form>

            <div class="lyrics">
                <pre>
                    Hiçbi' dert yara değil
                    Kendin ol, para değil
                    Büyü de bi' yana git
                    Dünya sana mı kalır it?
                    Fiyakalı araba
                    Rollie, Gucci, Prada
                    3'ü de bi' arada
                    Godaman da para var
                    Ki yatırır tufada
                    Denedim olmadı her günüm ayrı bi' leş
                    Sana mı kaldı bu dünya yok hayrına denk gelünya yok hayrına denk gel
                    Hayat herkese farklı bir renk
                    Beni de alma hedef ederim aklına cenk
                    Kara para getir adına okul yap
                    Sana demediler mi "Kadına dokunma?"
                    12'de gelin ama çok uzak okul lan
                    Neyin peşindesin oğlum neyle zorun var?
                </pre>
            </div>
        </div>
    </div>
</body>

</html>

<script src="js/listening.js"></script>