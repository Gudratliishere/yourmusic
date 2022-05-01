<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Your music</title>
	<link rel="stylesheet" href="css/index.css">
</head>

<body>
	<div class="container home-container">

		<?php include 'private/header.php';
		include 'dao/music_dao.php';
		include 'entity/music.php';
		$dao = new MusicDao();
		$music = $dao->find_random_music();?>

		<div class="content">
			<div class="left-col">
				<pre><?=$music->lyrics?>
                fsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsdfsdafsd fsdfsdfsdf sdfsd f
                dsfsdfsdfsdfsdfdsfsd
                gfsdfsdfsdfsdfsdfsdfsdfds
                fsdfdsfsdfsdfdsfsdfsd</pre>
			</div>
			<div class="right-col">
				<p class="music-name"><?=$music->name?></p>
				<img src="image/play.png" id="icon">
			</div>
		</div>
	</div>
	<audio id="mySong">
		<source src="music/<?=$music->path?>" type="audio/mp3">
	</audio>
</body>
</html>

<script src="js/index.js"></script>