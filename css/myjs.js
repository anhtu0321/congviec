	function closeTooltips(){
		if(document.getElementById('tooltips')){
			document.getElementById('tooltips').style.display='none';
		}
	}
	function showForm(){
		document.getElementById("khungForm").style.display="block";
		document.getElementById("them").style.display="block";	
	}
	function closeForm(id){
		document.getElementById(id).style.display="none";
		document.getElementById("them").style.display="none";	
	}
/* AJAX SHOW TOOLTIP*/
	function createObj(){
		if(navigator.appName == "Microsoft Internet Explorer"){
			obj = new ActiveXObject("Microsoft.XMLHTTP");
		} else {
			obj = new XMLHttpRequest();
		}
		return obj;
	}
	var http = createObj();
	function showTooltip(obj,id){
		http.open('post','include/tooltip.php',true);
		http.onreadystatechange = prosess;
		var formData = new FormData();
		formData.append("id",id);
			if(document.getElementById("tooltips")){
				var divtool = document.getElementById("tooltips");
				divtool.parentNode.removeChild(divtool);
			}
			var div = document.createElement('div');
			div.id = "tooltips";
			div.className = "tooltips";
			obj.parentNode.appendChild(div);
		http.send(formData);
	}
	function prosess(){
		if(http.readyState == 4 & http.status == 200){
			var tool1 = document.getElementById("tooltips");
			tool1.innerHTML = http.responseText;
		}
	}
/********************************* XỬ LÝ CÁC CHỨC NĂNG CỬA TOOLTIPS, XỬ LÝ ĐỔI MẬT KHẨU VÀ ĐĂNG KÝ*****************/
//****************************************** HOÀN THÀNH FORM:
	function hoanThanh(id){
		http.open("post","include/hoanthanh.php",true);
		http.onreadystatechange = hoanthanhprosess;
		var formData = new FormData();
		formData.append("id",id);
		http.send(formData);
	}
	function hoanthanhprosess(){
		if(http.readyState == 4 & http.status == 200){
			location.reload();
			/*history.back();
			 hostory.go(-1);*/
		}
	}
	function thatBai(id){
		http.open("post","include/thatbai.php",true);
		http.onreadystatechange = thatbaiprosess;
		var formData = new FormData();
		formData.append("id",id);
		http.send(formData);
	}
	function thatbaiprosess(){
		if(http.readyState == 4 & http.status == 200){
			location.reload();
			/*history.back();
			 hostory.go(-1);*/
		}
	}
	function dangXuLy(id){
		http.open("post","include/dangxuly.php",true);
		http.onreadystatechange = dangxulyprosess;
		var formData = new FormData();
		formData.append("id",id);
		http.send(formData);
	}
	function dangxulyprosess(){
		if(http.readyState == 4 & http.status == 200){
			location.reload();
			/*history.back();
			 hostory.go(-1);*/
		}
	}
	function xoaCongViec(id){
		http.open("post","include/xoacongviec.php",true);
		http.onreadystatechange = xoacongviecprosess;
		var formData = new FormData();
		formData.append("id",id);
		http.send(formData);
	}
	function xoacongviecprosess(){
		if(http.readyState == 4 & http.status == 200){
			location.reload();
			/*history.back();
			 hostory.go(-1);*/
		}
	}
	function xlDoiMatKhau(){
		http.open("post","include/xldoimatkhau.php",true);
		http.onreadystatechange = xldoimatkhauprosess;
		var formData = new FormData();
		var oldpass = document.getElementById("oldpass").value;
		var newpass = document.getElementById("newpass").value;
		var renewpass = document.getElementById("renewpass").value;
		if(oldpass != "" & newpass != "" & newpass == renewpass){
			formData.append("oldpass",oldpass);
			formData.append("newpass",newpass);
			formData.append("renewpass",renewpass);
			http.send(formData);
		} else if(oldpass ==""){alert("Bạn chưa nhập mật khẩu cũ !");
		} else if(newpass ==""){alert("Mật khẩu mới không được trống !");
		} else if(newpass != renewpass){alert("Nhập lại mật khẩu mới không đúng !");
		}
		
	}
	function xldoimatkhauprosess(){
		if(http.readyState == 4 & http.status == 200){
			document.getElementById("tbdoipass").innerHTML = http.responseText;
			/*history.back();
			 hostory.go(-1);*/
		}
	}
	function register(){
		var agree = document.getElementById("agree");
		if (agree.checked == false) alert("Bạn chưa chọn Đồng ý !")
		else{
			http.open("post","include/register.php",true);
			http.onreadystatechange = xlregister;
			var formData = new FormData();
			var un = document.getElementById("un").value;
			var pw = document.getElementById("pw").value;
			var rpw = document.getElementById("rpw").value;
			var fname = document.getElementById("fname").value;
				formData.append("un",un);
				formData.append("pw",pw);
				formData.append("rpw",rpw);
				formData.append("fname",fname);
				http.send(formData);
		}
	}
	function xlregister(){
		if(http.readyState == 4 & http.status == 200){
			document.getElementById("tbregister").innerHTML = http.responseText;
			/*history.back();
			 hostory.go(-1);*/
		}
	}
/****************************************** Hiện form*******************************************/
	function suaCongViec(id){
		http.open("post","include/suacongviec.php",true);
		http.onreadystatechange = suaprosess;
		if(document.getElementById("form")){
				var form = document.getElementById("form");
				form.parentNode.removeChild(form);
		}
		var div = document.createElement('div');
		div.id = "form";
		div.className = "form";
		var khungTooltips = document.getElementById("khungTooltips");
		khungTooltips.appendChild(div);
		khungTooltips.style.display="block";
		document.getElementById("them").style.display="block";	
		var formData = new FormData();
		formData.append("id",id);
		http.send(formData);
	}
	function suaprosess(){
		if(http.readyState == 4 & http.status == 200){
			var form = document.getElementById("form");
			form.innerHTML = http.responseText;
		}
	}
	function xemChiTiet(id){
		http.open("post","include/chitietform.php",true);
		http.onreadystatechange = xemprosess;
		if(document.getElementById("form")){
				var form = document.getElementById("form");
				form.parentNode.removeChild(form);
		}
		var div = document.createElement('div');
		div.id = "form";
		div.className = "form";
		var khungTooltips = document.getElementById("khungTooltips");
		khungTooltips.appendChild(div);
		khungTooltips.style.display="block";
		document.getElementById("them").style.display="block";	
		var formData = new FormData();
		formData.append("id",id);
		http.send(formData);
	}
	function xemprosess(){
		if(http.readyState == 4 & http.status == 200){
			var form = document.getElementById("form");
			form.innerHTML = http.responseText;
		}
	}
	function doiMatKhau(){
		http.open("get","include/doimatkhau.php",true);
		http.onreadystatechange = doimatkhauprosess;
		if(document.getElementById("form")){
				var form = document.getElementById("form");
				form.parentNode.removeChild(form);
		}
		var div = document.createElement('div');
		div.id = "form";
		div.className = "formdmk";
		var khungTooltips = document.getElementById("khungTooltips");
		khungTooltips.appendChild(div);
		khungTooltips.style.display="block";
		document.getElementById("them").style.display="block";	
		http.send(null);
	}
	function doimatkhauprosess(){
		if(http.readyState == 4 & http.status == 200){
			var form = document.getElementById("form");
			form.innerHTML = http.responseText;
		}
	}
/********************************************** ACTIVE MENU *****************************/	
	function activeMenu(obj){
		var navLink = document.getElementsByClassName("nav-link");
		for (var i = 0; i<navLink.length; i++){
			navLink[i].classList.remove("active");
		}
		obj.classList.add("active");
	}
/********************************************** SHOW CONTENT *****************************/
	function showContent(nhom,trang){
		http.open('post','include/showcontent.php',true);
		http.onreadystatechange = showContentProcess;
		var formData = new FormData();
		formData.append("nhom",nhom);
		formData.append("trang",trang);
		http.send(formData);
	}
	function showContentProcess(){
		if(http.readyState ==4 & http.status == 200){
			document.getElementById("content").innerHTML = http.responseText;
		}
	}
/********************************************** SHOW TÌM KIẾM *****************************/
	function showSeach(){
		http.open('post','include/showseach.php',true);
		http.onreadystatechange = showSeachProcess;
		var formData = new FormData();
		var noidung = document.getElementById("noidung").value;
		var trangthai = document.getElementById("trangthai").value;
		var hantk = document.getElementById("hantk").value;
		formData.append("noidung",noidung);
		formData.append("trangthai",trangthai);
		formData.append("hantk",hantk);
		http.send(formData);
	}
	function showSeachProcess(){
		if(http.readyState ==4 & http.status == 200){
			document.getElementById("content").innerHTML = http.responseText;
		}
	}
/********************************************** VALIDATE FROM REGISTER *****************************/
	function validateTK(obj){
		if(obj.time){clearTimeout(obj.time);}
		obj.time = setTimeout('testTK()',1000);
	}
	function testTK(){
		var tk = /^\w{3,15}$/;
		var user = document.getElementById('un').value;
		if(!tk.test(user)){
			document.getElementById('thongbaoTK').innerHTML = "Yêu cầu dài 3-15 ký tự viết liền không dấu !";
		}	else{document.getElementById('thongbaoTK').innerHTML = "";}
	}
	function validatePass(obj){
		if(obj.time){clearTimeout(obj.time);}
		obj.time = setTimeout('testPass()',1000);
	}
	function testPass(){
		var tk = /^\w{6,20}$/;
		var user = document.getElementById('pw').value;
		if(!tk.test(user)){
			document.getElementById('thongbaoPass').innerHTML = "Yêu cầu dài 6-20 ký tự viết liền không dấu !";
		}	else{document.getElementById('thongbaoPass').innerHTML = "";
		}
	}
	function validateName(obj){
		if(obj.time){clearTimeout(obj.time);}
		obj.time = setTimeout('testName()',1000);
	}
	function testName(){
		var tk = /^.{3,20}$/;
		var user = document.getElementById('fname').value;
		if(!tk.test(user)){
			document.getElementById('thongbaoName').innerHTML = "Yêu cầu dài 3-20 ký tự !";
		}	else{document.getElementById('thongbaoName').innerHTML = "";}
	}