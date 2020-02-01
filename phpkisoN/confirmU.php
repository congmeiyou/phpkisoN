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
マイページ
&emsp;&emsp;&emsp;<h3>登録情報</h3>
<form>

<?php
if(isset($_GET['editF']) and $_GET['editF']=="1"){
?>
<a href="editU.php?code=<?php echo $_GET['code'] ?>&mailaddress=<?php echo $_GET['mailaddress'] ?>">履歴書修正</a>
<?php }else{ ?>
<a href="indexN.php?code=<?php echo $_GET['code']?>&mailaddress=<?php echo $_GET['mailaddress'] ?>">履歴書作成</a>
<?php } ?>

<br/>
<br/>
</form>

<a href="http://www.google.co.jp">Google</a>
&emsp;&ensp;<a href="https://www.sunseer.co.jp/">ホームページ</a>

</form>

</body>
</html>
