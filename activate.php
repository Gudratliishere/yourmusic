<?php
include 'dao/user_dao.php';
include 'entity/user.php';
include 'dao/old_password_dao.php';

if (isset($_GET['email']) && isset($_GET['activation_code'])) {
    session_start();
    $email = $_GET['email'];
    $email = openssl_decrypt($email, "AES-128-CTR", "yourmusic", 0, "1234567891011121");
    $code = $_GET['activation_code'];
    if ($code == $_SESSION['verification']) {
        $dao = new UserDao();

        if ($_SESSION['delete_account'] == true) {
            $dao->deactivate_user($_SESSION['id']);
            session_destroy();
            header("Location: account.php?code_login=7");
            exit();
        }
        $_SESSION['confirmed-user'] = $email;
        if ($_SESSION['register']) {
            $user = unserialize($_SESSION['user']);
            $dao->add_user($user);

            $old_password_dao = new OldPasswordDao();
            $old_password_dao->add($user->id, $user->password);
            session_destroy();
            header("Location: account.php?code_login=6");
        } else
            header("Location: forget_password.php");
    } else
        header("Location: link_expired.php");
} else
    header("Location: link_expired.php");