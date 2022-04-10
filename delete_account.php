<?php
session_start();
if (!$_SESSION['id'])
{
    header("Location: profile.php");
    exit();
}
$_SESSION['delete_account'] = true;

include 'dao/user_dao.php';
include 'entity/user.php';
$dao2 = new UserDao();
$_SESSION['email'] = $dao2->find_user_login_by_id($_SESSION['id'])->email;
//header("Location: email_verification.php");