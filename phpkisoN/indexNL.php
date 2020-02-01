<?php
    $fromurl="http://localhost/phpkisoN/";
    if($_SERVER['HTTP_REFERER'] == ""){
     header("Location:".$fromurl);
     exit;
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<?php
$mailaddress=$_POST['mailaddress'];
$pwd=$_POST['pwd'];

$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql='INSERT INTO username(mailaddress,password)VALUES(?,?)';
$stmt = $dbh->prepare($sql);
$data[] = $mailaddress;
$data[] = $pwd; 
$stmt->execute($data);


$dbh = null;

print'ご登録を成功しました。';
print'<br/>';
print'引き続き個人情報を入力しましょう。';
print'<br/>';

?>

</body>
</html>
