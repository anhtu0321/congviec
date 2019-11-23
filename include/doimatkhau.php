<? 
	include("../config.php");
	session_start();
	$sql = "select * from congviec where id = '$id'";
	$tb = mysql_query($sql);
	$rs = mysql_fetch_array($tb);
?>
<button type="button" class="btn btn-warning" onclick="closeForm('form');" id="close"><i class="fas fa-times"></i></button>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tr>
            	<td colspan="2" align="center"><div class="tieudeform">ĐỔI MẬT KHẨU TÀI KHOẢN <? echo strtoupper("$_SESSION[uncv]");?></div></td>
            </tr>
            <tr>
            	<td width="45%"></td>
            	<td>&nbsp;</td>
            </tr>
            <tr height="32px">
                <td align="right">Mật khẩu cũ: &nbsp;</td>
                <td><input type="password" name="oldpass" id="oldpass" size="20"/></td>
            </tr>
            <tr height="32px">
                <td align="right">Mật khẩu mới: &nbsp;</td>
                <td><input type="password" name="newpass" id="newpass" size="20" />&nbsp;</td>
            </tr>
            <tr height="32px">
                <td align="right">Nhập lại mật khẩu: &nbsp;</td>
                <td><input type="password" name="renewpass" id="renewpass" size="20" />&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" height="50px" align="center"><div id="tbdoipass"></div></td>
            </tr>
            <tr>
            	<td colspan="2" height="50px" align="center"><button type="button" class="btn btn-primary" name="doimatkhau" onclick="xlDoiMatKhau();"><i class="far fa-edit"></i> Cập nhật</button></td>
            </tr>
        </table>

