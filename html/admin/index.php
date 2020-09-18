<?php
require('../entry/dbconnect.php');
// ステータスID、ステータス名、件数を抽出
$status = $db->query('SELECT count(*) AS cnt, status_id ,status.name AS status_name FROM users,status WHERE users.status_id=status.id GROUP BY status_id');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="..\entry\style.css">
    <title>トップ</title>
</head>

<body>
<main class="flex">
    <header>
        <a href="#">トップ</a>
        <a href="./data/list.php">申し込み</a>
    </header>
    <section>
        <h2>トップページ</h2>
        <table border="">
            <div class="states">
                <tr>
                    申し込み件数
                    <td>ステータス</td>
                    <td>件数</td>
                </tr>
                <?php while ($statu = $status->fetch()) : ?>
                    <tr>
                        <td> <a href=""><?php echo h($statu['status_name']); ?></a></td>
                        <td><?php echo h($statu['cnt']); ?></td>
                    </tr>
                <?php endwhile; ?>
                <tr>
                    <td>合計</td>
                    <td>
                    <?php
                    $sums = $db->query('SELECT COUNT(id) AS cnt FROM users');
                    $sum = $sums->fetch();
                    echo h($sum['cnt']);
                    ?>
                    </td>
                </tr>
            </div>
        </table>
    </section>
</main>
</body>

</html>