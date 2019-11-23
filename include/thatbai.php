<?
	include("../config.php");
	$id = $_POST["id"];
	$sql = "update congviec set trangthai ='Thất bại', ngayxong =null where id = '$id'";
	mysql_query($sql);
?>
