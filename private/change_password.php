<?php

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
session_start();
$user = $_SESSION['confirmed-user'];

include '../dao/old_password_dao.php';
$old_password_dao = new OldPasswordDao();

if ($old_password_dao->password_exists($user, $password))
    header("Location: forget_password.php?code=1");

include '../dao/user_dao.php';
include '../entity/user.php';

$user_dao = new UserDao();
$user_obj = $user_dao->find_user_by_id($user);
$user->password = $password;

$user_dao->update_user($user_obj);

header("Location: account.php?code=5");