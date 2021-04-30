<?php
require_once("dbtools.inc.php");
$link = create_connection();
$sql = "SELECT * FROM likeform";
$result = execute_sql($link, "member", $sql);

    

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
    <title>台灣溫泉旅遊介紹網</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet" />
    <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/bootstrap.min.js"></script>

    <style>
        
		.bg-green{
			background-color:  #10cfc9;
			box-shadow: 0px 3px 8px 0px #000;
		}
        .bg-green li a:hover{
			background-color: #c8c8c8;
		}
        .site-footer {
			margin-top: 50px;
			color:  #10cfc9;
			padding: 25px 0;
			border-top: 1px solid rgba(182,182,182,1.00);
			background-color:  #10cfc9
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
			color:  #10cfc9;
			width: 40px;
			height: 40px;
			text-align: center;
			line-height: 40px;
			background-color:  #10cfc9;
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
		.social{
			text-align: center;
			}
		}
		.fixed {
			position: fixed;
			bottom: 0;
			right: 0;
			width: 100px;
			}
			
    </style>

</head>
<body style="padding-top: 200px" id="page-top">
    <!--頁首-->
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
											<a class="dropdown-item" href="intro.html" >♨各地溫泉推薦</a> 
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
     
    <div class="col-md-12 col-12" ><p align="center" style="color: #c8c8c8;"><img src="images/likeform5.png" style="height: 131px; width:434px;" /></p></div><br>
    <div class="row" >
    <div class="col-md-2 col-2 " >
    </div>
    <div class="col-md-8 col-8" style="text-align: center;">
	   <?php	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
        <a href="<?php echo $row["good"];?>" style="color: #4B4B4B"><h2 ><?php echo $row["name"];?></h2></a><p>&emsp;</p>
		<?php }?>
    </div>            
    </div>    
 
    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <img src="images/logo1.png" style="width:100px;" />
                </div>
				<div class="col-md-5 col-sm-5 ">
				    <ul >
					<li><p class="text-black-50 h5"><img src="images/home icon.png" style="width:30px;" />&emsp;333桃園市龜山區德明路5號</p></li>
					<li><p class="text-black-50 h5">&thinsp;<img src="images/contact icon.png" style="width:20px;" />&thinsp;&emsp;TEL:(03)1234-5678</p></li>
					<li><p class="text-black-50 h5"><img src="images/mail.png" style="width:30px;" />&emsp;EMAIL:123456789@gmail.com</p></li>
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
					<img src="images/mail icon.png" width="60" height="60">
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
<a class="btn fixed" href="#top" role="button"> <img src="images/icons/top.png" width="50" height="50"> </a>
</body>
</html>
