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
    $music_id = $_POST['music_id'];
    $name = $_POST['name'];
    $path = $_POST['path'];
    $lyrics = $_POST['lyrics'];
    ?>
    <div class="container edit-music-container">
        <div class="blur">
            <div class="music">
                <form action="private/save_music.php" method="post">
                    <input type="hidden" name="music_id" value="<?=$music_id?>">
                    <input type="text" placeholder="Music name" name="name" value="<?=$name?>" required>
                    <input type="file" accept="audio/*" id="music" name="path" required>
                    <label for="music">Upload music</label>
                    <span id="fileUploadMessage">File uploaded successfully!</span>
                    <textarea id="lyrics" rows="17" name="lyrics" required><?=$lyrics?></textarea>
                    <div class="submit"><input type="submit" value="Save"></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script src="js/edit_music.js"></script>