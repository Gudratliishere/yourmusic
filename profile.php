<?php
session_start();
if (!$_SESSION['id'] && empty($_GET['id']))
    header('Location: account.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Music | Your profile</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>

<body>
<?php include 'private/header.php';
include 'dao/user_dao.php';
include 'dao/music_dao.php';
include 'entity/user.php';
include 'entity/music.php';
include 'private/util.php';
?>
<div class="container profile-container">
    <div class="profile-card">
        <div class="profile-photo">
            <?php
            $id = null;
            if (!empty($_GET['id']))
                $id = $_GET['id'];
            else
                $id = $_SESSION['id'];
            $dao = new UserDao();
            $user = $dao->find_user_by_id($id);
            ?>
            <img src="<?php if ($user->photo == null || $user->photo == '') echo 'image/default_pp.jpg';
            else echo 'data:image/jpg;base64,' . base64_encode($user->photo); ?>" alt="Profile photo" id="pp">
            <?php if ($id == $_SESSION['id']) { ?>
            <a href="edit_profile.php"><img src="image/edit.png"></a> <?php }?>
        </div>
        <h1><?= $user->name ?> <br class="break"><?= $user->surname ?></h1>
        <div class="rating-user">
            <?php
            make_rating($user->rate, $user->rate_count);
            ?>
        </div>
        <span>Shared musics: <?= $user->shared_musics ?></span>
        <?php if ($id == $_SESSION['id']) { ?>
            <button class="logout" id="logout">Log out</button> <?php } ?>
    </div>
    <div class="last-posts">
        <h2>Last musics</h2>
        <?php $music_dao = new MusicDao();
        $musics = $music_dao->find_all_by_user($id);
        foreach ($musics as $music) { ?>
            <a href="listening.php?id=<?= $music->id ?>">
                <div class="row">
                    <img src="image/music-logo.png" alt="" class="music-logo">
                    <span><?= $music->name ?></span>
                    <div class="rating">
                        <?php make_rating($music->rate, $music->rate_count); ?>
                    </div>
                </div>
            </a>
        <?php } ?>

        <div class="paging">
            <span>1</span>
            <span>2</span>
        </div>
    </div>
</div>
</body>

</html>

<script src="js/profile.js"></script>