<!DOCTYPE html>
<html lang="ja">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../pages/stylesheets/scss/css/app.css">
        <title>書籍評価</title>
    </head>
</head>

<body>
    <div class="container">
        <h2 class="text-dark mt-4 mb-4">書籍評価一覧</h2>
        <a class="btn btn-primary mb-4" href="new.php">書籍の評価を登録する</a>
        <main class="d-flex flex-wrap">
            <?php foreach ($reviews as $review) : ?>
                <section class="border mr-4 mb-4 w-25 pl-2 pt-2 pb-2">
                    <div class="h4 mb-3"><a class="text-decoration-none text-dark" href="detail.php?id=<?php echo $review['id']; ?>">書籍名:&nbsp;&nbsp;<?php echo $review['title']; ?></a></div>
                    <div class="mb-3">著者名:<?php echo $review['author']; ?>&nbsp;/&nbsp;<?php echo $review['status']; ?>&nbsp;/&nbsp;<?php echo $review['score']; ?>点</div>
                    <div><?php echo $review['summary']; ?></div>
                </section>
            <?php endforeach; ?>
        </main>
    </div>
</body>

</html>
