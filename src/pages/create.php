<?php

require_once __DIR__ . '/lib/mysqli.php';

function createReview($link, $reviews)
{
    $sql = <<<EOT
    INSERT INTO reviews (
        title,
        author,
        status,
        score,
        summary
    ) VALUES (
        "{$reviews['title']}",
        "{$reviews['author']}",
        "{$reviews['status']}",
        "{$reviews['score']}",
        "{$reviews['summary']}"
    )
EOT;
    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('Error: fail to create reviews');
        error_log('Debugging Error:' . mysqli_error($link));
    }
}

function validate($reviews)
{
    $errors = [];

    //タイトルのバリデーション処理
    if (!strlen($reviews['title'])) {
        $errors['title'] = '書籍名を入力してください。';
    } elseif (strlen($reviews['title'] > 255)) {
        $errors['title'] = '書籍名は２５５文字以内で入力してください。';
    }

    //著者名のバリデーション処理
    if (!strlen($reviews['author'])) {
        $errors['author'] = '著者名を入力してください。';
    } elseif (strlen($reviews['author'] > 100)) {
        $errors['author'] = '著者名は１００文字以内で入力してください。';
    }

    //読書状況のバリデーション処理
    if (!in_array($reviews['status'], ['未読', '読書中', '読了'], true)) {
        $errors['status'] = '読書状況は「未読」「読んでる」「読了」のいずれかを入力してください';
    }

    //評価の入力値のバリデーション処理
    if ($reviews['score'] < 1 || $reviews['score'] > 5) {
        $errors['score'] = '入力数値は1〜5の整数でお願いします。';
    }

    //感想のバリーデーション処理
    if (!strlen($reviews['summary'])) {
        $errors['summary'] = '感想を入力してください。';
    } elseif (strlen($reviews['summary']) > 1000) {
        $errors['summary'] = '感想は１０００文字以内で入力してください。';
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviews = [
        'title' => isset($_POST['title']) ? $_POST['title'] : '',
        'author' => isset($_POST['author']) ? $_POST['author'] : '',
        'status' => isset($_POST['status']) ? $_POST['status'] : '',
        'score' => isset($_POST['score']) ? $_POST['score'] : '',
        'summary' => isset($_POST['summary']) ? $_POST['summary'] : '',
    ];

    $errors = validate($reviews);

    if (!count($errors)) {
        $link = dbconect();
        createReview($link, $reviews);
        mysqli_close($link);
        header("Location: index.php");
    }
}

include 'register.php';
