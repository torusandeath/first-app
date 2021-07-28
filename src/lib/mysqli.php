<?php

require __DIR__ . '/../vendor/autoload.php';

/// 関数

#データベース接続関数
function dbConnect()
{
    #mysqlに接続
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    $dbHost = $_ENV['DB_HOST'];
    $dbUsername = $_ENV['DB_USERNAME'];
    $dbPassword = $_ENV['DB_PASSWORD'];
    $dbDatabase = $_ENV['DB_DATABASE'];

    $link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);

    #データベースに接続出来なかった場合
    if (!$link) {
        echo 'ERROR:データベースに接続できません' . PHP_EOL;
        echo 'Debugger error' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $link;
};
