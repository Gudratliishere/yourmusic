<?php

if (isset($_GET['email']) && isset($_GET['activation_code']))
{
    session_start();
    $email = $_GET['email'];
    $email = openssl_decrypt($email, "AES-128-CTR", "yourmusic", 0, "1234567891011121");
    $code = $_GET['activation_code'];
    if ($code == $_SESSION['verification'])
    {
        $_SESSION['confirmed-user'] = $email;
        if ($_SESSION['register'])
            header("Location: account.php?code=6");
        else
            header("Location: forget_password.php");
    }
    else
        header("Location: email_verification.php?code=1");
} else
    header("Location: email_verification.php?code=1");