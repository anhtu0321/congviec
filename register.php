<!DOCTYPE HTML>
<html>
<head>
<title>Đăng ký tài khoản</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<script src="css/myjs.js"></script>
<div class='login'>
  <h2>Register</h2>
  <input id='un' placeholder='Tài khoản' type='text' onKeyUp="validateTK(this);"> <span id="thongbaoTK" class="spantb"></span>
  <input id='pw' name='password' placeholder='Mật khẩu' type='password' onKeyUp="validatePass(this);"> <span id="thongbaoPass" class="spantb"></span>
  <input id='rpw' name='password' placeholder='Nhập lại Mật khẩu' type='password'>
  <input id='fname' placeholder='Họ và tên' type='text' onKeyUp="validateName(this);"> <span id="thongbaoName" class="spantb"></span>
  <div class='agree'>
    <input id='agree' name='agree' type='checkbox'>
    <label for='agree'></label>Đồng ý đăng ký tài khoản và sử dụng Phần mềm
  </div>
  <div id="tbregister"></div>
  <input class='animated' id="dangky" type='submit' value='Đăng ký' onClick="register();" disabled="disabled">
  <a class='forgot' href='login.php'>Đăng nhập</a>
</div>

<style>
@font-face{
	font-family:sofia;
	src:url(Sofia.otf);
	font-weight:normal;
	font-style:normal;
}
* {
  margin: 0;
  padding: 0;
}

body {
  background: #2E3740;
  color: #435160;
  font-family: "Arial", sans-serif;
}
.spantb{
	float:left;
	color:#F00;
}
h2 {
  color: #FFFFFF;
  font-family: "sofia", cursive;
  font-size: 15px;
  font-weight: bold;
  font-size: 3.6em;
  text-align: center;
  margin-bottom: 20px;
}

a {
  color: #435160;
  text-decoration: none;
}

.login {
  width: 350px;
  position: absolute;
  top: 10%;
  left: 50%;
  margin-left: -175px;
}

input[type="text"], input[type="password"] {
  width: 350px;
  padding: 20px 0px;
  background: transparent;
  border: 0;
  border-bottom: 1px solid #999999;
  outline: none;
  color: #FFFFFF;
  font-size: 16px;
}
input[type=checkbox] {
  display: none;
}

label {
  display: block;
  position: absolute;
  margin-right: 10px;
  width: 8px;
  height: 8px;
  border-radius: 25%;
  background: transparent;
  content: "";
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  border: 3px solid #FFFFFF;
}

#agree:checked ~ label[for=agree] {
  background: #FFFFFF;
}
input[type="submit"] {
  background: #1FCE6D;
  border: 0;
  width: 350px;
  height: 40px;
  border-radius: 3px;
  color: #fff;
  font-size: 12px;
  font-weight:bold;
  cursor: pointer;
  transition: background 0.3s ease-in-out;
}
input[type="submit"]:hover {
  background: #16aa56;
  animation-name: shake;
}
#tbregister{
	padding-bottom:20px;
	color:#F90;
	text-shadow:#F00 1px 2px 6px;
}
.forgot {
  margin-top: 30px;
  display: block;
  font-size: 12px;
  text-align: center;
  font-weight: bold;
  color:#FFF;
  padding:10px 0;
	background:#F30;
}
.forgot:hover {
  margin-top: 30px;
  display: block;
  font-size: 12px;
  text-align: center;
  font-weight: bold;
  color: #FFFF00;
}

.agree {
  padding: 20px 0px;
  font-size: 12px;
  text-indent: 25px;
  line-height: 15px;
  color:#FFFFFF;
  font-weight:bold;
}

::-webkit-input-placeholder {
  color: #999999;
  font-size: 12px;
}

.animated {
  animation-fill-mode: both;
  animation-duration: 1s;
}

@keyframes shake {
  0%, 100% {
    transform: translateX(0);
  }
  10%, 30%, 50%, 70%, 90% {
    transform: translateX(-10px);
  }
  20%, 40%, 60%, 80% {
    transform: translateX(10px);
  }
}

</style>