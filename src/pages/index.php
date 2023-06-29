<?php

require_once __DIR__ . '/lib/mysqli.php';

function listReviews($link)
{
    $reviews = [];
    $sql = 'SELECT id,title,author,status,score,summary FROM reviews';
    $results = mysqli_query($link, $sql);

    while ($review = mysqli_fetch_assoc($results)) {
        $reviews[] = $review;
    }
    mysqli_free_result($results);
    return $reviews;
}

$link = dbconect();
$reviews = listReviews($link);

include 'split_index.php';
