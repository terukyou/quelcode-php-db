<?php require('../../entry/dbconnect.php');
if (!empty($_REQUEST['id'])) {
    $user_informations = $db->prepare('SELECT status_id,u.id,created_at,u.name AS user_name,phonetic,email,phone,birthday,p.name AS prefecture_name FROM users u,prefecture p WHERE u.id=? AND prefecture_id=p.id');
    $user_informations->bindValue(1, $_REQUEST['id'], PDO::PARAM_INT);
    $user_informations->execute();
}
$user = $user_informations->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="..\..\entry\style.css">
    <title>申し込み詳細</title>
</head>

<body>
    <main class="flex">
        <header>
            <a href="..\index.php">トップ</a>
            <a href="./list.php">申し込み</a>
        </header>
        <section>
            <h2>申し込み詳細</h2>
            <label>ステータス</label>
            <!-- ステータスが退会の時フォームを表示せず「退会」とだけ表示 -->
            <?php if ((int)$user[0]['status_id'] === 6) : ?>
                <p>退会</p>
            <?php else : ?>
            <form action="update.php" method="post">
            <select name="status">
            <?php
            $statuses = $db->query('SELECT * FROM status');
            while ($status = $statuses->fetch()) :
            ?>
            <option value="<?php echo h($status['id']); ?>" <?php if ($status['id'] == $user[0]['status_id']) { echo 'selected';} ?>>
                <?php echo h($status['name']); ?>
            </option>
            <?php endwhile; ?>
            </select>
            <input type="hidden" value="<?php echo h($user[0]['id'])?>" name='id'>
            <input type="submit" value="更新">
            </form>
            <?php endif; ?>
            <p>No</p>
            <?php echo h($user[0]['id']); ?>
            <p>申込日時</p>
            <?php echo h($user[0]['created_at']); ?>
            <p>名前</p>
            <?php echo h($user[0]['user_name']); ?>
            <p>ふりがな</p>
            <?php echo h($user[0]['phonetic']); ?>
            <p>メールアドレス</p>
            <?php echo h($user[0]['email']); ?>
            <p>電話番号</p>
            <?php echo h($user[0]['phone']); ?>
            <p>生年月日</p>
            <?php echo h($user[0]['birthday']); ?>
            <p>都道府県</p>
            <?php echo h($user[0]['prefecture_name']); ?>
            <a href="list.php">一覧戻る</a>
        </section>
    </main>
</body>

</html>
