<?php
include "../../setting/server.php";
include "../../setting/session.php";
if(!isset($_SESSION['nama'])){
   
    $_SESSION['nama'] = $idt;
}
$idt = $_SESSION['nama'];
// $id = $_GET['id'];
if(isset($_GET['id'])) { 
	$id = $_GET['id']; 
} else { 
	$id = ""; 
}

// $act = $_GET['act'];
if(isset($_GET['act'])) { 
	$act = $_GET['act']; 
} else { 
	$act = ""; 
}

// $qty = $_GET['qty'];
if(isset($_GET['qty'])) { 
	$qty = $_GET['qty']; 
} else { 
	$qty = ""; 
}

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
	$selectAdd = $conn->query("SELECT * FROM order_sementara WHERE id_produk='$id' AND id_session='$idt'");
	$numRowAdd = $selectAdd->num_rows();
	if ($numRowAdd == 0) {
		$insert = $conn->query("INSERT INTO order_sementart(id_order_smt,id_produk,username,qty,tanggal) 
	            VALUES('$nextNoTransaksi','$id','$idt','1','$time')");
	} else {
		$selectPro = $conn->query("SELECT stock FROM produk WHERE id_produk = '$id'");
		$dataPro = $selectPro->fetch_array();
		$dataAdd = $selectAdd->fetch_array();
		if ($dataAdd['qty'] == $dataPro['stock']) {
			echo "<script>window.alert('Maaf, Stok yang Tersedia Hanya $dataPro[stock] Unit');</script>";
			echo "<script>window.location = 'user.php';</script>";
		} else {
			$insert = $conn->query("UPDATE order_sementarat SET qty = $qty+1 WHERE id_produk='$id' AND username='$idt'");
		}
	}
	if ($insert) {
		echo "<script>window.location = 'purchase.php?id=$id';</script>";
	}
} elseif ($act == 'plus') {
	$update = mysql_query("UPDATE order_sementarat SET qty = $qty + 1 WHERE id_produk='$id' AND username='$idt'");
	if ($update) {
		echo "<script>window.location = 'purchase.php?id=$id';</script>";
	}
} elseif ($act == 'min') {
	$update = mysql_query("UPDATE order_sementarat SET qty = $qty - 1 WHERE id_produk='$id' AND username='$idt'");
	if ($update) {
		echo "<script>window.location = 'purchase.php?id=$id';</script>";
	}
} elseif ($act == 'del') {
	$delete = mysql_query("DELETE FROM order_sementara WHERE id_produk='$id' AND username='$idt'");
	if ($delete) {
		$select = mysql_query("SELECT * FROM order_sementara WHERE username='$idt'");
		$numRow = mysql_num_rows($select);
		if ($numRow == 0) {
			echo "<script>window.location = '../user.php';</script>";
		} else {
			echo "<script>window.location = 'purchase.php?id=$id';</script>";
		}
	}
} elseif ($act == 'clear') {
	$delete = mysql_query("DELETE FROM order_sementara WHERE username='$idt'");
	if ($delete) {
		echo "<script>window.location = 'user.php';</script>";
	}
}
?>