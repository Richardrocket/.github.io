<?php
  require_once("dbtools.inc.php");
  
  //取得表單資料
  $name = $_POST["name"];
  $mail = $_POST["mail"]; 
  $problem = $_POST["problem"]; 

  //建立資料連接
  $link = create_connection();
			
 
		
    //執行 SQL 命令，新增此帳號
    $sql = "INSERT INTO problem(name, mail,problem) VALUES ('$name', '$mail', 
            '$problem')";

    $result = execute_sql($link, "member", $sql);
  
	
  //關閉資料連接	
  mysqli_close($link);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>訊息傳遞成功</title>
  </head>
  <body bgcolor="#FFFFFF">
    
    <p align="center">感謝你協助我們改善網頁，告訴我們
      <font color="#FF0000"><?php echo $problem ?></font>的問題    
    </p>
    <p align="center">
    請按下此按鈕即可回首頁
        <button onclick="location.href='index.html'">
        </button>
    </p>
  </body>
</html>