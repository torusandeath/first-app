<?php
require_once __DIR__ . '/lib/mysqli.php';

function createReviews($link, $review)
{
    $sql = <<<EOT
    INSERT INTO reviews(
        title,
        author,
        status,
        evaluation,
        impression
    ) VALUES (
        "{$review['title']}",
        "{$review['author']}",
        "{$review['status']}",
        "{$review['evaluation']}",
        "{$review['impression']}"
    )
    EOT;
    $results = mysqli_query($link, $sql);
    if (!$results) {
        error_log('Error: fail to create company');
        error_log('Debugging Error: ') . mysqli_error($link);
    }
}

#バリデーションチェック関数
function validate($review)
{

    #エラーメッセージ配列の定義
    $errors = [];

    #書籍名チェック
    if (!mb_strlen($review['title'])) {
        $errors['title'] = '書籍名を入力してください';
    } elseif (mb_strlen($review['title']) > 255) {
        $errors['title'] = '書籍名は255文字以内で入力してください';
    }

    #著者名チェック
    if (!mb_strlen($review['author'])) {
        $errors['author'] = '著者名を入力してください';
    } elseif (mb_strlen($review['author']) > 100) {
        $errors['author'] = '著者名は100文字以内で入力してください';
    }

    #読書状況チェック
    if (!in_array($review['status'], ['未読', '読書中', '読了'], true)) {
        $errors['status'] = '読書状況は「未読」、「読書中」、「読了」で入力してください';
    }

    #評価チェック
    if ($review['evaluation'] < 1 ||  $review['evaluation'] > 5) {
        $errors['evaluation'] = '評価は1~5の整数で入力してください';
    }

    #感想チェック
    if (!mb_strlen($review['impression'])) {
        $errors['impression'] = '感想を入力してください';
    } elseif (mb_strlen($review['impression']) > 1000) {
        $errors['impression'] = '感想は1000文字以内で入力してください';
    }

    #エラーメッセージ変数を戻り値にする
    return $errors;
}

$status = '';
if (array_key_exists('status', $_POST)) {
    $status = $_POST['status'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POSTされた会社情報を変数に変換する
    $review = [
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'status' => $status,
        'evaluation' => $_POST['evaluation'],
        'impression' => $_POST['impression']
    ];
    // バリデーションする
    $errors = validate($review);
    // バリデーションエラーがなければ
    if (!count($errors)) {
        //データベースに接続する
        $link = dbConnect();
        // データベースにデータを登録する
        createReviews($link, $review);
        // データベースにデータを切断する
        mysqli_close($link);
        header("location: index.php");
    }
}

$title = '読書ログ登録';
$content = __DIR__ . "/views/new.php";
include 'views/layout.php';
