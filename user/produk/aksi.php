<?php
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
include_once 'fungsi.php';


$selectAdd = $conn->query("SELECT * FROM order_sementara WHERE id_produk AND username='$idt'");
	if ($selectAdd->num_rows==0 ) {
		$insert = $conn->query("INSERT INTO order_sementara(id_order_smt,id_produk,username,qty,tanggal) 
	            VALUES('$kd','$id','$idt','1',NOW())");
	}else{
		$cek_stock = $conn->query("SELECT stock FROM m_produk WHERE='$id'");
		$data_cek =$cek_stock->fetch_assoc();
		$data_add =$selectAdd->fetch_assoc();
		if ($data_add['qty']==$data_cek['stock']) {
			echo "<script>window.alert('Maaf, Stok yang Tersedia Tidak Cukup');</script>";
			echo "<script>window.location = '../user.php';</script>";
		}else{
			$sql = $conn->("UPDATE order_sementara SET qty =qty+1 WHERE id_produk='$id' AND username='$idt'");
		}
	}
if ($insert) {
	echo "<script>window.location = 'pesan.php?id=$id';</script>";
}//masih kurang logika
?>