<?php
session_start();
if (!$_SESSION['id'])
    header("Location: ../account.php");

$profile_photo = $_POST['profile-photo'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$change_password = $_POST['change-password'];
$old_password = $_POST['old-password'];
$new_password = $_POST['new-password'];

include '../dao/user_dao.php';
include '../entity/user.php';
$dao = new UserDao();
$user = $dao->find_user_by_id($_SESSION['id']);
$user->name = $name;
$user->surname = $surname;
$user->photo = $profile_photo;

$match = false;
if ($change_password == true) {
    if (password_verify($old_password, $user->password))
        $user->password = password_hash($new_password, PASSWORD_DEFAULT);
    else {
        $match = true;
        header("Location: ../edit_profile.php?code=1");
    }
}

if ($match == false)
{
    $dao->update_user($user);
    header("Location: ../profile.php");
}