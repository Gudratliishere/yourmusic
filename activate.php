<?php

if (isset($_GET['email']) && isset($_GET['activation_code']))
{
    include 'private/send_email.php';

    $email = $_GET['email'];
    $link = $_GET['activation_code'];
    if ($link == $emails[$email])
    {
        $_SESSION['verified'] = true;
        if ($_SESSION['register'])
            header("Location: account.php?code=6");
        else
            header("Location: forget_password.php");
    }
} else
    header("Location: email_verification.php?code=1");