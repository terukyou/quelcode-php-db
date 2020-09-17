<?php require('dbconnect.php');
session_start();
// 直接このURLに遷移した場合
if (empty($_SESSION['join'])) {
    header('Location:error.php');
    exit();
}

if (!empty($_POST)) {
    $birthday = ($_SESSION['join']['year'] . '/' . $_SESSION['join']['month'] . '/' . $_SESSION['join']['day']);
    $members = $db->prepare('INSERT INTO users SET prefecture_id=?,name=?,phonetic=?,email=?,phone=?,birthday=?');
    $members->bindValue(1, $_SESSION['join']['prefecture'], PDO::PARAM_INT);
    $members->bindValue(2, $_SESSION['join']['name']);
    $members->bindValue(3, $_SESSION['join']['phonetic']);
    $members->bindValue(4, $_SESSION['join']['email']);
    $members->bindValue(5, $_SESSION['join']['phone']);
    $members->bindValue(6, $birthday);
    $members->execute();
    // セッションデータを削除
    $_SESSION = array();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="style.css">
    <title>プレエントリーお申し込み | QUELCODE ISA オンラインプログラミングスクール | 卒業まで学費不要、日本初のISAを採用</title>
</head>

<body>
    <div class="header">
        <h1><img src="/images/cropped-quelcode-2.png" alt="QUELCODEのロゴ"></h1>
    </div>
    <div class="main wrapper">
        <div class="title">
            <h2>【ISA】QUELCODE</h2>
            <h2>プレエントリーフォーム</h2>
            <p>応募はこちらから。日本で初めてISA(学費後払い)を採用したプログラミングスクール<br>の募集です。全国からのご応募をおまちしています。</p>
            <p class="padding">ご応募ありがとうございました。</p>
        </div>
        <div>
        </div>
</body>

</html>
