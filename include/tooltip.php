<?
$id = $_POST["id"];
?>

<button type="button" class="close"  onclick="closeTooltips();" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

<div class="tieude">Cập nhật trạng thái</div>
<p><button class="btntooltip" onclick="var cf = confirm('Bạn muốn Cập nhật trạng thái công việc là: Hoàn thành ?');
if(cf==true){hoanThanh(<? echo $id;?>);}"><i class="far fa-check-square"></i> Hoàn thành</button></p>
<p><button class="btntooltip" onclick="var cf = confirm('Bạn muốn Cập nhật trạng thái công việc là: Thất bại ?');
if(cf==true){thatBai(<? echo $id;?>);}"><i class="far fa-window-close"></i> Thất bại</button></p>
<p><button class="btntooltip" onclick="var cf = confirm('Bạn muốn Cập nhật trạng thái công việc là: Đang xử lý ?');
if(cf==true){dangXuLy(<? echo $id;?>);}"><i class="far fa-hourglass"></i> Đang xử lý</button></p>
<div class="tieude">Tùy chọn</div>
<p><button class="btntooltip" onclick="xemChiTiet(<? echo $id;?>);"><i class="far fa-newspaper"></i> Xem chi tiết</button></p>
<p><button class="btntooltip" onclick="suaCongViec(<? echo $id;?>);"><i class="far fa-edit"></i> Sửa công việc</button></p>
<p><button class="btntooltip" onclick="var cf = confirm('Bạn chắc chắn muốn Xóa công việc này ?');
if(cf==true){xoaCongViec(<? echo $id;?>);}"><i class="far fa-trash-alt"></i> Xóa công việc</button></p>