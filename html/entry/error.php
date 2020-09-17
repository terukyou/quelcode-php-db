<?php
require('dbconnect.php');
// セッションがあった場合削除
if (!empty($_SESSION)) {
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
            <p class="padding error">エラーが発生しました。</p>
        </div>
        <div>
        </div>
</body>

</html>
