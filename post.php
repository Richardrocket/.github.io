<?php 
function GetSQLValueString($theValue, $theType) {
  switch ($theType) {
    case "string":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_MAGIC_QUOTES) : "";
      break;
    case "int":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
      break;
    case "email":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_EMAIL) : "";
      break;
    case "url":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_URL) : "";
      break;      
  }
  return $theValue;
}

if(isset($_POST["action"])&&($_POST["action"]=="add")){
	require_once("connMysql.php");	
	$query_insert = "INSERT INTO board (boardname ,boardsex ,boardsubject ,boardtime ,boardmail ,boardweb ,boardcontent) VALUES (?, ?, ?, NOW(), ?, ?, ?)";
	$stmt = $db_link->prepare($query_insert);
	$stmt->bind_param("ssssss",
		GetSQLValueString($_POST["boardname"], "string"),
		GetSQLValueString($_POST["boardsex"], "string"),
		GetSQLValueString($_POST["boardsubject"], "string"),
		GetSQLValueString($_POST["boardmail"], "email"),
		GetSQLValueString($_POST["boardweb"], "url"),
		GetSQLValueString($_POST["boardcontent"], "string"));
	$stmt->execute();
	$stmt->close();
	$db_link->close();
	//重新導向回到主畫面

   echo "<script>window.location.assign("http://localhost/projectnew/comment.php");</script>";


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
<script language="javascript">
function checkForm(){
	if(document.formPost.boardsubject.value==""){
		alert("請填寫標題!");
		document.formPost.boardsubject.focus();
		return false;
	}
	if(document.formPost.boardname.value==""){
		alert("請填寫姓名!");
		document.formPost.boardname.focus();
		return false;
	}	
	if(document.formPost.boardmail.value!=""){
		if(!checkmail(document.formPost.boardmail)){
			document.formPost.boardmail.focus();
			return false;
		}
	} 
	if(document.formPost.boardcontent.value==""){
		alert("請填寫留言內容!");
		document.formPost.boardcontent.focus();
		return false;
	}
		return confirm('確定送出嗎？');
}

function checkmail(myEmail) {
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(filter.test(myEmail.value)){
		return true;
	}
	alert("電子郵件格式不正確");
	return false;
}
</script>
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
	color: #FFF4B5;
	padding: 25px 0;
	border-top: 1px solid rgba(182,182,182,1.00);
	background-color: #FFF4B5;
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
<body bgcolor="#ffffff" style="padding-top: 150px" id="page-top">
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
<div class="container">
  <div class="row" align="center">
        <div class="col">
            <img src="images/comm.png" width="406" height="75">
        </div>
  </div>
  <div class="row" >
        <div class="col-9">
        <input type="button" name="button3" id="button3" value="回上一頁" onClick="window.history.back();">
        </div>
        <div class="col">
        <a href="comment.php"><img  src="images/read.png" width="110" height="36" border="0" alt="瀏覽留言"></a>
        </div>
        <div class="col">
        <a href="login.php"><img name="board_r4_c2" src="images/login.png" width="110" height="36" border="0" alt="登入管理"></a>
        </div>
        
  </div>
  <hr>
  <div class="row" >
  <div  class="col-3" align="right">
    <img id="img" src="images/male.png" width="150" height="150">  
  </div>
  <div id="mainRegion" class="col">
        <form action="" method="post" name="formPost" id="formPost" onSubmit="return checkForm();">
          <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
            <tr valign="top">
              <td width="80" align="center"></td>
              <td>
    			<p>標題:<input type="text" name="boardsubject" id="boardsubject"></p>
                <p>暱稱:<input type="text" name="boardname" id="boardname"></p>
                <p>性別:
                  <input name="boardsex" type="radio" id="radio" value="男" onclick="pic1()" checked>男
                  <input type="radio" name="boardsex" id="radio2" value="女" onclick="pic2()">女
                </p>
                <p>郵件:<input type="text" name="boardmail" id="boardmail"></p>
                <input type="hidden" name="boardweb" id="boardweb">
                <p>意見發表:</p>
                  <textarea name="boardcontent" id="boardcontent" cols="40" rows="10"></textarea>
              </td>
              
            </tr>
            <tr valign="top">
              <td colspan="3" align="center" valign="middle">
    			<input name="action" type="hidden" id="action" value="add">
                <input type="submit" name="button" id="button" value="送出留言">
                <input type="reset" name="button2" id="button2" value="重新填寫">
                </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
</div>
<script type = "text/javascript"> 
     function pic1() 
     { 
      document.getElementById("img").src = "images/male.png"; 
     } 
     function pic2() 
     { 
      document.getElementById("img").src ="images/female.png"; 
     } </script> 
</body>
</html>