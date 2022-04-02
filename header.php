<?php
include 'database/initializer.php';
create_tables();
?>

<link rel="stylesheet" href="css/header.css">

<div class="navbar">
	<?php



	// function compress($source, $quality)
	// {

	// 	$info = getimagesize($source);

	// 	if ($info['mime'] == 'image/jpeg')
	// 		$image = imagecreatefromjpeg($source);
	// 	elseif ($info['mime'] == 'image/png')
	// 		$image = imagecreatefrompng($source);

	// 	imagejpeg($image, $source, $quality);

	// 	return $source;
	// }

	// include 'dao/user_dao.php';
	// include 'entity/user.php';
	// $dao = new UserDao();
	// $user = $dao->find_user_by_id(34);

	// $filename = "image/account_background.jpg";

	// compress($filename, 30);

	// $file = fopen($filename, "rb");
	// $contents = fread($file, filesize($filename));
	// fclose($file);

	// $user->photo = $contents;
	// $dao->update_user($user);
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