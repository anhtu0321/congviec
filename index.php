<?
session_start();
if($_SESSION["uncv"]==""){
	header("location: login.php");
}else{
?>
<? include("config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/all.min.css"/>
<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/calendar.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script type="text/javascript" src="css/calendar_us.js"></script>
<script type="text/javascript" src="css/myjs.js" async="async"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<title>Phần mềm quản lý công việc</title>
</head>

<body>
<div class="khung">
<?php
	include("include/banner.php");
	include("include/main.php");
	include("include/footer.php");
?>

</body>
</html>
<? }?>
