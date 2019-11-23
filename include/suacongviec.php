<? 
	include("../config.php");
	$id = $_POST["id"];
	$sql = "select * from congviec where id = '$id'";
	$tb = mysql_query($sql);
	$rs = mysql_fetch_array($tb);
?>
<button type="button" class="btn btn-warning" onclick="closeForm('form');" id="close"><i class="fas fa-times"></i></button>
        <form action="include/xuly.php?id=<? echo $id;?>" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tr>
            	<td colspan="2" align="center"><div class="tieudeform">SỬA CÔNG VIỆC</div></td>
            </tr>
            <tr>
            	<td width="15%"></td>
            	<td>&nbsp;</td>
            </tr>
                <tr>
                <td colspan="2" align="center">
                    <textarea name="noidung" rows="10" cols="120" id="suand"><? echo $rs["noidung"];?></textarea>
                </td>
            </tr>
            <tr>
                <td align="right">Hạn cuối: &nbsp;</td>
                <td><input type="date" name="han" size="10" id="han" value="<? echo $rs["han"];?>" /></td>
            </tr>
            <tr>
                <td align="right">Giao cho: &nbsp;</td>
                <td><input type="text" name="giaocho" value="<? echo $rs["giaocho"];?>" size="100" />&nbsp;</td>
            </tr>
            <tr>
                <td align="right">Lưu VB đến: &nbsp;</td>
                <td><input type="text" name="luu" value="<? echo $rs["luu"];?>" size="100" />&nbsp;</td>
            </tr>
            <tr>
                <td align="right">Ghi chú: &nbsp;</td>
                <td><input type="text" name="ghichu" value="<? echo $rs["ghichu"];?>" size="100" />&nbsp;</td>
            </tr>
<!--            <tr>
                <td align="right">File đính kèm: &nbsp;</td>
                <td><input type="file" name="file" value="" size="10" />&nbsp;</td>
            </tr>
--> 
            <tr>
            	<td colspan="2" height="50px" align="center"><button type="submit" class="btn btn-primary" name="sua"><i class="far fa-edit"></i> Sửa</button></td>
            </tr>
        </table>
        </form>
