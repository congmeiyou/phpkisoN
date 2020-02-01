<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<h3>会員情報一覧</h3>

<?php
$dsn='mysql:dbname=phpkiso;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql='select*from hr1 order by code';
$stmt=$dbh->prepare($sql);
$stmt->execute();

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

while(1)
{
   $rec=$stmt->fetch(PDO::FETCH_ASSOC);
   if($rec==false)
   {
      break;
}
   echo "<tr>";
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

}
echo "</table>";

$dbh = null;
print'<br/>';
print'<input type="button" onclick="history.back()" value="戻る">';
?>

</body>
</html>
