<link rel="stylesheet" href="css/header.css">

<div class="navbar">
	<?php 
	include "database/connection.php";
	include 'dao/user_dao.php';
	include 'entity/user.php';
	$dao = new UserDao();
	$user = new User();
	$user->name = "dunay";
	$user->surname = "qudretli";
	$user->email = "dunaemail";
	$user->password = "dfdsfsd";
	$user->phone = "146545";
	$dao->add_user($user);
	?>
	<a href="/yourmusic" class="logo">Your <br>Music</a>


	<ul>
		<li><a href="/yourmusic">Home</a></li>
		<li><a href="/yourmusic/musics.php">Musics</a></li>
		<li><a href="/yourmusic/about.php">About</a></li>
		<li><a href="/yourmusic/account.php">Account</a></li>
		<li><a href="/yourmusic/profile.php">You</a></li>
	</ul>
</div>