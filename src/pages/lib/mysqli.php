<?php

require __DIR__ . '/../../vendor/autoload.php';


function dbconect()
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
    $dotenv->load();

    $db_host = $_ENV['DB_HOST'];
    $db_username = $_ENV['DB_USERNAME'];
    $db_password = $_ENV['DB_PASSWORD'];
    $db_database = $_ENV['DB_DATABASE'];

    $link = mysqli_connect($db_host, $db_username, $db_password, $db_database);

    if (!$link) {
        echo 'Error: データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging erro:' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $link;
}

function oncedbconect()
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
    $dotenv->load();

    $db_host = $_ENV['DB_HOST'];
    $db_username = $_ENV['DB_USERNAME'];
    $db_password = $_ENV['DB_PASSWORD'];
    $db_database = $_ENV['DB_DATABASE'];

    $link = new mysqli($db_host, $db_username, $db_password, $db_database);

    if (!$link) {
        echo 'Error: データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging erro:' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $link;
}
