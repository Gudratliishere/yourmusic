<?php

session_start();
if (!$_SESSION['id']) {
    header("Location: account.php");
    exit();
}

include '../dao/music_dao.php';
$dao = new MusicDao();

if (!empty($_GET['id']))
{
    $dao->delete_music($_GET['id']);
}

header("Location: ../musics.php");
