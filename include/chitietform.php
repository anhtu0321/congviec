<? 
	include("../config.php");
	$id = $_POST["id"];
	$sql = "select * from congviec where id = '$id'";
	$tb = mysql_query($sql);
	$rs = mysql_fetch_array($tb);
?>
<button type="button" class="btn btn-warning" onclick="closeForm('form');" id="close"><i class="fas fa-times"></i></button>
<div class="tieudeform" align="center">CHI TIẾT CÔNG VIỆC</div>
<div class="box">
	<div class="tieudebox">Nội dung công việc:</div>
    <div class="noidung"><? echo $rs["noidung"];?></div>
    <div class="left">
    	<div class="tieudebox">Giao cho: <span class="spannoidung"><? echo " ".$rs["giaocho"];?></span></div>
        <div class="tieudebox">Lưu VB đến: <span class="spannoidung"><? echo " ".$rs["luu"];?></span></div>
    </div>
    <div class="right">
    	<div class="tieudebox">Hạn cuối: <span class="spannoidung"><? echo " ".date("d/m/Y",strtotime($rs["han"]))?></span></div>
        <div class="tieudebox">Trạng thái: <span class="spannoidung"><? 
		if($rs["trangthai"]==""){echo "Đang xử lý";}
		else if($rs["trangthai"]=="Hoàn thành"){ echo $rs["trangthai"]." ngày ".date("d/m/Y",strtotime($rs["ngayxong"]));}
		else {echo " ".$rs["trangthai"];}?></span></div>
        
    </div>
    <div class="xoa"></div>
    <div class="tieudebox">Ghi chú:</div>
    <div class="noidung"><? echo $rs["ghichu"];?></div>
</div>
		