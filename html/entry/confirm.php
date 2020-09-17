<?php require('dbconnect.php');
session_start();

// 直接このURLに遷移した場合
if (empty($_SESSION['join'])) {
    header('Location:error.php');
    exit();
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
        </div>
        <div class="main wrapper">
            <form action="complete.php" method="post">
                <div>
                    <label>お名前<span class="red">必須</span></label>
                    <p><?php echo h($_SESSION['join']['name']); ?></p>

                </div>

                <div>
                    <label>ふりがな<span class="red">必須</span></label>
                    <p><?php echo h($_SESSION['join']['phonetic']); ?></p>
                </div>

                <div>
                    <label>メールアドレス<span class="red">必須</span></label>
                    <p><?php echo h($_SESSION['join']['email']); ?></p>
                </div>

                <div>
                    <label>電話番号<span class="red">必須</span></label>
                    <p><?php echo h($_SESSION['join']['phone']); ?></p>
                </div>

                <div>
                    <label>生年月日<span class="red">必須</span></label>
                    <p><?php echo h($_SESSION['join']['year'] . '年' . $_SESSION['join']['month'] . '月' . $_SESSION['join']['day'] . '日'); ?></p>
                </div>

                <div>
                    <label>都道府県<span class="red">必須</span></label>
                    <p><?php
                        $prefectures = $db->prepare('SELECT name FROM prefecture WHERE id=?');
                        $prefectures->bindParam(1, $_SESSION['join']['prefecture'], PDO::PARAM_INT);
                        $prefectures->execute();
                        $prefecture = $prefectures->fetch();
                        echo h($prefecture['name']); ?></p>
                </div>
                <div class="fifty">
                    <div>
                        <a href="input.php?action=rewrite">戻る</a>
                    </div>
                    <div>
                        <input type="hidden" name="action" value="submit">
                        <input type="submit" value="送信">
                    </div>
                </div>
            </form>

        </div>
</body>

</html>
