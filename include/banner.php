<? session_start();

?>
<div class="banner">
	<div class="logo">
    	PHẦN MỀM QUẢN LÝ CÔNG VIỆC
    </div>
	<div class="user">
    	<div class="span">
            <div class="name"><a href="#"><i class="fas fa-cog"></i> <? echo $_SESSION["fullname"];?></a></div>
            <div class="doimk"><i class="fas fa-key"></i><button type="button" class="btn btn-link" onclick="doiMatKhau();">Đổi mật khẩu</button></div>
        </div>
        <a href="thoat.php"><i class="fas fa-sign-out-alt"></i> Thoát</a>
    </div>
    <div class="xoa"></div>
</div>