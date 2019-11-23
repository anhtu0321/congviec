<div class="content" id="content">
<?
$nhom = "tronghan";
$trang = 1;
$soluong = 30;;
session_start();
$nguoinhap = $_SESSION["uncv"];
$sql="select id,noidung,han,giaocho,luu,ghichu,file,trangthai,ngaynhap,nguoinhap,ngayxong from congviec where nguoinhap ='$nguoinhap' and trangthai = 'Đang xử lý' and (DATE_ADD(han, INTERVAL -2 DAY)> NOW())";
$tb = mysql_query($sql); 
$sotrang = ceil(mysql_num_rows($tb)/$soluong);
$sql=$sql." order by id DESC limit 0,$soluong";
$tb = mysql_query($sql); 
?>
<div class="tab-pane fade show active" id="tronghan" role="tabpanel">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr style="font-weight:bold;">
        <td width="3%" align="center">STT</td>
        <td width="34%" align="center">Nội dung</td>
        <td width="8%" align="center">Hạn cuối</td>
        <td width="12%" align="center">Giao cho</td>
        <td width="10%" align="center">Lưu VB đến</td>
        <td width="12%" align="center">Ghi chú</td>
        <td width="9%" align="center">Ngày nhập</td>
        <td width="8%" align="center">Trạng thái</td>
        <td width="3%" align="center"></td>
      </tr>
    <?
	$i=0;
    while($rs = mysql_fetch_array($tb)){ $i++; ?>
        <tr <? if($i % 2  == 0) echo "style='background:#FFFFFF;'";?>>
            <td align="center"><? echo $i;?></td>
            <td align="center">
            <? 
                $noidung = explode(' ',"$rs[noidung]");
                $chuoi = "";
                if(count($noidung,0)>50){
                    for($j = 0;$j<50; $j++){
                        $chuoi = $chuoi." ".$noidung[$j];
                    }
                    echo $chuoi."...";
                }else{
                    echo $rs["noidung"];
                }
            ?>
            </td>
            <td align="center"><? echo date("d/m/Y",strtotime($rs["han"]));?></td>
            <td align="center"><? echo $rs["giaocho"];?></td>
            <td align="center"><? echo $rs["luu"];?></td>
            <td align="center"><? echo $rs["ghichu"];?></td>
            <td align="center"><? echo date("d/m/Y",strtotime($rs["ngaynhap"]));?></td>
            <td align="center"><? if($rs["trangthai"]==""){ echo "Đang xử lý";}else{echo $rs["trangthai"];}?></td>
<!--        <td align="center"><a href ="<? //echo $rs["file"];?>"><img src="img/word.png" width="20px" height="20px" /></a></td> -->
            <td align="center" style="position:relative" >
                <a style="cursor:pointer;"  class="btn" onclick="showTooltip(this,<? echo $rs["id"];?>);"><i class="far fa-edit"></i></a>
            </td>
        </tr>
      
    <? 
    }
    ?>
    </table>
</div>
<? //Phân trang ở dưới?>
<div class="xoa"></div>
<div class="trang">
	<ul>
    	<li><a onclick="showContent('<? echo $nhom;?>','1')"> First </a></li>
        <?
		if($sotrang <= 10){$batdau=1;$ketthuc=$sotrang;}
		else {
			if($trang<5){$batdau=1;$ketthuc=10;}
			else if($trang+5 > $sotrang){$batdau=$sotrang-9;$ketthuc=$sotrang;}
			else{$batdau=$trang-4;$ketthuc=$trang+5;}
		}
        for($i=$batdau; $i<=$ketthuc; $i++){?>
			<? if($trang == $i){echo "<li class='liactive'>";}else{echo "<li>";}?><a onclick="showContent('<? echo $nhom;?>','<? echo $i;?>')"> <? echo $i;?> </a></li>
		<? }?>
        <li><a onclick="showContent('<? echo $nhom;?>','<? echo $sotrang?>')"> End </a></li>
    </ul>
    <div class="xoa"></div>
</div>
<div class="xoa"></div>

</div>