<?php 
include "../../setting/server.php";
$id = $_GET['id'];
$delete =$conn->query("DELETE FROM order_user WHERE id_produk='$id'");


echo "<script>window.alert('Pesanan Sudah di Hapus');</script>";
			echo "<script>window.location = 'pesan.php';</script>";

 ?>