<?php 
$sql = $conn->query("SELECT * FROM produk ORDER BY id_produk DESC");
$data = $sql->fetch_array();
$kodeawal=substr($data['id_produk'],3,4)+1;

if ($kodeawal < 10) {
	$kode = "P00".$kodeawal;
}elseif ($kodeawal > 9 && $kodeawal <= 99) {
	$kode = "P00".$kodeawal;
}










 ?>