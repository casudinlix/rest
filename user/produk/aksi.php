<?php
/*error_reporting(0);
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
		    echo "<script>window.alert('Barang sudah Di Tambahkan');</script>";
			echo "<script>window.location = 'pesan.php';</script>";
		
		}else{
		$cek = $conn->query("SELECT stock FROM m_produk WHERE id_produk='$id'");
		$hasil = $cek->fetch_assoc();
		$stock = $selectAdd->fetch_assoc();
	}if ($stock['qty'] ==$hasil['stock']) {
			echo "<script>window.alert('Maaf, Stok yang Tersedia Tidak Mencukupi' );</script>";
			echo "<script>window.location = 'pesan.php';</script>";

	}else{
			$update = $conn->query("UPDATE order_user SET qty= qty + 1 WHERE username='$idt' AND id_produk='$id'");
			echo "<script>window.alert('Barang sudah Di Tambahkan');</script>";
			echo "<script>window.location = 'pesan.php';</script>";
		}
?>*/
include "../../setting/server.php";
include "../../setting/session.php";
if(!isset($_SESSION['transaksi'])){
    
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];
// $id = $_GET['id'];
if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}
if (isset($_GET['act'])) {
	$act=$_GET['act'];
}else{
	$act="";
}
if (isset($_GET['qty'])) {
	$qty = $_GET['qty'];
}else{
	$qty="";
}
$idt = $_SESSION['nama'];
$encript = md5($id);
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = $conn->query("SELECT max(id_order_smt) AS last FROM order_user WHERE id_order_smt LIKE '$kode%'");
$result = $kdauto->fetch_array();
$lastNoTransaksi = $result['last'];
$lastNoUrut = substr($lastNoTransaksi, 5, 4);
$nextNoUrut = $lastNoUrut + 1;
$nextNoTransaksi = $kode.sprintf('%04s', $nextNoUrut);

if ($act=='add') {
	$time=date("Y-m-d");
	$selectAdd = $conn->query("SELECT * FROM order_user WHERE id_produk='$id' AND username='$idt'");
	$numRowAdd = $selectAdd->num_rows;
	if ($numRowAdd == 0) {
		$insert = $conn->query("INSERT INTO order_user(id_order_smt,id_produk,username,qty,tanggal) VALUES('$nextNoTransaksi','$id','$idt',1,'$time')");
if (!$insert) {
	die($conn->error);
}else{
	echo "<script>window.alert('Barang sudah ditambahkan;</script>";
	echo "<script>window.location = 'pesan.php';</script>";
	}
	}else{
		$selectPro=$conn->query("SELECT stock FROM m_produk WHERE id_produk='$id'");
		$dataPro= $selectPro->fetch_array();
		$dataAdd =$selectAdd->fetch_array();
		if ($dataAdd['qty']==$dataPro['stock']) {
			echo "<script>window.alert('Maaf, Stok yang Tersedia Hanya $dataPro[stock] Unit');</script>";
			echo "<script>window.location = 'pesan.php';</script>";
		}else{
			$insert =$conn->query("UPDATE order_user SET qty = qty+1 WHERE id_produk='$id' AND username='$idt'");
		}

	}
	if ($insert) {
echo "<script>window.location = 'pesan.php';</script>";	}
}else if ($act =='plus') {
	$update = $conn->query("UPDATE order_user SET qty=$qty+1 WHERE id_produk='$id' AND username='$idt'"  );
	if ($update) {
		echo "<script>window.location = 'pesan.php?id=$id';</script>";
	}else if ($act =='min') {
		$update = $conn->query("UPDATE order_user SET qty = $qty-1 WHERE id_produk='$id' AND username='$idt'");
		if ($update) {
				echo "<script>window.location = 'pesan.php';</script>";
		}
	}else if ($act=='del') {
		$delete = $conn->query("DELETE FROM order_user WHERE id_produk='$id' AND username='$idt'");
		if ($delete) {
			$select = $conn->query("SELECT * FROM order_user WHERE username='$idt'");
			$numRow =$select->num_rows();
			if ($numRow==0) {
				echo "<script>window.location = '../user.php';</script>";
			}else{
				echo "<script>window.location = 'pesan.php';</script>";
			}
		}
	}elseif ($act =='clear') {
		$delete = $conn->query("DELETE FROM order_user WHERE username='$idt'");
		if ($delete) {
			echo "<script>window.location = '../user.php';</script>";
		}
	}
}

?>