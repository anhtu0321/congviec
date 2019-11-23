<?
	include("../config.php");
	$un = $_POST["un"];
	$pw = $_POST["pw"];
	$rpw = $_POST["rpw"];
	$fname = $_POST["fname"];
	if($un=="" or $pw=="" or $rpw=="" or $fname ==""){echo "Bạn chưa điền đầy đủ các thông tin !";
	}
	else if($pw != $rpw){
		echo "Nhập lại mật khẩu không đúng !";
	}
	else if(strlen($un) < 3 or strlen($un) > 15){ echo "Tài khoản phải từ 3 đến 15 ký tự!";
	}
	else if(strlen($pw) < 6 or strlen($pw) > 20){ echo "Mật khẩu phải từ 6 đến 20 ký tự!";
	}
	else if(strlen($fname) < 3 or strlen($fname) > 20){ echo "Họ và tên phải từ 3 đến 20 ký tự!";
	}
	else{
		$sql = "select 1 from users where user = '$un'";$tb = mysql_query($sql);
		if(mysql_num_rows($tb)>0){echo "Tài khoản này đã có người sử dụng !";}
		else{
			$sql = "insert into users (user,pass,fullname,isadmin) values('$un','$pw','$fname','0')";
			mysql_query($sql);
			echo "Chúc mừng ! Tài khoản của bạn đã được đăng ký thành công !";
		}
	}
?>