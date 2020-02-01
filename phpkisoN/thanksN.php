<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<?php

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
$img=$_POST['img'];
$code=$_POST['code'];

$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql='INSERT INTO hr1(name1,name2,sex,yymmdd,job,content,postcode1,postcode2,pref,address,telephone,mailaddress,ck,photo,code)VALUES("'.$nickname1.'","'.$nickname2.'","'.$sex.'","'.$yymmdd.'","'.$job.'","'.$content.'","'.$postcode1.'","'.$postcode2.'","'.$pref.'","'.$add.'","'.$telephone.'","'.$mailaddress.'","'.$check.'","'.$img.'","'.$code.'")';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print'ご登録ありがとうございました。';
print'<br/>';
print'<br/>';
print'<a href="confirmU.php?code='.$code.'&editF=1">マイページへ戻る</a>'
?>

</body>
</html>
