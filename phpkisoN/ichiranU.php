<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<h3>会員情報</h3>
<script>
         function submitChk () {
                 var flag = confirm ( "削除してもよろしいですか？\n\n削除したくない場合は[キャンセル]ボタンを押して下さい");
                 return flag;
    }
</script>

<form method="post" action="delete.php" onsubmit="return submitChk()">
<?php

$nickname1=$_POST['nickname1'];
$nickname2=$_POST['nickname2'];
$telephone=$_POST['telephone'];
$mailaddress=$_POST['mailaddress'];

$dsn='mysql:dbname=phpkiso;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql='select*from hr1 where name1=? And name2=? And telephone=? And mailaddress=?';
$stmt=$dbh->prepare($sql);
$data[]=$nickname1;
$data[]=$nickname2;
$data[]=$telephone;
$data[]=$mailaddress;
$stmt->execute($data);



while(1)
{
   $rec=$stmt->fetch(PDO::FETCH_ASSOC);
   if($rec==false)
   {
      break;
   }
   
   $name1=$rec["name1"];
   if(!empty($name1)){
      echo "<table border=\"1\">";
      echo "<tr>";
      echo "<td>名前</td>";
      echo "<td>性別</td>";
      echo "<td>生年月日</td>";
      echo "<td>前職</td>";
      echo "<td>前職の仕事内容</td>";
      echo "<td>郵便番号</td>";
      echo "<td>現住所</td>";
      echo "<td>電話番号</td>";
      echo "<td>メールアドレス</td>";
      echo "<td>連絡時間帯</td>";
      echo "<td>写真</td>";
      echo "<td>コード</td>";
      echo "</tr>";
      print "<td>".$rec["name1"].$rec["name2"]."</td>";
      print "<td>".$rec["sex"]."</td>";
         
         
      print "<td>".$rec["yymmdd"]."</td>";
      print "<td>".$rec["job"]."</td>";
      print "<td>".$rec["content"]."</td>";
      print "<td>".$rec["postcode1"].$rec["postcode2"]."</td>";
      print "<td>".$rec["pref"].$rec["address"]."</td>";
      print "<td>".$rec["telephone"]."</td>";
      print "<td>".$rec["mailaddress"]."</td>";
   
      if($rec["ck"]==""){
         $chlen="";
      }else{
         $check=explode(',',$rec["ck"]);
         $chlen="";
         for($i=0;$i<count($check);$i++){
            if ($check[$i]=="1"){
               $chlen=$chlen."9:00-12:00&ensp;";
            }elseif ($check[$i]=="2"){
               $chlen=$chlen."12:00-16:00&ensp;";
            }else{
               $chlen=$chlen."16:00-18:00&ensp;";
            }
         }
      }
      print "<td>".$chlen."</td>";
      
      print "<td><img height='100' src='".$rec["photo"]."' /></td>";
      print "<td>".$rec["code"]."</td>";
      print "</tr>";
      echo "</table>";
 }
}


$dbh = null;
if(empty($name1)){
   echo 'ユーザーが存在しないか入力情報に誤りがあります、ご確認ください。';
   echo '<a href="edit.html">戻る</a>';
   exit();
}
print'<br/>';

print'<input name="nickname1" type="hidden" value="'.$nickname1.'">';
print'<input name="nickname2" type="hidden" value="'.$nickname2.'">';
print'<input name="telephone" type="hidden" value="'.$telephone.'">';
print'<input name="mailaddress" type="hidden" value="'.$mailaddress.'">';
print'<input type="submit" value="削除">&emsp;';

print'<input type="button" onclick="history.back()" value="戻る">';
?>
</form>
</body>
</html>
