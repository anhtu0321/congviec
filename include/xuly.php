<?
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include("../config.php");
$id = $_GET["id"];
$noidung = $_POST["noidung"];
$han = $_POST["han"];
$giaocho = $_POST["giaocho"];
$luu = $_POST["luu"];
$ghichu = $_POST["ghichu"];
$file = $_FILES["file"]["name"];
$trangthai = "Đang xử lý";
$ngaynhap = date("Y-m-d");
$nguoinhap = $_SESSION["uncv"];
if(isset($_POST["them"])){
	if($file!=""){
		$filexl = "uploads/".date("hisdmY").$file;
		$file = "../uploads/".date("hisdmY").$file;
		copy($_FILES["file"]["tmp_name"],$file);
	}
	$sql = "insert into congviec(noidung,han,giaocho,luu,ghichu,file,trangthai,ngaynhap,nguoinhap) values('$noidung','$han','$giaocho','$luu','$ghichu','$filexl','$trangthai','$ngaynhap','$nguoinhap')";	
	mysql_query($sql);
	header("location: ".$_SERVER['HTTP_REFERER']);
} else if(isset($_POST["sua"])){
	if($file!=""){
		$sql="select file from congviec where id = '$id'"; 
		$tb = mysql_query($sql); 
		$rs = mysql_fetch_array($tb);
		try{unlink("../".$rs["file"]);}
		catch(Exception $e){} 
		$filexl = "uploads/".date("hisdmY").$file;
		$file = "../uploads/".date("hisdmY").$file;
		copy($_FILES["file"]["tmp_name"],$file);
		$sql = "update congviec set noidung='$noidung',han='$han',giaocho='$giaocho',luu='$luu',ghichu='$ghichu',file='$filexl',nguoinhap='$nguoinhap' where id = '$id'";	
	} else{ $sql="update congviec set noidung='$noidung',han='$han',giaocho='$giaocho',luu='$luu',ghichu='$ghichu',nguoinhap='$nguoinhap' where id = '$id'";}
	mysql_query($sql);
	header("location: ".$_SERVER['HTTP_REFERER']);
}
?>