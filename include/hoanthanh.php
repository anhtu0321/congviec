<?
	include("../config.php");
	$id = $_POST["id"];
	$date = date("Y-m-d");
	$sql = "update congviec set trangthai ='Hoàn thành', ngayxong ='$date' where id = '$id'";
	mysql_query($sql);
?>
