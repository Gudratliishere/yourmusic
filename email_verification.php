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
$code = $_GET['code'];
$email = $_SESSION['email'];
$sent = $_GET['sent'];
?>

<div class="container verification-container">
    <div class="form-card">
        <form action="private/send_email.php" method="post" class="send-email">
            <?php if ($code == 1)
                echo '<span style="color: red">Verification link is not valid, please send email again!</span>';
            elseif ($sent) echo '<span style="color: green">Please check your email!</span>';
            if (!$sent) {
                ?>

                <span class="send-email-message">Send verification to email:</span>
                <input type="text" name="email" id="email" placeholder="Email" class="email" required
                    <?php if ($email) {
                        echo 'value="' . $email . '"';
                    } ?>>
                <input type="submit" value="Send" class="send">
            <?php } ?>
    </div>
</div>
</body>
</html>