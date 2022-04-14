<?php
include 'database/initializer.php';
create_tables();
?>

<link rel="stylesheet" href="css/header.css">

<div class="navbar">
    <a href="/yourmusic" class="logo">Your <br>Music</a>


    <ul>
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