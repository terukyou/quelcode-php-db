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
            </div>
        </table>
    </section>
    </main>
</body>

</html>