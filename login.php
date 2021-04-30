<?php
session_start();
//如果沒有登入Session值或是Session值為空則執行登入動作
if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	if(isset($_POST["username"]) && isset($_POST["passwd"])){
		require_once("connMysql.php");		
		//選取儲存帳號密碼的資料表
		$sql_query = "SELECT * FROM admin";
		$result = $db_link->query($sql_query);		
		//取出帳號密碼的值
		$row_result=$result->fetch_assoc();
		$username = $row_result["username"];
		$passwd = $row_result["passwd"];
		$db_link->close();
		//比對帳號密碼，若登入成功則進往管理界面admin.php，否則就退回主畫面index.php。
		if(($username==$_POST["username"]) && ($passwd==$_POST["passwd"])){
			$_SESSION["loginMember"]=$username;
			header("Location: admin.php");
		}else{
			header("Location: comment.php");
		}
	}
}else{
	//若已經有登入Session值則前往管理界面
	header("Location: admin.php");
}
?>
<html>
<head>
<title>訪客留言版</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-4.3.1.css" rel="stylesheet" />
<script src="js/js/jquery-3.3.1.min.js"></script>
<script src="js/js/bootstrap.min.js"></script>
<style>

.bg-green {
    background-color: #10cfc9;
    box-shadow: 0px 3px 8px 0px #000;
}
.bg-green li a:hover{
			background-color: #c8c8c8;
		}
.site-footer {
	margin-top: 50px;
	color: #10cfc9;
	padding: 25px 0;
	border-top: 1px solid rgba(182,182,182,1.00);
	background-color: #10cfc9;
}
.social {
    text-align: right;
	margin: 0px;
	padding: 0px;
}
.social li {
    list-style-type: none;
	margin-right: 5px;
	display: inline-block;
}
.social li a {
	color: white;
	width: 40px;
	height: 40px;
	text-align: center;
	line-height: 40px;
	background-color: #10cfc9;
	font-size: 20px;
	border-radius: 10px;
}
.site-footer span {
	margin-top: 12px;
	display: block;
	text-align: left;
}
@media (max-width:768px){
.site-footer span{
	text-align: center;
	margin-top: 15px;
	margin-bottom: 15px;
	}
}
</style>
</head>
<body bgcolor="#ffffff" style="padding-top: 250px" id="page-top">
<header> 
        <!--巡覽列-->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-green"> <a class="navbar-brand" href="index.html"> <img src="images/logo1.png" style="width:60px;" /> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#springnav" aria-controls="springnav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="springnav">
                        <ul class="navbar-nav mx-auto">
                                <li class="nav-item active" > <a class="nav-link" href="index.html" style="color: #fff;">🏘首頁</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="history.html" style="color: #fff;">📚台灣溫泉歷史</a> </li>
                                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;"> 🏖旅遊資訊 </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
											<a class="dropdown-item" href="intro.html">♨各地溫泉推薦</a> 
											<a class="dropdown-item" href="food.html">🍴各地美食</a> 
											<a class="dropdown-item" href="hot spring.html">📃泡湯須知</a> 
											<a class="dropdown-item" href="attraction.html">🏖附近景點</a>
										</div>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="contact.html" style="color: #fff;">✉聯絡我們</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="comment.php" style="color: #fff;">📝留言板</a> </li>
                                <li class="nav-item">
                        <a class="nav-link" href="member.html" style="color: #fff;">👤會員登入</a>
                    </li>
                                <li class="nav-item">
                        
                        <a class="nav-link" href="likeform.php" style="color: #fff;">❤我的收藏</a>
                    </li>
                        </ul>
                        <div class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color:#Eb5c01;">搜尋</button>
                        </div>
                </div>
        </nav>
</header>
<table class="table-active" width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    
           <th scope="col">
         </th >
           <th scope="col">
         </th >
          <th scope="col"><a href="comment.php"><img name="board_r1_c5" src="images/read.png" width="110" height="36" border="0" alt="瀏覽留言"></a></th >
          <th scope="col"><a href="post.php"><img name="board_r1_c7" src="images/post.png" width="110" height="36" border="0" alt="我要留言"></a></th >
         
  </tr>
  </thead>
  <tbody>
  <tr>
    
    <td ><div id="mainRegion">
        <form name="form1" method="post" action="">
          <table border="0" align="center" cellpadding="4" cellspacing="0">
            <tr valign="top">
              <td colspan="2" align="center" class="heading">登入管理</td>
            </tr>
            <tr valign="top">
              <td width="80" align="center"><img src="images/login.gif" alt="我要留言" width="80" height="80"></td>
              <td valign="middle"><p>管理員帳號
                  <input type="text" name="username" id="username">
                </p>
                <p>管理員密碼
                  <input type="password" name="passwd" id="passwd">
                </p>
                <p align="center">
                  <input type="submit" name="button" id="button" value="登入管理">
                  <input type="button" name="button3" id="button3" value="回上一頁" onClick="window.history.back();">
                </p></td>
            </tr>
          </table>
        </form>
      </div>
    </td>
    <td></td>
  </tr>
  <tr>
    <td>
    
    </td>
  </tr>
</table>
    
<div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <img src="images/logo1.png" style="width:90px;" />
                </div>
				<div class="col-md-5 col-sm-5 ">
				    <ul >
					<li><p class="text-black-50 h5"><img src="images/home icon.png" style="width:30px;" />&emsp;333桃園市龜山區德明路5號</p></li>
					<li><p class="text-black-50 h5">&thinsp;<img src="images/contact icon.png" style="width:20px;" />&thinsp;&emsp;TEL:(03)1234-5678</p></li>
					<li><p class="text-black-50 h5"><img src="images/mail icon.png" style="width:30px;" />&emsp;EMAIL:123456789@gmail.com</p></li>
					</ul>
				</div>
                <div class="col-md-5 col-sm-5" >
                    <ul class="social ">
                        <li><a href="https://www.facebook.com/%E6%BA%AB%E6%B3%89%E6%97%85%E9%81%8A%E8%A3%BD%E4%BD%9C-116067420260448" role="button">
					<img src="images/icons/fb.png" width="60" height="60">
				        </a></li>
                        <li><a href="https://lin.ee/G2Q1Tik" role="button">
					<img src="images/icons/line.png" width="60" height="60">
				        </a></li>
                        <li><a href="https://www.instagram.com/travel_hotspring/" role="button">
					<img src="images/icons/ig.png" width="60" height="60">
				        </a></li>
                        <li><a  href="https://twitter.com/iTripass" role="button">
					<img src="images/icons/twitter.png" width="60" height="60">
				        </a></li>
                        <li><a  href="https://sites.google.com/mail.mcu.edu.tw/cce" role="button">
					<img src="images/icons/gmail.png" width="60" height="60">
				        </a></li>
                    </ul>
                </div> 
            </div>
			
        </div> 
		
</div>
<footer style="background-color: #ceeaee">
		<div class="row" >
		      <div class="col-md-12 col-sm-12 text-center" >
			      <h5><strong>Copyright &copy;2020 Ming University 版權所有|powered by MCU CCE</strong></h5>
			  </div>
	    </div>
</footer>
</body>
</html>