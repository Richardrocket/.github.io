<?php 
require_once("connMysql.php");
session_start();
//檢查是否經過登入
if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	header("Location: comment.php");
}
//執行登出動作,101行
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["loginMember"]);
	header("Location: comment.php");
}
//預設每頁筆數
$pageRow_records = 5;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages -1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecBoard = "SELECT * FROM board ORDER BY boardtime DESC";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數-5筆
$query_limit_RecBoard = $query_RecBoard." LIMIT {$startRow_records}, {$pageRow_records}";
//以加上限制顯示筆數的SQL敘述句查詢資料到 $RecBoard 中,在57行會用到
$RecBoard = $db_link->query($query_limit_RecBoard);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_RecBoard 中
$all_RecBoard = $db_link->query($query_RecBoard);
//計算總筆數
$total_records = $all_RecBoard->num_rows;
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records/$pageRow_records);
?>
<html>
<head>
<title>留言版管理員</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
<body style="padding-top: 100px" bgcolor="#ffffff">
<header> 
        <!--巡覽列-->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-green"> <a class="navbar-brand" href="index.html"> <img src="images/logo1.png" style="width:60px;" /> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#springnav" aria-controls="springnav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="springnav">
                        <ul class="navbar-nav mx-auto">
                                <li class="nav-item active" > <a class="nav-link" href="index.html" style="color: #fff;">🏘首頁</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="history.html" style="color: #fff;"> 📚台灣溫泉歷史</a> </li>
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
                                <input class="form-control mr-sm-2" type="search" placeholder="請輸入關鍵字" aria-label="Search" style="width:200px;height:35px;font-size: 17px;">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" onclick="location.href='search.html'" style="width:70px;height:35px;font-size: 17px;color:#Eb5c01;">搜尋</button>
                        </div>
                </div>
        </nav>
</header>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table align="left" border="0" cellpadding="0" cellspacing="0" width="700">
        <tr>
          <td ></td>
          <td width="15"><a href="?logout=true"><img name="admin_r4_c2" src="images/logout.png" width="77" height="31" border="0" alt="登出管理"></a></td>
        </tr>
    </table></td>
  </tr>
  
  <tr>
    <td ><div id="mainRegion">
        <?php	while($row_RecBoard=$RecBoard->fetch_assoc()){ ?>
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
          <tr valign="top" class="underline">
            <td width="60" align="center"><?php if($row_RecBoard["boardsex"]=="男"){;?>
              <img src="images/male.png" alt="我是男生" width="49" height="49">
              <?php }else{?>
              <img src="images/female.png" alt="我是女生" width="49" height="49">
              <?php }?>
              <br>
              <span class="postname"><?php echo $row_RecBoard["boardname"];?></span></td>
            <td class="underline">              
              <span class="smalltext">[<?php echo $row_RecBoard["boardid"];?>]</span><span class="heading"> <?php echo $row_RecBoard["boardsubject"];?></span>
              <div class="actiondiv"><a href="adminfix.php?id=<?php echo $row_RecBoard["boardid"];?>">[修改]</a>&nbsp;<a href="admindel.php?id=<?php echo $row_RecBoard["boardid"];?>">[刪除]</a></div>
              <p><?php echo nl2br($row_RecBoard["boardcontent"]);?></p>
              <p align="right" class="smalltext"><?php echo $row_RecBoard["boardtime"];?>
                <?php if($row_RecBoard["boardmail"]!=""){?>
                <a href="mailto:<?php echo $row_RecBoard["boardmail"];?>"><img src="images/email-a.png" alt="電子郵件" width="16" height="16" border="0" align="absmiddle"></a>
                <?php }?>
                <?php if($row_RecBoard["boardweb"]!=""){?>
                <a href="<?php echo $row_RecBoard["boardweb"];?>"><img src="images/home-a.png" alt="個人網站" width="16" height="16" border="0" align="absmiddle"></a>
                <?php }?>
              </p></td>
          </tr>
        </table>
        <?php }?>
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <td valign="middle"><p>資料筆數：<?php echo $total_records;?></p></td>
            <td align="right"><p>
                <?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
                <a href="?page=1">第一頁</a> | <a href="?page=<?php echo $num_pages-1;?>">上一頁</a> |
                <?php }?>
                <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
                <a href="?page=<?php echo $num_pages+1;?>">下一頁</a> | <a href="?page=<?php echo $total_pages;?>">最末頁</a>
                <?php }?>
              </p></td>
          </tr>
        </table>
      </div></td>
  </tr>
  <tr>
    <td><table align="left" border="0" cellpadding="0" cellspacing="0" width="700">
        <tr>
          <td width="15"></td>
          <td ></td>
          <td align="right" valign="top"  class="trademark"></td>
          <td width="15"></td>
        </tr>
      </table></td>
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
<?php
	$db_link->close();
?>