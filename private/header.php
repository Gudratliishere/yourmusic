<?php
include 'database/initializer.php';
init_database();
?>

<link rel="stylesheet" href="css/header.css">

<div class="navbar">
    <a href="/yourmusic" class="logo-pc">Your <br>Music</a>
    <a href="/yourmusic" class="logo-phone">Your Music</a>

    <img src="image/menu.png" id="Menu">
    <ul id="MenuItems">
        <li><a href="/yourmusic">Home</a></li>
        <li><a href="/yourmusic/musics.php">Musics</a></li>
        <li><a href="/yourmusic/about.php">About</a></li>
        <?php
        session_start();
        if ($_SESSION['id'])
            echo '<li><a href="/yourmusic/profile.php">You</a></li>';
        else
            echo '<li><a href="/yourmusic/account.php">Account</a></li>';
        ?>
    </ul>
</div>

<script src="js/header.js"></script>