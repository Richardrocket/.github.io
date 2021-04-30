<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
	
  /*  如果 cookie 中的 passed 變數不等於 TRUE
      表示尚未登入網站，將使用者導向首頁 member.html	*/
  if ($passed != "TRUE")
  {
    header("location:member.html");
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>會員福利</title>
    <meta charset="utf-8">
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet" />
    <script src="js/js/jquery-3.3.1.min.js"></script> 
    <script src="js/js/bootstrap.min.js"></script>
	<style>
    .bg-green{
			background-color: #10cfc9;
			box-shadow: 0px 3px 8px 0px #000;
		}
        .bg-green li a:hover{
			background-color: #c8c8c8;
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
			color: #FFF4B5;
			width: 40px;
			height: 40px;
			text-align: center;
			line-height: 40px;
			background-color: #FFF4B5;
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
.wrapper{
	width: calc(4 * var(--width));
	height: calc(4 * var(--height));
	display: flex;
	justify-content: center;
	align-items: center;
}

.button{
	position: relative;
	width: calc(0.8 * var(--width));
	height: calc(0.7 * var(--height));
	display: flex;
	justify-content: center;
	align-items: center;
	cursor: pointer;
	overflow: hidden;
	margin: 0 0.8rem;
	box-shadow: 0 2px 5px rgba(0,0,0,0.2), 0 3px 8px rgba(0,0,0,0.1);
	transition: all 0.3s cubic-bezier(0, 0.22, .3, 1);
	
	&:before{
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: rgba(0,0,0,0.1);
	}

	span{
		color: #fff;
		font-size: 1rem;
		z-index: 10;
		text-transform: uppercase;
		letter-spacing: 2px;
	}

	&._1{ background: #2980b9 }
	&._2{	background: #8e44ad }
	&._3{	background: #16a085 }
	&._4{	background: #e74c3c }


	.back{
		position: absolute;
		width: 0;
		height: 0;
		filter: url(#filter);
		border-radius: 50%;
		z-index: 5;
		transition: all 2.5s cubic-bezier(0.1, 0.22, .3, 1);
	}

	&._1 .back{
		left: -50%;
		top: -50%;
		background: #27ae60;
	}
	&._2 .back{
		right: -50%;
		top: -50%;
		background: #c0392b;
	}
	&._3 .back{
		left: -50%;
		bottom: -50%;
		background: #34495e;
	}
	&._4 .back{
		right: -50%;
		bottom: -50%;
		background: #2980b9;
	}

	&:hover .back{
		width: calc(2 * var(--width));
		height: calc(2 * var(--height));
	}
}

@media only screen and (max-width: 750px) {
	.wrapper {
		flex-direction: column;
	}
	.button{
		margin: 0.8rem 0;
	}
}



.myButt {
  outline: none;
  border: none;
  padding: 20px;
  display: block;
  margin: 50px auto;
  cursor: pointer;
  font-size: 20px;
  background-color: transparent;
  position: relative;
  border: 2px solid #fff;
  transition: all 0.5s ease;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  -ms-transition: all 0.5s ease;
}
.three {
  color: #292929;
  border-color: transparent;
}
.three:before, .three:after {
  width: 0;
  height: 3px;
  content: " ";
  background-color: #FFF4B5;
  position: absolute;
  top: 0;
  left: 50%;
  transition: all 0.3s ease;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
}
.three:after {
  top: 100%;
}
.three:hover {
  letter-spacing: 8px;
  color: #F44336;
}
.three:hover:before, .three:hover:after {
  width: 100%;
  left: 0;
}
.three:hover:after {
  width: 100%;
  left: 0;
}
	</style>	
  </head>
  <body style="padding-top: 150px" id="page-top">
  <header>
        <!--巡覽列-->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-green" >
            <a class="navbar-brand" href="index.html">
                <img src="images/logo1.png" style="width:60px;" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#springnav" aria-controls="springnav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="springnav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active" >
                        <a class="nav-link" href="index.html" style="color: #fff;">🏘首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="history.html" style="color: #fff;">📚台灣溫泉歷史</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color: #fff;">
                            🏖旅遊資訊
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="intro.html">♨各地溫泉推薦</a>
                            <a class="dropdown-item" href="food.html">🍴各地美食</a>
                            <a class="dropdown-item" href="hot spring.html">📃泡湯須知</a>
							<a class="dropdown-item" href="attraction.html">🏖附近景點</a>
                        </div>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="contact.html" style="color: #fff;">✉聯絡我們</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="comment.php" style="color: #fff;">📝留言板</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="member.html" style="color: #fff;">👤會員登入</a>
                    </li>
                    <li class="nav-item">
                        
                        <a class="nav-link" href="likeform.php" style="color: #fff;">❤我的收藏</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="請輸入關鍵字" aria-label="Search" style="width:200px;height:35px;font-size: 17px;">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="location.href='search.html'" style="width:70px;height:35px;font-size: 17px;color:#Eb5c01;">搜尋</button>
                </div>
            </div>
        </nav>
    </header>
    <p align="center"><img src="images/management.png" style="width:525px; height:138px;"></p>
    <div class="container" >
        <div class="row" style="text-align: center;">
            <button class="myButt three" onclick="location.href='modify.php'">
		<b>修改會員資料</b>
	</button>
        <button class="myButt three" onclick="location.href='delete.php'">
		<b>刪除會員資料</b>
	</button>
        <button class="myButt three" onclick="location.href='logout2.php'">
		<b>登出網站</b>
	</button>
        </div>
      </div>
      <div class="container marketing">
          <div class="row featurette" style="text-align: center;">
          <div class="col-md-12">
          
          <h1>
              <b>會員專屬行程參考</b>
          </h1>
       
          <button class="myButt three" onclick="location.href='北投-1.html'">
              <img src="images/附近景點/北投/硫磺谷地熱景觀區-5.jpg" style="width: 500px;height: 350px;">
		<b>北投行程攻略</b>
	</button>
        <button class="myButt three" onclick="location.href='礁溪-1.html'">
            <img src="images/附近景點/礁溪溫泉/五峰旗風景區-2.jpg" style="width: 500px;height: 350px;">
		<b>礁溪行程攻略</b>
	</button>
          
           </div>
          </div>

      </div>
      
      
      
  </body>
</html>