<?php require('../../entry/dbconnect.php');
$updates=$db->prepare('UPDATE users SET status_id=? WHERE id=?');
$updates->bindValue(1,$_POST['status'],PDO::PARAM_INT);
$updates->bindValue(2,$_POST['id'],PDO::PARAM_INT);
$updates->execute();
header('Location:detail.php?id='.$_POST['id']);
exit();
