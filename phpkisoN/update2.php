<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<?php

#var_dump($_POST);

$nickname1=$_POST['nickname1'];
$nickname2=$_POST['nickname2'];
$sex=$_POST['sex'];
$yymmdd=$_POST["yymmdd"];
$job=$_POST['job'];
$content=$_POST['content'];
$postcode1=$_POST['postcode1'];
$postcode2=$_POST['postcode2'];
$pref=$_POST['pref'];
$add=$_POST['add'];
$telephone=$_POST['telephone'];
$mailaddress=$_POST['mailaddress'];
$check=$_POST['check'];
$code=$_POST['code'];
$img=$_POST['img'];

$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql='update hr1 set sex="'.$sex.'", yymmdd="'.$yymmdd.'", job="'.$job.'", content="'.$content.'", postcode1="'.$postcode1.
'",postcode2="'.$postcode2.'", pref="'.$pref.'", address="'.$add.'", ck="'.$check.'",photo="'.$img.'" where name1="'.$nickname1.
'" and name2="'.$nickname2.'" and telephone="'.$telephone.'" and mailaddress="'.$mailaddress.'"';

$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print'会員情報を修正しました、ありがとうございました。';
print'<br/>';
print'<br/>';
print'<a href="confirm.php">会員情報管理へ戻る</a>'
?>

</body>
</html>
