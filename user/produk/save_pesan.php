<?php 
include "../../setting/server.php";
include "../../setting/session.php";


$id = $_POST['id'];
$qty = $_POST['qty'];
include 'fungsi.php';
$time = date("Y-m-d");

//$query=$conn->query("INSERT INTO order_detail (id_order,username,tanggal) VALUES('$nextNoOrder','',NOW())");
	//$update = $conn->query("UPDATE order_user SET status ='Menunggu Verifikasi' ");

$query ="INSERT INTO order_detail(id_order,username,tanggal) VALUES('$nextNoOrder','','$time')";
$hasil = $conn->query($query);

$cek = $conn->query("SELECT max(id_order) AS idOrd FROM order_detail LIMIT 1");
$row = $cek->fetch_assoc();
$idOrd = $row['idOrd'];

foreach($qty as $key => $value){
	$sql = "INSERT INTO transaksi(id,id_order,id_produk,qty,tanggal)
	values (null,'{$idOrd}','{$id[$key]}','{$value}','{$time}')";
	
	$conn->query($sql);
}
if (!$sql) {
	die($conn->error);
}


if ($hasil) {
	header("Location:konfir_pesan.php?id_order=$idOrd");
}


	






?>