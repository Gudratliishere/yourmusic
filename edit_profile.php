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
<?php include 'private/header.php';
include 'dao/user_dao.php';
include 'entity/user.php';
$dao = new UserDao();
$user = $dao->find_user_by_id($_SESSION['id']);
?>
<div class="container edit-profile-container">
    <div class="blur">
        <form action="private/do_edit.php" method="post" enctype="multipart/form-data"
              onsubmit="return checkPasswordMatch()">
            <div class="profile-info">
                <img src="<?php if ($user->photo == null || $user->photo == '') echo 'image/default_pp.jpg';
                else echo 'data:image/jpg;base64,' . base64_encode($user->photo); ?>" alt="Profile photo"
                     id="profile-img">
                <input type="file" name="profile-photo" id="profile-photo"
                       src="data:image/jpg;base64,<?= base64_encode($user->photo) ?>">
                <div class="name-surname">
                    <div class="name">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="name" id="name" value="<?= $user->name ?>" required>
                    </div>
                    <div class="surname">
                        <label for="surname">Surname:</label>
                        <input type="text" name="surname" class="surname" id="surname" value="<?= $user->surname ?>"
                               required>
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
                <span id="message" class="message">
                    <?php $code = $_GET['code'];
                    switch ($code) {
                        case 1:
                            echo 'Password is wrong!';
                            break;
                        case 2:
                            echo 'You entered used password, try another one!';
                            break;
                    } ?>
                </span>
                <input type="submit" value="Save" class="submit">
                <label class="delete-account" id="delete-account">Delete account</label>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<script src="js/edit_profile.js"></script>