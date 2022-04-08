<?php

include '../dao/user_dao.php';
include '../entity/user.php';

if (isset_fields()) {
    $user = user_exists();
    if ($user && password_match($user)) {
        is_user_active($user);
    }
}

function is_user_active($user)
{
    if ($user->status == 1) {
        session_start();
        $_SESSION['id'] = $user->id;
        header("Location: ../profile.php");
    } else
        redirect_login(4);
}

function password_match($user)
{
    if (password_verify($_POST['password'], $user->password))
        return true;
    redirect_login(3);
}

function isset_fields()
{
    if (isset($_POST['email']) && isset($_POST['password']))
        return true;
    redirect_login(1);
}

function user_exists()
{
    $email = $_POST['email'];
    $dao = new UserDao();
    $user = $dao->find_user_login_by_email($email);

    if ($user)
        return $user;
    redirect_login(2);
}

function redirect_login($code)
{
    header("Location: ../account.php?code=$code");
}
