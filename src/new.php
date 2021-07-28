<?php

$review = [
    'title' => '',
    'author' => '',
    'status' => '',
    'evaluation' => '',
    'impression' => ''
];

$errors = [];

$title = '読書ログの登録';
$content = __DIR__ . '/views/new.php';

include 'views/layout.php';
