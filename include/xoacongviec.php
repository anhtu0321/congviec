<?
	include("../config.php");
	$id = $_POST["id"];
	$sql = "delete from congviec where id = '$id'";
	mysql_query($sql);
?>
