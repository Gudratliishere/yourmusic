<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Music | Forget Password</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/forget_password.css">
</head>
<body>
<?php include 'private/header.php';
$code = $_GET['code'];
session_start();
if ($_SESSION['id'] || !$_SESSION['confirmed-user'])
    header('Location: profile.php');
?>
<div class="container forget-password-container">
    <form class="form-card" id="form" method="post" action="private/change_password.php" onsubmit="return passwordMatch()">
        <span>Define new password:</span>
        <input type="password" name="password" id="password" placeholder="Password" class="password" required>
        <div class="pass-info" id="pass-info">
            <meter max="3" id="pass-strength"></meter>
            <br>
            <span class="password-info">Password must contain at least 8 characters with number and letters.</span>
            <br>
            <img src="image/false.png" id="pass-len">
            <span>8 characters</span>
            <br>
            <img src="image/false.png" id="pass-num">
            <span>Numbers</span>
            <br>
            <img src="image/false.png" id="pass-letter">
            <span>Letters</span>
        </div>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" class="password" required>
        <div class="show">
            <input type="checkbox" name="show" id="show">
            <label for="show">Show</label>
        </div>
        <span class="message" id="message">
            <?php
            if ($code && $code == 1)
                echo 'You used old password, try another one!';
            ?>
        </span>
        <input type="submit" value="Save">
    </form>
</div>
</body>
</html>

<script src="js/forget_password.js"></script>