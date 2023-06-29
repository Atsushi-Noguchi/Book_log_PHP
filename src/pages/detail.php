<?php
require_once __DIR__ . '/lib/mysqli.php';


function onceReview($link, $id)
{
    $stmt = $link->prepare('SELECT id,title,author,status,score,summary,created_at FROM reviews WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $review = $result->fetch_assoc();

    $result->free();
    return $review;
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
$link = oncedbconect();
$review = onceReview($link, $id);
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pages/stylesheets/scss/css/app.css">
    <title>詳細ページ</title>
</head>

<body>
    <div class="container mh-vh-100">
        <div class="text-center h1 mt-5">
            <p><?php echo $review['title']; ?></p>
        </div>
        <div class="text-center h3 mt-5 ">
            <p><?php echo $review['author']; ?></p>
        </div>
        <div class="text-center h3 mt-5 ">
            <p><?php echo $review['status']; ?></p>
        </div>
        <div class="text-center h3 mt-5 ">
            <p><?php echo $review['summary']; ?></p>
        </div>
        <div class="text-center h4 mt-5 ">
            <p><?php echo $review['created_at']; ?></p>
        </div>
    </div>
</body>

</html>
