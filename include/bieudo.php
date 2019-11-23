<?
$countTrongHan =  count($tronghan,0);
$countGap = count($gap,0);
$countQuaHan = count($quahan,0);
?>
<div class="canvas">
<canvas id="canvas"></canvas>
</div>
<script>
	var mang = [{name: 'Việc Quá hạn', value:<? echo $countQuaHan;?>, color:'red'},
				{name: 'Việc Gấp', value:<? echo $countGap;?>, color:'orange'},
				{name: 'Việc Trong hạn', value:<? echo $countTrongHan;?>, color:'#00A400'}
				]
	var total = mang.reduce(function(sum,element){
								return sum = sum + element.value;
							},0);
	var canvas = document.getElementById("canvas");
	canvas.width = 200;
	canvas.height = 400;
	var ctx = canvas.getContext("2d");
	var vitri = -0.5*Math.PI;
	var y = 250;
	mang.forEach(function(element){
					var cung = (element.value/total)*2*Math.PI;
					ctx.beginPath();
					ctx.fillStyle = element.color;
					ctx.arc(100,100,99,vitri,vitri+cung);
					ctx.lineTo(100,100);
					ctx.fillRect(0,y-16,20,20);
					ctx.font = "16px Arial";
					ctx.fillText(element.name+' ( '+Math.round(element.value/total*100)+'% ) ',30,y);
					ctx.fill();
					vitri += cung;
					y += 50;
					
				})

	
</script>

