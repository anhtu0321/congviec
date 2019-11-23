<?
date_default_timezone_set("Asia/Ho_Chi_Minh");
switch(date("w")){
	case 1:	
		$thu = "Thứ Hai";
		break;
	case 2:	
		$thu = "Thứ Ba";
		break;
	case 3:	
		$thu = "Thứ Tư";
		break;
	case 4:	
		$thu = "Thứ Năm";
		break;
	case 5:	
		$thu = "Thứ Sáu";
		break;
	case 6:	
		$thu = "Thứ Bảy";
		break;
	case 0:	
		$thu = "Chủ Nhật";
		break;
	default:
		$thu ="";
		break;		
}
$ngay = date("d");
$thang = date("m");
$nam = date("Y");
?>
<div class="button">
    <button type="button" class="btn btn-primary" onclick="showForm();"><i class="fas fa-plus-square"></i> Tạo công việc mới</button>
</div>

<div class="xoa"></div>
<div class="homNay">
    <p><? echo $thu." ".$ngay."-".$thang."-".$nam;?></p>
</div>
<div class="timkiem">
	
    	<p>Nội dung công việc:<br>
        <input type="text" id="noidung" size="33" /></p>
        <p>Trạng thái: <select id="trangthai" style="width:180px">
        	<option value="">Tất cả</option>
            <option value="Đang xử lý">Đang xử lý</option>
            <option value="Hoàn thành">Hoàn thành</option>
            <option value="Thất bại">Thất bại</option>
        </select></p>
        <p>Hạn cuối: <input type="text" name="han" id = "hantk" size ="19"/>
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
                            'controlname': 'hantk'
                        }, A_CALTPL);
                </script></p>
        <button class="btn btn-info" name="timkiem" onclick="showSeach();"><i class="fas fa-search"></i> Tìm kiếm</button>
   
</div>
<!-- Dưới đây là biểu đồ hiển thị công việc -->
<div class="thongKe">
	<? if(count($quahan,0)==0 and count($gap,0)==0){?>
		<p style='color:blue'>Wow ! Hôm nay không có công việc nào đến hạn ! </p>
	<? }
		if(count($quahan,0)>0){echo "<p style='color:red'> - Bạn có <strong>".count($quahan,0)."</strong> Công việc quá hạn !</p>";}
		if(count($gap,0)>0){echo "<p style='color:red'> - Bạn có <strong>".count($gap,0)."</strong> Công việc gấp cần xử lý !</p>";}
	 ?>
    <div class="bieuDo">
    	<p>Thống kê của bạn</p>
    	<? include("include/bieudo.php");?>
    </div>
</div>