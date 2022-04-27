<?php

session_start();
if (!$_SESSION['id']) {
    header("Location: account.php");
    exit();
}

include '../dao/music_dao.php';
include '../entity/music.php';

$music_id = $_POST['music_id'];
$name = $_POST['name'];
$lyrics = $_POST['lyrics'];
$path = "";

$dao = new MusicDao();
$music = $dao->find_by_id($music_id);

$valid_format = array("mp3", "ogg", "flac");
$file = $_FILES['path']['name'];
$size = $_FILES['path']['size'];
if (strlen($file)) {
    $ext = end(explode(".", $file));
    if (in_array($ext, $valid_format)) {
        $temp = $_FILES["path"]["tmp_name"];
        $destination = "../music/" . $file;
        if (copy($temp, $destination))
            $path = $file;
        else
            header("Location: ../index.php");

    }
}

if ($music) {
    $music = fill_music($music);
    $dao->update_music($music);
} else {
    $music = new Music();
    $music = fill_music($music);
    $music = $dao->add_music($music);
}

header("Location: ../listening.php?id=$music->id");

function fill_music($music)
{
    global $name, $path, $lyrics;
    $music->name = $name;
    $music->path = $path;
    $music->lyrics = $lyrics;
    $music->user = $_SESSION['id'];
    return $music;
}