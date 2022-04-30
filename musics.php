<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Music | Musics</title>
    <link rel="stylesheet" href="css/musics.css">
</head>

<body>
    <?php include 'private/header.php';
    include 'dao/music_dao.php';
    include 'dao/user_dao.php';
    include 'entity/music.php';
    include 'private/util.php';

    $music_dao = new MusicDao();
    $user_dao = new UserDao();
    $musics = $music_dao->find_all();
    ?>
    <div class="container musics-container">
        <div class="blur">
            <div class="musics">
                <div class="head">
                    <h2>Last musics</h2>
                    <a href="edit_music.php" class="add-music">Add music</a>
                </div>
                <!-- rows -->
                <?php foreach ($musics as $music) { ?>
                <a href="listening.php?id=<?=$music->id?>">
                    <div class="row">
                        <img src="image/music-logo.png" class="music-logo">
                        <div class="music-name">
                            <h4><?=$user_dao->find_user_full_name($music->user)?></h4>
                            <span><?=$music->name?></span>
                        </div>
                        <div class="rating">
                            <?php make_rating($music->rate, $music->rate_count);?>
                        </div>
                        <span><?=$music->publish_date?></span>
                    </div>
                </a>
                <?php } ?>

                <div class="paging">
                    <span>1</span>
                    <span>2</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>