<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<?php

//管理者編集
$dsn='mysql:dbname=phpkiso;host=localhost';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql='SELECT * FROM hr1 WHERE name1=? And name2=? And telephone=? And mailaddress=?';


$stmt=$dbh->prepare($sql);
$data[]=$_POST['nickname1'];
$data[]=$_POST['nickname2'];
$data[]=$_POST['telephone'];
$data[]=$_POST['mailaddress'];
$stmt->execute($data);
//抽出したデータをセッションに設定
while(1)
{
   $rec=$stmt->fetch(PDO::FETCH_ASSOC);
   if($rec==false)
   {
      break;
   }
#    $array = explode(" ",$rec["name"]);
#var_dump($array);
    $name1=$rec["name1"];
    $name2=$rec["name2"];
    $sex=$rec["sex"];
    $yymmdd=$rec["yymmdd"];
    $job=$rec["job"];
    $content=$rec["content"];
    $postcode1=$rec["postcode1"];
    $postcode2=$rec["postcode2"];
    $pref1=$rec["pref"];
    $add=$rec["address"];
    $telephone=$rec["telephone"];
    $mailaddress=$rec["mailaddress"];
    $ck=$rec["ck"];
    $code=$rec["code"];
}
$dbh = null;

if(empty($name1)){
   echo 'ユーザーが存在しないか入力情報に誤りがあります、ご確認ください。';
   echo '<a href="edit.html">戻る</a>';
   exit();
}
?>
<h3>個人プロフィール</h3>
<font color="red">※の項目は必須項目です</font>
<form method="post" action="update.php">

<table border="1">
<tr>
<td>お名前&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>姓&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;名
<br/>
<input name="nickname1" id="name1" type="text" value="<?php echo $name1 ?>" style="width:100px">
<input name="nickname2" id="name2" type="text" value="<?php echo $name2 ?>" style="width:100px">
</td>
</tr>

<tr>
<td>性別&emsp;&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>

<?php if($sex=="女"){$sex1="checked";$sex2="";}else{$sex1="";$sex2="checked";}; ?>

<td><input type="radio", name="sex" value="女" <?php echo $sex1 ?>>女
<input type="radio", name="sex" value="男" <?php echo $sex2 ?>>男
</td>
</tr>

<tr>
<td>生年月日&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>
<?php
echo '<select name="yyyy">';
echo '<option>'.substr($yymmdd,0,4);
for ($i=1951; $i<= 2019; $i++) {
echo "<option>$i";
}

echo '</select>年';

echo '<select name="mm">';
echo '<option>'.substr($yymmdd,4,2);
$months=array('02','03','04','05','06','07','08','09','10','11','12');
foreach ($months as $month ) {
echo "<option>$month";
}
echo '</select>月';

echo '<select name="dd">';
echo '<option>'.substr($yymmdd,6,2);
$days=array('02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
foreach ($days as $day) {
echo "<option>$day";
}
echo '</select>日';
       
?>
</td>
</tr>
<tr>
<td>直近の職業</td>
<td><textarea name="job" rows="2" cols="58"><?php echo $job ?>
</textarea>
</td>
</tr>

<tr>
<td>概要</td>
<td><textarea name="content" rows="5" cols="58"><?php echo $content ?>
</textarea>
</td>
</tr>

<tr>
<td>現住所&emsp;&emsp;&emsp;&ensp;</td>
<td>
〒<input onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" id="postcode1" name="postcode1" size="4" maxlength="3" value="<?php echo $postcode1 ?>">&ensp;-&ensp;
<input onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" id="postcode2" name="postcode2" size="4" maxlength="4" value="<?php echo $postcode2 ?>">
例:221-0001
<br/>
都道府県&emsp;&emsp;
<select name="pref" id="pref">
<option><?php echo $pref1 ?></option>
<?php
$prefs = array ('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','新潟県','富山県','石川県','福井県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
foreach($prefs as $pref){
	   print('<option>'.$pref.'</option>');
}
?>
</select>
<br/>
市区町村以降
<input name="add" value="<?php echo $add ?>" type="text" style="width:300px">
</td>
</tr>

<tr>
<td>連絡先&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>電話番号<br/>
<input onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" id="tel" name="telephone" maxlength="11" value=<?php echo $telephone ?>>
例:08011112222
<br/>
メールアドレス
<br/>
<input name="mailaddress" id="madd" value=<?php echo $mailaddress ?> type="text" style="width:200px">
例:abc@gmail.com
</td>
</tr>

<tr>
<td>連絡可能時間帯</td>
<td>
  <?php
   $check=explode(',',$ck);
   $ckd1="";
   $ckd2="";
   $ckd3="";
   for($i=0;$i<count($check);$i++){
      if($check[$i]=="1"){
         $ckd1="checked";
      }elseif($check[$i]=="2"){
         $ckd2="checked";
      }elseif($check[$i]=="3"){
         $ckd3="checked";
      }
   }
  ?>
<input type="checkbox" name="ck[]" value="1" <?php echo $ckd1 ?>>9:00-12:00
<input type="checkbox" name="ck[]" value="2" <?php echo $ckd2 ?>>12:00-16:00
<input type="checkbox" name="ck[]" value="3" <?php echo $ckd3 ?>>16:00-18:00
</td>
</tr>

<tr>
<td>
写真アップロード
</td>
<td>
 <div class="wrapper">
     <div class="container-fluid">
 
         <!-- end page title -->
 
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <form class="form-horizontal">
                             <div class="form-group row">
                                 
                                 <div class="col-sm-10">
                                    <img id="img" height="100" src=""><br/>
                                     <a href="javascript:;" class="file">選択
                                         <input type="file" name="img" required>
                                     </a>
                                     
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label class="col-sm-2 col-form-label"></label>
                                 <div class="col-sm-10">
                                     <button type="button" class="btn btn-primary" onclick="return preserve()">保存</button>
                                 </div>
                             </div>
                         </form>
 
                     </div> <!-- end card-box -->
                 </div> <!-- end card-->
             </div><!-- end col -->
         </div>
         <!-- end row -->
 
     </div>
 </div>
</td>
</tr>
</table>

<br/>
<input name="code" type="hidden" value="<?php echo $_GET['code']?>">
<input type="submit" values="送信" onclick="return Check()">
<script>
function Check()
{
   if(document.getElementById("name1").value=="")
   {
    alert('姓の項目は必須項目です。');
　　 return false;
   }
   if(document.getElementById("name2").value=="")
   {
    alert('名の項目は必須項目です。');
      return false;
   }
   if(document.getElementById("tel").value=="")
   {
    alert('電話番号の項目は必須項目です。');
      return false;
   }
   if(document.getElementById("madd").value=="")
   {
    alert('メールアドレスの項目は必須項目です。');
      return false;
   }

         return true;
}
</script>
&emsp;<input type="button" onclick="history.back()" value="戻る">

</form>


</body>
</html>
<script>
     function preserve()
     {
         var formData    = new FormData();
         var img = $("[name='img']").prop('files')[0];/*获取上传图片的信息*/
         formData.append("img",img);
         $.ajax({
             type : "post",
             url : "{:URL('./pic')}",/*此处填写上传路径*/
             processData : false,
             contentType : false,
             data : formData,
             success : function(data) {
 
             }
         });
     }
 
 </script>
 <!-- 上传图片并预览的js文件 start  无需改动-->
 <script type="text/javascript">
     var small_img = document.querySelector('input[name=small_img]');
     var img = document.querySelector('input[name=img]');
     small_imgs = document.querySelector('#small_img');
     imgs = document.querySelector('#img');
     if (small_img) {
         small_img.addEventListener('change', function() {
             var file = this.files[0];
             var reader = new FileReader();
             // 监听reader对象的的onload事件，当图片加载完成时，把base64编码賦值给预览图片
             reader.addEventListener("load", function() {
                 small_imgs.src = reader.result;
             }, false);
             // 调用reader.readAsDataURL()方法，把图片转成base64
             reader.readAsDataURL(file);
             $("img").eq(0).css("display", "block");
         }, false);
     }
     if(img){
         img.addEventListener('change', function() {
             var file = this.files[0];
             var reader = new FileReader();
             // 监听reader对象的的onload事件，当图片加载完成时，把base64编码賦值给预览图片
             reader.addEventListener("load", function() {
                 imgs.src = reader.result;
             }, false);
             // 调用reader.readAsDataURL()方法，把图片转成base64
             reader.readAsDataURL(file);
             $("img").eq(1).css("display", "block");
         }, false);
     }
 </script>
 <!-- 上传图片并预览的js文件 end -->
