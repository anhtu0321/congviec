<?
	include("../config.php");
	session_start();
	$oldpass = $_POST["oldpass"];
	$newpass = $_POST["newpass"];
	$nguoinhap = $_SESSION["uncv"];
	$sql = "select pass from users where user = '$nguoinhap'";
	$tb = mysql_query($sql); $rs = mysql_fetch_array($tb); 
	if($rs["pass"] == $oldpass){
		$sql = "update users set pass = '$newpass' where user = '$nguoinhap'";
		mysql_query($sql);
		echo "<span style='color:red'>Đổi mật khẩu thành công !</span>";
	}
	else{
		echo "<span style='color:red'>Mật khẩu cũ không đúng !</span>";
	}
?>
