<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PHP基礎</title>
</head>
<body>

<h3>個人プロフィール</h3>
<font color="red">※の項目は必須項目です</font>
<form method="post" action="checkN.php" enctype="multipart/form-data">

<table border="1">
<tr>
<td>お名前&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>姓&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;名
<br/>
<input name="nickname1" id="name1" type="text" style="width:100px">
<input name="nickname2" id="name2" type="text" style="width:100px">
</td>
</tr>

<tr>
<td>性別&emsp;&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td><input type="radio", name="sex" id="sex1" value="女">女
<input type="radio", name="sex" id="sex2" value="男">男
</td>
</tr>

<tr>
<td>生年月日&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>
<?php
echo '<select name="yyyy">';
for ($i=1950; $i<= 2019; $i++) {
echo "<option>$i";
}
echo '</select>年';

echo '<select name="mm">';
$months=array('01','02','03','04','05','06','07','08','09','10','11','12');
foreach ($months as $month ) {
echo "<option>$month";
}
echo '</select>月';

echo '<select name="dd">';
$days=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
foreach ($days as $day) {
echo "<option>$day";
}
echo '</select>日';
       
?>
</td>
</tr>

<tr>
<td>直近の職業</td>
<td><textarea name="job" rows="2" cols="58">
</textarea>
</td>
</tr>

<tr>
<td>概要</td>
<td><textarea name="content" rows="5" cols="58">
</textarea>
</td>
</tr>

<tr>
<td>現住所&emsp;&emsp;</td>
<td>
〒<input onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" id="postcode1" name="postcode1" size="4" maxlength="3">&ensp;-&ensp;
<input onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" id="postcode2" name="postcode2" size="4" maxlength="4">
例:221-0001
<br/>
都道府県&emsp;&emsp;
<select name="pref" id="pref">
<?php
$prefs = array ('お選びください','北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','新潟県','富山県','石川県','福井県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
foreach($prefs as $pref){
	   print('<option value="'.$pref.'">'.$pref.'</option>');
}
?>
</select>
<br/>
市区町村以降
<input name="add" type="text" style="width:300px">
</td>
</tr>

<tr>
<td>連絡先&emsp;&emsp;&emsp;&ensp;<font color="red">※</font></td>
<td>電話番号<br/>
<input onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" id="tel" name="telephone" maxlength="11">
例:08011112222
<br/>
メールアドレス
<br/>
<input name="mailaddress" id="madd" type="text" style="width:200px">
例:abc@gmail.com
</td>
</tr>

<tr>
<td>連絡可能時間帯</td>
<td>
<input type="checkbox" name="ck[]" id="ck1" value="1">9:00-12:00
<input type="checkbox" name="ck[]" id="ck2" value="2">12:00-16:00
<input type="checkbox" name="ck[]" id="ck3" value="3">16:00-18:00
</td>
</tr>

<tr>
<td>
写真アップロード
</td>
<td>

<img id="img" height="100" src=""><br/>
 <a href="javascript:;" class="file">選択
     <input type="file" name="img">
 </a>
</td>
</tr>
</table>
<br/>

<input name="code" type="hidden" value="<?php echo $_GET['code']?>">
<input type="submit" values="送信" onclick="return Check()">

<script type="text/javascript">
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
    if(document.getElementById("sex1").checked=="" && document.getElementById("sex2").checked=="")
   {
      alert('性別の項目は必須項目です。');
      return false;
   }
   var tele = document.getElementById("tel").value.substring(0,3);
   var tlength = document.getElementById("tel").value.length;
   if(document.getElementById("tel").value=="")
   {
      alert('電話番号の項目は必須項目です。');
      return false;
   }else if(tele!=="070" && tele!=="080" && tele!=="090"){
      alert('電話番号が070/080/090から始まる番号を指定してください。');
      return false;
   }else if(tlength!=11){
      alert('不正な電話番号です。');
      return false;
   }
   if(document.getElementById("madd").value=="")
   {
      alert('メールアドレスの項目は必須項目です。');
      return false;
   }else if(document.getElementById("madd").value!=="<?php echo $_GET['mailaddress'] ?>"){
      alert('メールアドレスの項目はログインのメールアドレスと一致しません、確認してください。');
      return false;
   }
   var str=document.getElementById("madd").value;
   var ix=str.indexOf('@');
   if(ix == -1){
	   alert('メールアドレスが無効です。');
       return false;
   }
	
       return true;
}
</script>

&emsp;<input type="button" onclick="history.back()" value="戻る">

</form>

</body>
</html>

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
