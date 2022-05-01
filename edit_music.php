<?php
session_start();
if (!$_SESSION['id'])
    header("Location: account.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Music | Edit Music</title>
    <link rel="stylesheet" href="css/edit_music.css">
</head>

<body>
    <?php include 'private/header.php';
    include 'dao/music_dao.php';
    include 'entity/music.php';
    $music_id = $_GET['id'];
    if (!empty($music_id))
    {
        $dao = new MusicDao();
        $music = $dao->find_by_id($music_id);
        if ($music->user != $_SESSION['id'])
            header("Location: listening.php?id=" . $music_id);
    }
    ?>
    <div class="container edit-music-container">
        <div class="blur">
            <div class="music">
                <form action="private/save_music.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="music_id" value="<?=$music_id?>">
                    <input type="text" placeholder="Music name" name="name" value="<?=$music->name?>" required>
                    <input type="file" accept="audio/*" id="music" name="path">
                    <label for="music">Upload music</label>
                    <span id="fileUploadMessage">Uploading file...</span>
                    <textarea id="lyrics" rows="17" name="lyrics" required><?=$music->lyrics?></textarea>
                    <div class="submit"><input type="submit" value="Save"></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script src="js/edit_music.js"></script>