<?php

function make_rating ($rate, $rate_count)
{
    if ($rate_count == 0)
        for ($i = 0; $i < 5; $i++)
            echo '<img src="image/star-empty.png" alt="">';
    $rating = $rate / $rate_count;
    $star = $rating / 2;
    for ($i = 0; $i < $star; $i++)
        echo '<img src="image/star.png" alt="">';
    if ($rating / 2 == 1)
        echo '<img src="image/star-half.png" alt="">';
    $emptystar = (10 - $rating) / 2;
    for ($i = 0; $i < $emptystar; $i++)
        echo '<img src="image/star-empty.png" alt="">';
}

function code_for_login ($code)
{
    switch ($code)
    {
        case 1:
            echo 'Something is wrong, please try again or contact us!';
            break;
        case 2:
            echo 'User not found, maybe you have to register?';
            break;
        case 3:
            echo 'Password is wrong, try again!';
            break;
        case 4:
            echo 'Your account is blocked :(<br>If you think it is mistake, contact us!';
            break;
        case 5:
            echo 'Password successfully changed!';
            break;
        case 6:
            echo 'Successfully registered! Now you can log in!';
            break;
        case 7:
            echo 'Successfully deleted account!';
            break;
        case 8:
            echo 'You have deleted this account. If you want to activate again, contact us!';
            break;
    }
}