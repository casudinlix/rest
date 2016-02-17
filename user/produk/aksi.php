<?php
include "../../setting/server.php";
include "../../setting/session.php";

$idt = $_SESSION['nama'];


//membuat fungsi transaksi sederhana 
//
$encript = md5($id);
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = $conn->query("SELECT max(id_order_smt) AS last FROM order_sementara WHERE id_order_smt LIKE '$kode%'");
$result = $kdauto->fetch_array();
$lastNoTransaksi = $result['last'];
$lastNoUrut = substr($lastNoTransaksi, 5, 4);
$nextNoUrut = $lastNoUrut + 1;
$nextNoTransaksi = $kode.sprintf('%04s', $nextNoUrut);

if ($act == 'add') {
	$time = date("Y-m-d");
	$selectAdd = $conn->query("SELECT * FROM order_sementara WHERE id_produk='$id' AND username='$idt'");
	
	if ($selectAdd->num_rows> 0) {
		$insert = $conn->query("INSERT INTO order_sementara(id_order_smt,id_produk,username,qty,tanggal) 
	            VALUES('$nextNoTransaksi','$id','$idt','1','$time')");
	} else {
		$selectPro = $conn->query("SELECT stock FROM m_produk WHERE id_produk = '$id'");
		$dataPro = $selectPro->fetch_array();
		$dataAdd = $selectAdd->fetch_array();
		if ($dataAdd['qty'] == $dataPro['stock']) {
			echo "<script>window.alert('Maaf, Stok yang Tersedia Hanya $dataPro[stock] Unit');</script>";
			echo "<script>window.location = '../user.php';</script>";
		} else {
			$insert = $conn->query("UPDATE order_sementara SET qty = $qty+1 WHERE id_produk='$id' AND username='$idt'");
		}
	}
	if ($insert) {
		echo "<script>window.location = 'pesan.php?id=$id';</script>";
	}
} elseif ($act == 'plus') {
	$update = $conn->query("UPDATE order_sementara SET qty = $qty + 1 WHERE id_produk='$id' AND username='$idt'");
	if ($update) {
		echo "<script>window.location = 'pesan.php?id=$id';</script>";
	}
} elseif ($act == 'min') {
	$update = $conn->query("UPDATE order_sementara SET qty = $qty - 1 WHERE id_produk='$id' AND username='$idt'");
	if ($update) {
		echo "<script>window.location = 'pesan.php?id=$id';</script>";
	}
} elseif ($act == 'del') {
	$delete = $conn->query("DELETE FROM order_sementara WHERE id_produk='$id' AND username='$idt'");
	if ($delete) {
		$select = $conn->query("SELECT * FROM order_sementara WHERE username='$idt'");
		
		if ($numRow = $select->num_rows ==0) {
			echo "<script>window.location = '../user.php';</script>";
		} else {
			echo "<script>window.location = 'pesan.php?id=$id';</script>";
		}
	}
} elseif ($act == 'clear') {
	$delete = $conn->query("DELETE FROM order_sementara WHERE username='$idt'");
	if ($delete) {
		echo "<script>window.location = '../user.php';</script>";
	}
}
?>