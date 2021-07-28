<?php

require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli.php';

//読書ログの表示変数
function listReviews($link)
{
    $reviews = [];
    $sql = <<<EOT
    SELECT
    id, title, author, status, evaluation, impression
    FROM reviews
    EOT;

    $results = mysqli_query($link, $sql);

    while ($review = mysqli_fetch_assoc($results)) {
        $reviews[] = $review;
    }

    mysqli_free_result($results);

    return $reviews;
}

//MySQLに接続する変数
$link = dbConnect();

$reviews = listReviews($link);

$title = '読書ログの一覧';
$content = __DIR__ . '/views/index.php';
include __DIR__ . '/views/layout.php';
