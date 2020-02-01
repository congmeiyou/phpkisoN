<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<h3>登録内容確認</h3>
<?php

$nickname1=$_POST['nickname1'];
$nickname2=$_POST['nickname2'];
$sex=$_POST['sex'];
$yyyy=$_POST["yyyy"];
$mm=$_POST["mm"];
$dd=$_POST["dd"];
$yymmdd=$yyyy.$mm.$dd;
$job=$_POST['job'];
$content=$_POST['content'];
$postcode1=$_POST['postcode1'];
$postcode2=$_POST['postcode2'];
$pref=$_POST['pref'];
$add=$_POST['add'];
$telephone=$_POST['telephone'];
$mailaddress=$_POST['mailaddress'];


$code=$_POST['code'];

?>

<table border="1">
<tr>
<td>お名前&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>
<?php print $nickname1.$nickname2 ?>
</td>
</tr>

<tr>
<td>性別&emsp;&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>
<?php print $sex ?>
</td>
</tr>

<tr>
<td>生年月日&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>
<?php print $yyyy.'年'.$mm.'月'.$dd.'日' ?>
</td>
</tr>

<tr>
<td>直近の職業</td>
<td>
<?php print $job ?>
</td>
</tr>

<tr>
<td>概要</td>
<td>
<?php print $content ?>
</td>
</tr>

<tr>
<td>現住所&emsp;&emsp;</td>
<td>郵便番号：
<?php print"〒".$postcode1."-".$postcode2 ?>
<br/>
都道府県：
<?php print $pref?>
<br/>
市区町村以降：
<?php print $add ?>
</td>
</tr>

<tr>
<td>連絡先&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>電話番号：
<?php print $telephone ?>
<br/>
メールアドレス：
<?php print $mailaddress ?>
</td>
</tr>

<tr>
<td>連絡可能時間帯</td>
<td>
<?php
if(empty($_POST['ck'])){
   $check='';
 } else{

   for($i=0;$i<count($_POST['ck']);$i++){
      if ($_POST['ck'][$i]=="1"){
         echo "9:00-12:00&emsp;";
      }elseif ($_POST['ck'][$i]=="2"){
         echo "12:00-16:00&emsp;";
      }else{
         echo "16:00-18:00";
      }
   }
$ck=$_POST['ck'];
$check=implode(',',$ck);
}
?>
</td>
</tr>

<tr>
<td>
写真アップロード
</td>
<td>
<?php
if(!empty($_FILES['img']['name'])){
    $file=$_FILES['img'];
    $ext = substr($file['name'],-4);
    if ($ext =='.gif' || $ext =='.jpg' || $ext =='.png'):
       $filePath ='./user_img/' . $file['name'];
       $success = move_uploaded_file($file['tmp_name'],$filePath);

       if ($success){
          $img=$filePath;
       }else{
          echo "ファイルアップロード失敗しました!";
       }
       
    else:
       echo "ファイルをアップロードしてください";
    endif;
}else{
   //print '<img height="100" src="'.$filePath.'">'
   $img=$_POST['img'];
}
print '<img height="100" src="'.$img.'">';
 ?>
</td>
</tr>
</table>
<br/>

<?php
print'<br/>';
print'<br/>';
print'<form method="post" action="updateU2.php">';

print'<input name="nickname1" type="hidden" value="'.$nickname1.'">';
print'<input name="nickname2" type="hidden" value="'.$nickname2.'">';
print'<input name="sex" type="hidden" value="'.$sex.'">';
print'<input name="yymmdd" type="hidden" value="'.$yymmdd.'">';
print'<input name="job" type="hidden" value="'.$job.'">';
print'<input name="content" type="hidden" value="'.$content.'">';
print'<input name="postcode1" type="hidden" value="'.$postcode1.'">';
print'<input name="postcode2" type="hidden" value="'.$postcode2.'">';
print'<input name="pref" type="hidden" value="'.$pref.'">';
print'<input name="add" type="hidden" value="'.$add.'">';
print'<input name="telephone" type="hidden" value="'.$telephone.'">';
print'<input name="mailaddress" type="hidden" value="'.$mailaddress.'">';
print'<input name="check" type="hidden" value="'.$check.'">';
print'<input name="img" type="hidden" value="'.$img.'">';
print'<input name="code" type="hidden" value="'.$code.'">';

print'以上の内容がよろしければ、「登録」ボタンを押してください。';
print'<br/>';
print'登録の内容を追加・修正する場合は、「戻る」ボタンを押してください。';
print'<br/>';
print'<br/>';

print'<input type="button" onclick="history.back()" value="戻る">&emsp;';
print'<input type="submit" value="登録">';
print'</form>';

?>
</body>
</html>

