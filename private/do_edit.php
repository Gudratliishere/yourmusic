<?php
session_start();
if (!$_SESSION['id'])
    header("Location: ../account.php");

$profile_photo = $_FILES['profile-photo']['tmp_name'];
$filename = $_FILES['profile-photo']['name'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$change_password = $_POST['change-password'];
$old_password = $_POST['old-password'];
$new_password = $_POST['new-password'];

include '../dao/user_dao.php';
include '../entity/user.php';
include '../dao/old_password_dao.php';

$old_password_dao = new OldPasswordDao();
$dao = new UserDao();
$user = $dao->find_user_by_id($_SESSION['id']);
$user->name = $name;
$user->surname = $surname;

if ($profile_photo != '') {
    $temp_file_path = '../temp/'.$filename;
    compress($profile_photo, 30);
    $user->photo = file_get_contents('../temp/'.$temp_file_path);
    unlink($temp_file_path);
}

if ($change_password == true) {
    if (password_verify($old_password, $user->password)) {
        $array = $old_password_dao->get_old_passwords($user->id);
        foreach ($array as $old) {
            if (password_verify($new_password, $old)) {
                header("Location: ../edit_profile.php?code=2");
                exit();
            }
        }
        $user->password = password_hash($new_password, PASSWORD_DEFAULT);
    } else {
        header("Location: ../edit_profile.php?code=1");
        exit();
    }
    $old_password_dao->add($user->id, $user->password);
}

$dao->update_user($user);
header("Location: ../profile.php");


function compress($source, $quality)
{
    global $temp_file_path;
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    imagejpeg($image, $temp_file_path, $quality);
}