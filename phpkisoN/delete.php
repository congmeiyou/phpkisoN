<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<?php

$telephone=$_POST['telephone'];
print'会員の情報を削除しました。';

$dsn='mysql:dbname=phpkiso;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql='DELETE FROM hr1 WHERE name1=? and name2=? and telephone=? and mailaddress=?';


$stmt=$dbh->prepare($sql);
$data[]=$_POST['nickname1'];
$data[]=$_POST['nickname2'];
$data[]=$_POST['telephone'];
$data[]=$_POST['mailaddress'];
$stmt->execute($data);

$dbh = null;

print'<br/>';
print'<br/>';
print'<a href="confirm.php">会員情報管理へ戻る</a>'
?>

</body>
</html>
