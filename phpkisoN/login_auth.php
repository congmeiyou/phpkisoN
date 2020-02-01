<?php
//会員登録
    header("Content-Type: text/html;charset=utf-8");
    $mailaddress=$_POST['mailaddress']; //$_POST 变量是一个数组，内容是由 HTTPPOST方法发送的变量名称和值
    $password=$_POST['pwd'];
    if($mailaddress==""){
        echo "ログインIDを入力してくだ";
        echo "<a href='index.html'>戻る</a>";
    }elseif($password==""){
        echo  "パスワードを入力してください";
        echo "<a href='index.html'>戻る</a>";
    }else{

        $host='localhost';
        $user='root';
        $passwd='';   
        $database='phpkiso';
        $port=0;
        $db = mysqli_connect($host,$user,$passwd,$database,$port); 
        $db->set_charset('utf8'); 
        $sql="SELECT * FROM username WHERE mailaddress='$mailaddress' AND password='$password'";
        $result = $db->query($sql); 

        if($row = $result->fetch_array()){
           if ($row["auth"]=="1"){
              require("confirm.php");
           }else{
              $code=$row["code"];
              $sql2="SELECT * FROM hr1 WHERE code='$code'";
              $result2 = $db->query($sql2);
              $editF="";
              if($row2 = $result2->fetch_array()){
                 $editF="1";
              }
              $url="confirmU.php?code=$code&mailaddress=$mailaddress&editF=$editF"; 
              echo "<script language='javascript' type='text/javascript'>";
              echo "window.location.href='$url'";
              echo "</script>";
           }
           
        }else{
           echo "ユーザー名またはパスワードは正しくないです<br/>\n";
           echo "<a href='index.html'>戻る</a>";
        }
    }



 ?>