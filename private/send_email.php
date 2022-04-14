<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../libs/PHPMailer-master/src/Exception.php';
require '../libs/PHPMailer-master/src/PHPMailer.php';
require '../libs/PHPMailer-master/src/SMTP.php';

function generate_activation_code()
{
    $code = bin2hex(random_bytes(16));

    return $code;
}

function generate_activation_link($email, $code)
{
    $encrypted_email = openssl_encrypt($email, "AES-128-CTR", "yourmusic", 0, "1234567891011121");
    $link = "http://localhost/yourmusic/activate.php?email=$encrypted_email&activation_code=$code";

    return $link;
}

function send_mail($to, $name)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'gudratlicompany@gmail.com';
        $mail->Password = 'ggwseewohvxxtzuv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('gudratlicompany@gmail.com', 'Your Music');
        $mail->addAddress($to);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Your Music | Email verification';
        $code = generate_activation_code();
        $link = generate_activation_link($to, $code);

        //Generating special mail body
        session_start();
        if ($_SESSION['register'] == true)
            $mail->Body = generate_register_mail_body($link, $name);
        elseif ($_SESSION['delete_account'])
            $mail->Body = generate_delete_account_mail_body($link, $name);
        else
            $mail->Body = generate_password_change_mail_body($link, $name);

        //Store email and activation code in SESSION
        $_SESSION['verification'] = $code;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

//Defining user name
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $name = get_user_name($email);
    send_mail($email, $name);
    header("Location: ../email_verification.php?sent=true");
} else
    header("Location: ../email_verification.php");

function get_user_name($email)
{
    session_start();
    global $user_name;
    if ($_SESSION['register'] == true) {
        $user_name = $_SESSION['name'];
    } else {
        include '../dao/user_dao.php';
        include '../entity/user.php';
        $dao = new UserDao();
        $user_name = $dao->find_user_by_email($email)->name;
    }
    return $user_name;
}

function generate_delete_account_mail_body($link, $name)
{
    $attempt = "delete account";
    $last_step = "delete your account";
    return generate_mail_body($link, $name, $attempt, $last_step);
}

function generate_password_change_mail_body($link, $name)
{
    $attempt = "change password";
    $last_step = "change your password";
    return generate_mail_body($link, $name, $attempt, $last_step);
}

function generate_register_mail_body($link, $name)
{
    $attempt = "create new account";
    $last_step = "create your account";
    return generate_mail_body($link, $name, $attempt, $last_step);
}

function generate_mail_body($link, $name, $attempt, $last_step)
{
    $message = "<div style='font-size: 18px;
        text-align: center;
        line-height: 24px;'>
    Hi, dear $name.<br>
    You have attempted to $attempt in <a style='text-decoration: none;color: #ff3f43;' href='http://localhost/yourmusic' 
    target=\"_blank\">Your Music</a> platform.<br>
    Just one last step to $last_step, click following button and verify your email.
    <center><a href='$link' 
         style='background-color: #da00ff;
        color: white;
        width: 200px;
        height: 27px;
        padding-top: 3px;
        display: block;
        border-radius: 15px;
        margin: 10px;
        text-decoration: none' target=\"_blank\">Verify email</a></center>
    If you have not attempted, please contact us!<br>
    Thanks for your attention! | <a href='http://localhost/yourmusic' target=\"_blank\" style='text-decoration: none;color: #ff3f43;'>Your
    Music Platform</a> &copy;
    </div>
    
    <style>
</style>";

    return $message;
}