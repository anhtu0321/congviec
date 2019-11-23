<? 
ob_start();
include("config.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Đăng nhập Phần mềm Quản lý Công việc</title>
<!-- Custom Theme files -->
<link href="csslogin/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="header">
		<div class="header-main">
		       <h1>PM QUẢN LÝ CÔNG VIỆC</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">	
					 <form action="login.php" method="post">
						<input type="text"  value="User name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}"/>
					<input type="password"  value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/> 
						<input type="submit" value="Login" name="submit">
					</form>		
				</div>
				</div>
                <div class="dangky">Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></div>
			  	<div class="thongbao" style="text-align:center; color:#FF8C8C;margin-top:20px;"></div>
			</div>
		</div>
</div>
<!--header end here-->
<div class="copyright">
	<p>© 2019 Phần mềm quản lý Công việc. Design by Hoàng Văn Tú - Đội CNTT </a></p>
</div>
<!--footer end here-->
</body>
</html>
<?
if(isset($_POST["submit"])){
	$user = $_POST["name"];
	$pass = $_POST["password"];
	$sql = "select fullname,isadmin from users where user ='$user' and pass = '$pass'";
	$tb = mysql_query($sql);$rs = mysql_fetch_array($tb);
	if(mysql_num_rows($tb)>0){
		
		$_SESSION["uncv"] = $user;
		$_SESSION["fullname"] = $rs["fullname"];
		$_SESSION["isadmin"] = $rs["isadmin"];
		header("location: index.php");	
	}
	else{?>
	<script>
	   	document.getElementsByClassName("thongbao")[0].innerText = "Đăng nhập không thành công !";
    </script>
<?	}
}
ob_end_flush();
?>