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
管理者へ
<h3>会員情報管理</h3>
<form>
&emsp;&emsp;<a href='ichiranN.php'>会員情報一覧</a>
<br/>
&emsp;&emsp;<a href='delete.html'>会員情報削除</a>
<br/>

&emsp;&emsp;<a href="edit.html">会員情報編集</a>
</form>

&emsp;&emsp;&emsp;&emsp;&ensp;<a href="http://www.google.co.jp">Google</a>


</form>

</body>
</html>
