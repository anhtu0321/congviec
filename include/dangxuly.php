<?
	include("../config.php");
	$id = $_POST["id"];
	$sql = "update congviec set trangthai = 'Đang xử lý',ngayxong =null where id = '$id'";
	mysql_query($sql);
?>
