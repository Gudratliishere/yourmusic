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