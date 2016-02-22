<?php 
include "../../setting/server.php";
$id = $_GET['id'];
include 'fungsi.php';
$delete =$conn->query("DELETE FROM order_user WHERE id_produk='$id'");

//$delete1 =$conn->query("DELETE FROM order_detail WHERE id_order='$kd' AND id_produk='$id'");

echo "<script>window.alert('Pesanan Sudah di Hapus');</script>";
			echo "<script>window.location = 'pesan.php';</script>";

 ?>