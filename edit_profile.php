<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Music | Edit Profile</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/edit_profile.css">
</head>
<body>
<?php include 'private/header.php'; ?>
<div class="container edit-profile-container">
    <div class="blur">
        <form action="private/do_edit.php" method="post" onsubmit="return checkPasswordMatch()">
            <div class="profile-info">
                <img src="image/account_background.jpg" alt="Profile photo">
                <input type="file" name="profile-photo" id="profile-photo">
                <div class="name-surname">
                    <div class="name">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="name" id="name" required>
                    </div>
                    <div class="surname">
                        <label for="surname">Surname:</label>
                        <input type="text" name="surname" class="surname" id="surname" required>
                    </div>
                </div>
            </div>
            <hr class="divider">
            <div class="password-change">
                <div class="change-pass">
                    <input type="checkbox" name="change-password" id="change-password" class="change-password">
                    <label for="change-password" class="change-pass-btn">Change password</label>
                </div>
                <div class="change-pass-inputs" id="change-pass-inputs">
                    <span>Old password</span>
                    <input type="password" name="old-password" id="old-password" class="password">
                    <span>New password</span>
                    <input type="password" name="new-password" id="new-password" class="password">
                    <span>Confirm new password</span>
                    <input type="password" name="new-cpassword" id="new-cpassword" class="password">
                    <div class="show">
                        <input type="checkbox" name="show" id="show">
                        <label for="show">Show</label>
                    </div>
                </div>
                <span id="message" class="message"></span>
                <input type="submit" value="Save" class="submit">
            </div>
        </form>
    </div>
</div>
</body>
</html>

<script src="js/edit_profile.js"></script>