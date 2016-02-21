<?php
error_reporting(0);
include "../../setting/server.php";
include "../../setting/session.php";

$id =$_GET['id'];
$idt = $_SESSION['nama'];
//$kode = $_POST['kode'];
//$qty = $_GET['qty'];
//$harga = $_GET['harga'];


$sql = $conn->query("SELECT * FROM login WHERE username='$idt'");
$data =$sql->fetch_assoc();
//membuat fungsi transaksi 


$selectAdd = $conn->query("SELECT id_produk FROM order_user WHERE id_produk='$id' AND username='$idt'");
	if ($selectAdd->num_rows==0 ) {
		$insert = $conn->query("INSERT INTO order_user(id_produk,username,qty,tanggal,jam,status) 
	            VALUES('$id','$idt','1',NOW(),NOW(),'Belum Dibayar')");
		
		}else{
			$update = $conn->query("UPDATE order_user SET qty= qty + 1 WHERE username='$idt' AND id_produk='$id'");
			echo "<script>window.alert('Barang sudah Di Tambahkan');</script>";
			echo "<script>window.location = 'pesan.php';</script>";
		}
	

	/*{
		$cek = $conn->query("SELECT stock FROM m_produk WHERE id_produk='$id'");
		$hasil = $cek->fetch_assoc();
		$stock = $selectAdd->fetch_assoc();
	}if ($stock['qty'] ==$hasil['stock']) {
			echo "<script>window.alert('Maaf, Stok yang Tersedia Tidak Mencukupi' );</script>";
			echo "<script>window.location = 'pesan.php';</script>";

	}*/
	
			
		
	

?>