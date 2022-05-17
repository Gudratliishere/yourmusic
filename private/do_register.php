<?php

use entity\User;

session_start();
if ($_SESSION['id'])
{
    header("Location: ../profile.php");
    exit();
}

include '../dao/user_dao.php';

//Fetching parameters from post request
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

$dao = new UserDao();
if ($dao->email_exists($email))
    redirect_account(1);

$user = new User();
$user->name = $name;
$user->surname = $surname;
$user->email = $email;
$user->password = password_hash($password, PASSWORD_DEFAULT);

session_start();
$_SESSION['email'] = $email;
$_SESSION['register'] = true;
$_SESSION['user'] = serialize($user);
$_SESSION['name'] = $user->name;
header("Location: ../email_verification.php");

function redirect_account ($code)
{
    header("Location: ../account.php?code_register=$code&request=register");
    exit();
}