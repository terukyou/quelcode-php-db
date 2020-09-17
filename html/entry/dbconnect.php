<?php
try {
    $db = new PDO('mysql:dbname=phpdb;host=127.0.0.1;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo 'DB接続エラー： ' . $e->getMessage();
}
// セレクトタグの選択した内容をselectedにする
function selected($key, $option)
{
    echo array_key_exists($key, $_POST) && $_POST[$key] == $option ? 'selected' : '';
}
function h($value)
{
    return htmlspecialchars($value, ENT_QUOTES);
}
