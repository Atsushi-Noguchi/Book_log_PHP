<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pages/stylesheets/scss/css/app.css">
    <title>読書ログ登録</title>
</head>

<body>
    <div class="container">
        <h1 class="h2 text-dark mt-4 mb-4">読書ログ</h1>
        <form action=" create.php" method="post">
            <?php
            if (count($errors)) : ?>
                <ul class="text-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="form-group">
                <label for="title">書籍名</label>
                <input type="text" name="title" class="form-control" id="title" value="<?php echo $reviews['title'] ?>">
            </div>
            <div class="form-group">
                <label for="author">著者名</label>
                <input type="text" name="author" class="form-control" id="author" value="<?php echo $reviews['author'] ?>">
            </div>
            <div class="form-group">
                <label>読書状況</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="未読" <?php echo ($reviews['status'] === '未読') ? 'checked' : ''; ?>>
                        <label for="status1">未読</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="読書中" <?php echo ($reviews['status'] === '読書中') ? 'checked' : ''; ?>>
                        <label for="status2">読書中</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status3" value="読了" <?php echo ($reviews['status'] === '読了') ? 'checked' : ''; ?>>
                        <label for="status3">読了</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="score">評価（5点満点の整数）</label>
                <input type="number" name="score" class="form-control" id="score" value="<?php echo $reviews['score'] ?>">
            </div>
            <div class="form-group">
                <label for="summary">感想</label>
                <textarea type="text" name="summary" class="form-control" id="summary" rows="10"><?php echo $reviews['summary'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">登録する</button>
        </form>
    </div>
</body>

</html>
