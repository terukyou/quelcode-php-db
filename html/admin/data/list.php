<?php require('../../entry/dbconnect.php');
if (!empty($_GET)) {
    // 名前とステータスどっちも
    if (!empty($_GET['name']) && (int)$_GET['status'] > 0) {
        $searches = $db->prepare('SELECT u.id, created_at, u.name as user_name, phonetic, prefecture.name as prefecture_name, birthday, s.name as status_name FROM users u, status s,prefecture WHERE s.id=? AND(u.name LIKE ? OR phonetic LIKE ?) AND u.prefecture_id=prefecture.id AND u.status_id=s.id');
        $searches->bindValue(1, $_GET['status'], PDO::PARAM_INT);
        $searches->bindValue(2, '%' . $_GET['name'] . '%');
        $searches->bindValue(3, '%' . $_GET['name'] . '%');
        $searches->execute();
    } elseif (!empty($_GET['name']) && (int)$_GET['status'] === 0) {
        // 名前だけ
        $searches = $db->prepare('SELECT u.id, created_at, u.name as user_name, phonetic, prefecture.name as prefecture_name, birthday, s.name as status_name FROM users u, status s,prefecture WHERE (u.name LIKE ? OR phonetic LIKE ?) AND u.prefecture_id=prefecture.id AND u.status_id=s.id');
        $searches->execute(array('%' . $_GET['name'] . '%', '%' . $_GET['name'] . '%'));
    } elseif (empty($_GET['name']) && (int)$_GET['status'] > 0) {
        // ステータスだけ
        $searches = $db->prepare('SELECT u.id, created_at, u.name as user_name, phonetic, prefecture.name as prefecture_name, birthday, s.name as status_name FROM users u, status s,prefecture WHERE status_id=? AND u.prefecture_id=prefecture.id AND u.status_id=s.id');
        $searches->bindValue(1, $_GET['status'], PDO::PARAM_INT);
        $searches->execute();
    }
} elseif (empty($_GET) || (empty($_GET['name']) && (int)$_GET['status'] === 0)) {
    // 検索されていない場合orステータス「すべて」を検索した場合
    $searches = $db->query('SELECT u.id, created_at, u.name as user_name, phonetic, prefecture.name as prefecture_name, birthday, s.name as status_name FROM users u, status s,prefecture WHERE u.prefecture_id=prefecture.id AND u.status_id=s.id ORDER BY u.id ASC');
    $searches->execute();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="..\..\entry\style.css">
    <title>申し込み一覧画面</title>
</head>

<body>
    <main class="flex">
    <header>
        <a href="..\index.php">トップ</a>
        <a href="#">申し込み</a>
    </header>
    <section>
        <h2>申し込み一覧</h2>
        <div class="serch">
            <form action="" method="get">
                <p>検索</p>
                <label>名前</label>
                <input type="text" name="name">

                <label>ステータス</label>
                <select name="status">
                    <option value="0">すべて</option>
                    <?php
                    $statuses = $db->query('SELECT * FROM status');
                    while ($status = $statuses->fetch()) :
                    ?>
                        <option value="<?php echo h($status['id']); ?>" <?php selectedGet('status', $status['id']); ?>>
                            <?php echo h($status['name']); ?>
                        </option>
                    <?php endwhile; ?>

                </select>
                <input type="submit" value="検索">
            </form>
        </div>
        <table border="">
            <div class="states">
                <tr>
                    申し込み件数
                    <td>No</td>
                    <td>申込日</td>
                    <td>名前</td>
                    <td>都道府県</td>
                    <td>年齢</td>
                    <td>ステータス</td>
                    <td>詳細</td>
                </tr>
                <?php while ($search = $searches->fetch()) : ?>
                    <tr>
                        <td><?php echo h($search['id']); ?></td>
                        <td>
                            <ruby>
                                <rb><?php echo h($search['user_name']); ?></rb>
                                <rt><?php echo h($search['phonetic']); ?></rt>
                            </ruby>
                        </td>
                        <td><?php echo h($search['created_at']); ?></td>
                        <td><?php echo h($search['prefecture_name']); ?></td>
                        <td>
                        <?php
                        // 誕生日の日付から年齢を計算 
                        $now = date("Ymd");
                        $birthday = str_replace("/", "", $search['birthday']);
                        echo floor(($now - $birthday) / 10000) . '歳';
                        ?>
                        </td>                        <td><?php echo h($search['status_name']); ?></td>
                        <td><a href="detail.php?id=<?php echo h($search['id']); ?>">詳細</a></td>
                    </tr>
                <?php endwhile; ?>
            </div>
        </table>
    </section>
    </main>
</body>

</html>