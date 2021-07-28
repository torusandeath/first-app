<?php

#テーブル削除関数
function dropTable($link)
{
    $dropTableSql = 'DROP TABLE IF EXISTS reviews;';
    $results = mysqli_query($link, $dropTableSql);

    if ($results) {
        echo 'テーブルを削除しました' . PHP_EOL;
    } else {
        echo 'テーブルの削除に失敗しました' . PHP_EOL;
        echo 'Debugging Error: ' . mysqli_error($link) . PHP_EOL;
    }
};

#テーブル作成関数
function createTable($link)
{
    $createTableSql = <<<EOT
    CREATE TABLE reviews(
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(100),
    status VARCHAR(10),
    evaluation INTEGER,
    impression VARCHAR(1000) ,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP) DEFAULT CHARACTER SET=utf8mb4;
    EOT;
    $results = mysqli_query($link, $createTableSql);

    if ($results) {
        echo 'テーブルを作成しました' . PHP_EOL;
    } else {
        echo 'テーブルの作成に失敗しました' . PHP_EOL;
        echo 'Debugging Error: ' . mysqli_error($link) . PHP_EOL;
    }
};


///　処理
$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
