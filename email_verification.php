<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Music | Email Verification</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/email_verification.css">
</head>
<body>
<?php
include 'private/header.php';
session_start();
if ($_SESSION['id'])
    header('Location: profile.php');
$email = $_POST['email'];
$sent = $_POST['sent'];
?>

<div class="container verification-container">
    <div class="form-card"
         style="height: <?php echo ($sent) ? '300' : '150'; ?>px">
        <form action="private/send_email.php" method="post" class="send-email">
            <span class="send-email-message">Send verification code to email:</span>
            <input type="text" name="email" id="email" placeholder="Email" class="email" required
            <?php if ($email)
            {
                echo 'disabled ';
                echo 'value="'.$email.'"';
            } ?>>
            <input type="submit" value="Send" class="send">
        </form>
        <?php if ($sent) { ?>
            <form action="validate.php" method="post" class="confirm">
                <span class="confirm-message">Confirm code sent to your email.</span>
                <input type="text" name="password" id="password" class="password">
                <input type="submit" value="Confirm" class="confirm-code">
            </form>
        <?php } ?>
    </div>
</div>
</body>
</html>