<?php
require_once("dbtools.inc.php");
   $good=$_SERVER['HTTP_REFERER'];    //讀取前一頁透過連結過來的網址
   $name=$_POST["name"];
   $db_name="";
   echo $good;
    
		
    //建立資料連接
    $link = create_connection();

	$sql="SELECT * FROM `likeform` WHERE `name`='$name'";
    $result=execute_sql($link, "member", $sql);
    
    while($row=mysqli_fetch_array($result)){
        $db_name=$row['name'];
    }
    //執行 INSERT 陳述式來新曾使用者資料
    if ($name!=$db_name){
    $sql1 = "INSERT INTO likeform(name,good) VALUES ('$name','$good')";
    $result1 = execute_sql($link, "member", $sql1);
     }
    
    
    //關閉資料連接
    mysqli_close($link);
    echo "<script>history.go(-1)</script>";
    exit();
?>

