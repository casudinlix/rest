<?php 
include "../../setting/server.php";
include "../../setting/session.php";
include 'fungsi.php';
$idt=$_SESSION['nama'];

$id = $_POST['id'];
$qty = $_POST['qty'];
$query = $conn->query("SELECT * FROM order_user, m_produk WHERE username='$idt'AND order_user.id_produk=m_produk.id_produk ");
$row=$query->fetch_array();



$sql=$conn->query("INSERT INTO order_detail (id_order,id_produk,tanggal,jam) VALUES('$kd','$row[id_produk]',NOW(),NOW())");
	

$update = $conn->query("UPDATE order_user SET status ='Menunggu Verifikasi'");

header("location:konfir_pesan.php?id_order=$kd");




?>