<?php
session_start();
if (!$_SESSION['id'])
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
<?php include 'private/header.php'; ?>
<div class="container profile-container">
    <div class="profile-card">
        <div class="profile-photo">
            <?php
            include 'dao/user_dao.php';
            include 'entity/user.php';
            $dao = new UserDao();
            $user = $dao->find_user_by_id($_SESSION['id']);
            ?>
            <img src="<?php if ($user->photo == null || $user->photo == '') echo 'image/default_pp.jpg';
            else echo 'data:image/jpg;base64,' . base64_encode($user->photo); ?>" alt="Profile photo" id="pp">
            <a href="edit_profile.php">Edit</a>
        </div>
        <h1><?= $user->name ?><br><?= $user->surname ?></h1>
        <div class="rating-user">
            <?php
            include 'private/util.php';
            make_rating($user->rate, $user->rate_count);
            ?>
        </div>
        <span>Shared musics: <?= $user->shared_musics ?></span>
        <button class="logout" id="logout">Log out</button>
    </div>
    <div class="last-posts">
        <h2>Last musics</h2>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="row">
            <img src="image/music-logo.png" alt="" class="music-logo">
            <span>Canbay & Wolker - Dayanamam</span>
            <div class="rating">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star.png" alt="">
                <img src="image/star-half.png" alt="">
                <img src="image/star-empty.png" alt="">
            </div>
        </div>
        <div class="paging">
            <span>1</span>
            <span>2</span>
        </div>
    </div>
</div>
</body>

</html>

<script src="js/profile.js"></script>