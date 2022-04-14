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

		<?php include 'private/header.php'?>

		<div class="content">
			<div class="left-col">
				<pre>Hiçbi' dert yara değil
Kendin ol, para değil
Büyü de bi' yana git
Dünya sana mı kalır it?
Fiyakalı araba
Kendin ol, para değil
Büyü de bi' yana git
Dünya sana mı kalır it?
Fiyakalı araba
Kendin ol, para değil
Büyü de bi' yana git
Dünya sana mı kalır it?
Fiyakalı araba
Kendin ol, para değil
Büyü de bi' yana git
Dünya sana mı kalır it?Dünya sana mı kalır it?
Fiyakalı araba
Kendin ol, para değil
Büyü de bi' yana git
Dünya sana mı kalır it?
Fiyakalı araba
				</pre>
			</div>
			<div class="right-col">
				<p>Click here to listen</p>
				<img src="image/play.png" id="icon">
			</div>
		</div>
	</div>
	<audio id="mySong">
		<source src="Velet%20-%20UYAN%20Ft%20Canbay%20&%20Wolker.mp3" type="audio/mp3">
	</audio>

	<script>
		var mySong = document.getElementById("mySong");
		var icon = document.getElementById("icon");

		icon.onclick = function() {
			if (mySong.paused) {
				mySong.play();
				icon.src = "image/pause.png";
			} else {
				mySong.pause();
				icon.src = "image/play.png";
			}
		}
	</script>
</body>

</html>