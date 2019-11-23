<? 
	session_start();
	$nguoinhap = $_SESSION["uncv"];
	$tronghan = array();
	$gap = array();
	$khonghan = array();
	$quahan = array();
	$hoanthanh = array();
	$thatbai = array();
	$sql = "select id,noidung,han,giaocho,file,trangthai,ngaynhap,nguoinhap,ngayxong from congviec where nguoinhap ='$nguoinhap' order by id DESC";
	$tb = mysql_query($sql);
	while($rs = mysql_fetch_array($tb)){
		if((strtotime($rs["han"]) - strtotime(date("d-m-Y"))> 2*24*60*60) and $rs["trangthai"]=="Đang xử lý"){
			$tronghan[] = array('id' => $rs["id"], 'noidung'=>$rs["noidung"],'han'=>$rs["han"],'giaocho'=>$rs["giaocho"],'file' => $rs["file"],'ngaynhap' => $rs["ngaynhap"],'nguoinhap' => $rs["nguoinhap"]);
		}
		if((strtotime($rs["han"]) - strtotime(date("d-m-Y"))<= 2*24*60*60) and (strtotime($rs["han"]) - strtotime(date("d-m-Y"))>= 0) and $rs["trangthai"]=="Đang xử lý"){
			$gap[] = array('id' => $rs["id"], 'noidung'=>$rs["noidung"],'han'=>$rs["han"],'giaocho'=>$rs["giaocho"],'file' => $rs["file"],'ngaynhap' => $rs["ngaynhap"],'nguoinhap' => $rs["nguoinhap"]);
		}
		if($rs["han"]=="" and $rs["trangthai"]=="Đang xử lý"){
			$khonghan[] = array('id' => $rs["id"], 'noidung'=>$rs["noidung"],'han'=>$rs["han"],'giaocho'=>$rs["giaocho"],'file' => $rs["file"],'ngaynhap' => $rs["ngaynhap"],'nguoinhap' => $rs["nguoinhap"]);
		}
		if($rs["han"]!="" and (strtotime($rs["han"]) - strtotime(date("d-m-Y"))< 0) and $rs["trangthai"]=="Đang xử lý"){
			$quahan[] = array('id' => $rs["id"], 'noidung'=>$rs["noidung"],'han'=>$rs["han"],'giaocho'=>$rs["giaocho"],'file' => $rs["file"],'ngaynhap' => $rs["ngaynhap"],'nguoinhap' => $rs["nguoinhap"]);
		}
		if($rs["trangthai"]=="Hoàn thành"){
			$hoanthanh[] = array('id' => $rs["id"], 'noidung'=>$rs["noidung"],'han'=>$rs["han"],'giaocho'=>$rs["giaocho"],'file' => $rs["file"],'trangthai' => $rs["trangthai"],'ngaynhap' => $rs["ngaynhap"],'nguoinhap' => $rs["nguoinhap"],'ngayxong' => $rs["ngayxong"]);
		}
		if($rs["trangthai"]=="Thất bại"){
			$thatbai[] = array('id' => $rs["id"], 'noidung'=>$rs["noidung"],'han'=>$rs["han"],'giaocho'=>$rs["giaocho"],'file' => $rs["file"],'trangthai' => $rs["trangthai"],'ngaynhap' => $rs["ngaynhap"],'nguoinhap' => $rs["nguoinhap"],'ngayxong' => $rs["ngayxong"]);
		}
	}
?>
<div class="menu">
	<div class="menuChild">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
            	<a class="nav-link" href="index.php"><i class="fas fa-home fa-2x"></i></a>
            </li>
            <li class="nav-item">
            	<a class="nav-link active" onclick="activeMenu(this);showContent('tronghan');">Việc trong hạn <? echo " ( <span>".count($tronghan,0)."</span> )"?></a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" onclick="activeMenu(this);showContent('gap');">Việc gấp <? echo " ( <span>".count($gap,0)."</span> )"?></a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" onclick="activeMenu(this);showContent('quahan');">Việc quá hạn<? echo " ( <span>".count($quahan,0)."</span> )"?></a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" onclick="activeMenu(this);showContent('khonghan');">Việc không có hạn<? echo " ( <span>".count($khonghan,0)."</span> )"?></a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" onclick="activeMenu(this);showContent('hoanthanh');">Việc hoàn thành<? echo " ( <span>".count($hoanthanh,0)."</span> )"?></a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" onclick="activeMenu(this);showContent('thatbai');">Việc thất bại<? echo " ( <span>".count($thatbai,0)."</span> )"?></a>
            </li>
        </ul>
    </div>
    <div class="xoa"></div>    
</div> 
<!-- Dưới đây là phần Form ẩn, hiện ra khi click nút thêm mới công việc-->

<div id="them"></div>
<div id="khungTooltips"></div>
<div id="khungForm">
	<div class="form">
   		<button type="button" class="btn btn-warning" onclick="closeForm('khungForm');" id="close"><i class="fas fa-times"></i></button>
        <form action="include/xuly.php" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            	<td colspan="2" align="center"><div class="tieudeform">THÊM MỚI CÔNG VIỆC</div></td>
            </tr>
            <tr>
            	<td width="15%"></td>
            	<td>&nbsp;</td>
            </tr>
                <tr>
                <td colspan="2">
                    <textarea name="noidung" rows="10" cols="97" id="nd">Nhập nội dung công việc ...</textarea>
                </td>
            </tr>
            <tr>
                <td>Hạn cuối</td>
                <td><input type="text" name="han" size="10" id="han" />&nbsp;
                <script language="JavaScript">
                        var A_CALTPL = {
                            'months' : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                            'weekdays' : ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                            'yearscroll': true,
                            'weekstart': 0,
                            'centyear'  : 70,
                            'imgpath' : 'img/'
                        }
                        new tcal ({
                            // if referenced by ID then form name is not required
                            'controlname': 'han'
                        }, A_CALTPL);
                </script>
                </td>
            </tr>
            <tr>
                <td>Giao cho</td>
                <td><input type="text" name="giaocho" value="" size="100" />&nbsp;</td>
            </tr>
            <tr>
                <td>Lưu VB đến</td>
                <td><input type="text" name="luu" value="" size="100" />&nbsp;</td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td><input type="text" name="ghichu" value="" size="100" />&nbsp;</td>
            </tr>
<!--            <tr>
                <td>File đính kèm</td>
                <td><input type="file" name="file" value="" size="10" />&nbsp;</td>
            </tr>
-->
            <tr>
            	<td colspan="2" height="50px" align="center"><button type="submit" class="btn btn-primary" name="them"><i class="fas fa-plus"></i> Thêm</button></td>
            </tr>
        </table>
        </form>
    </div>
</div>
<script async="async">
CKEDITOR.replace( 'nd' );
</script>
