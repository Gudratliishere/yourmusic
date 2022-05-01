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
<?php include 'private/header.php';
include 'dao/music_dao.php';
include 'dao/user_dao.php';
include 'entity/music.php';
$music = null;
$user_name = null;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $music_dao = new MusicDao();
    $user_dao = new UserDao();
    $music = $music_dao->find_by_id($id);
    $user_name = $user_dao->find_user_full_name($music->user);
}
?>
<div class="container listening-container">
    <div class="blur">
        <div class="music">
            <img src="image/music-logo.png" class="music-logo">
            <?php if ($music == null) echo '<span class="music-not-found">Music not found! :(</span>';
            else { ?>
                <span id="path" style="display: none"><?= $music->path ?></span>
                <div class="info">
                    <a class="user-name" href="profile.php?id=<?= $music->user ?>"><h1><?= $user_name ?></h1></a>
                    <div class="music-name">
                        <h3><?= $music->name ?></h3>
                        <div class="rating">
                            <?php include 'private/util.php';
                            make_rating($music->rate, $music->rate_count); ?>
                        </div>
                        <span id="publish-date"><?= $music->publish_date ?></span>
                    </div>
                    <div id="waveform" class="wave"></div>
                    <div class="music-info">
                        <div class="controls">
                            <img src="image/play_button.png" id="playButton" alt="Play">
                            <img src="image/stop_button.png" id="stopButton" alt="Pause">
                            <img src="image/volume_up.png" id="volumeButton" alt="Volume">
                        </div>
                        <div class="time" id="time"></div>
                    </div>
                </div>
                <?php if ($music->user == $_SESSION['id']) { ?>
                    <div class="user-edit">
                        <form action="edit_music.php?id=<?= $music->id ?>" method="post">
                            <input type="submit" value="Edit" id="edit">
                        </form>
                        <form action="private/delete_music.php?id=<?= $music->id ?>" method="post" id="delete_form">
                        </form>
                        <input type="submit" value="Delete" id="delete">
                    </div>
                <?php }
            } ?>
        </div>

        <form action="/" method="get" class="giving-rate" style="display: none">
            <span>Rate this music!</span>
            <input type="range" name="rate" id="">
            <input type="hidden" name="music" value="">
            <input type="hidden" name="user" value="">
            <input type="submit" value="Ok" min="0" max="10">
        </form>

        <div class="lyrics">
            <pre><?= $music->lyrics ?></pre>
        </div>
    </div>
</div>
</body>

</html>

<script src="js/listening.js"></script>