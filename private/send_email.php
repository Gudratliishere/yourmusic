<?php

$email = $_POST['email'];
$activation_code = generate_activation_code();
send_activation_email($email, $activation_code);

echo $email.'<br>'.$activation_code;
function generate_activation_code()
{
    return bin2hex(random_bytes(2));
}

function send_activation_email($email, $activation_code)
{
    // set email subject & body
    $subject = 'Please activate your account';
    $message = "Hi,
            Please click the following link to activate your account:
            $activation_code";
    $header = "Your Music";

    mail($email, $subject, nl2br($message), $header);
}