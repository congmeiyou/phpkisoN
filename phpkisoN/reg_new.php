
<?php
    $mailaddress=$_POST['mailaddress']; 
    $password=$_POST['pwd'];
    //メールアドレス正規表現チェック
    if(preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $mailaddress)){
        list($username,$domain) = explode('@',$mailaddress);
        if(!checkdnsrr($domain,'MX')){
            echo "不正なメールアドレス\n";
            echo "<a href='indexNL.html'>戻る</a>";
            return false;
        }
    }else{
        echo "不正なメールアドレス<br/>\n";
        echo "<a href='indexNL.html'>戻る</a>";
        return false;
    }

    //新規登録
    header("Content-Type: text/html;charset=utf-8");
        $host='localhost';
        $user='root';
        $passwd='';   
        $database='phpkiso';
        $port=0;
        $db = mysqli_connect($host,$user,$passwd,$database,$port); 
        $db->set_charset('utf8'); 
        $sql="SELECT * FROM username WHERE mailaddress='$mailaddress'";
        $result = $db->query($sql); 
    
        if($row = $result->fetch_array()){
           echo  "当該ログインIDが既に登録されています。ほかのIDをご使用ください<br/>\n";
           echo "<a href='indexNL.html'>戻る</a>";
           return false;
           
			print'<input type="button" onclick="history.back()" value="戻る">&emsp;';
        }else{
           require("indexNL.php");//插入数据库
           echo "<a href='index.html'>ログイン画面へ</a>";
           return true;
           
        }
 
 ?>