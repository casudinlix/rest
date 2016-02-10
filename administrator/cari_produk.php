<!-- include file koneksi.php -->
<?php include_once '../setting/server.php'; 
include_once '../setting/session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cari Produk</title>
<!-- menginclude file jquery.min.js -->
<script src="../js/jquery.min.js"></script>
</head>

<body>

<script type="text/javascript">
	$(document).ready(function() {
		<!-- event textbox keyup
		$("#txtcari").keyup(function() {
			var strcari = $("#txtcari").val(); <!-- mendapatkan nilai dari textbox -->
			if (strcari != "") <!-- jika value strcari tidak kosong-->
			{
				$("#hasil").html("<img src='loading.gif'/>") <!-- menampilkan animasi loading -->
				<!-- request data ke cari.php lalu menampilkan ke <div id="hasil"></div> -->
				$.ajax({
					type:"post",
					url:"cari.php",
					data:"q="+ strcari,
					success: function(data){
						$("#hasil").html(data);
					}
				});
			}
		});
    });
</script>
<center>
<div>Cari By Kode : <input type="text" name="textcari" id="txtcari" /></div>
<div id="hasil"></div>
<center>
	<table border="1">
	
		
	
	
		
		

</body>
</html>