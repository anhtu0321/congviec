 
<div class="timKiem">
	Công việc: <select >
    <option value="">Chờ xử lý</option>
    <option value="">Đã hoàn thành</option>
    <option value="">Thất bại</option>
    <option value="">Tất cả</option>
    </select>
    Hạn cuối: <input type="text" name="hancuoi" id="hancuoi" size="10" />        
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
                'controlname': 'hancuoi'
            }, A_CALTPL);
	</script>
    Nội dung: <input type="text" name="noidung" value="" size="50" />
    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
</div>

<div class="phanLoai">
	Các loại công việc theo phân loại ở đây !
</div>