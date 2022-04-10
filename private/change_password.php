<?php

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

session_start();
$user = $_SESSION['confirmed-user'];

include '../dao/old_password_dao.php';
$old_password_dao = new OldPasswordDao();

include '../dao/user_dao.php';
include '../entity/user.php';

$user_dao = new UserDao();
$user_obj = $user_dao->find_user_login_by_email($user);
$user_obj->password = $password;
$array = $old_password_dao->get_old_passwords($user_obj->id);
foreach ($array as $old_password) {
    if (password_verify($_POST['password'], $old_password)) {
        header("Location: ../forget_password.php?code=1");
        exit();
    }
}

$old_password_dao->add($user_obj->id, $user_obj->password);
$user_dao->update_user_login($user_obj);

header("Location: ../account.php?code_login=5");
