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

function send_mail($to)
{
    $mail = new PHPMailer(true);
    global $emails;

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
        $mail->Body = "Hi,<br>Please click the following link to confirm your email:<br>$link<br><br>
        <b>Note:</b><br>If you did not any confirmation, please contact us!";

        //Store email and activation code in SESSION
        session_start();
        $_SESSION['verification'] = $code;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    send_mail($email);
    header("Location: ../email_verification.php?sent=true");
} else
    header("Location: ../email_verification.php");