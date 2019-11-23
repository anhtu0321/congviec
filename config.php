<?
date_default_timezone_set("Asia/Ho_Chi_Minh");
$server = "localhost";
$username = "root";
$password = "tuanninh1";
$database = "congviec";
$conn = mysql_connect($server,$username,$password);
mysql_select_db($database,$conn);
?>