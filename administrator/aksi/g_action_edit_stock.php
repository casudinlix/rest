<?php 
error_reporting(0);
include_once '../../setting/server.php';


$id =$_GET['id'];
	$kode =$_POST['kode'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	$kategori = $_POST['kategori'];
	$merk = $_POST['merk'];
	$deskripsi = $_POST['deskripsi'];
	$qtymin = $_POST['qtymin'];
	$qtymax = $_POST['qtymax'];
	$berat = $_POST['berat'];
	

	$query = "UPDATE m_produk SET nama_produk='$nama', jenis='$jenis', kategori='$kategori', merk='$merk', deskripsi='$deskripsi' , berat='$berat' , qty_min='$qtymin', qty_max='$qtymax' WHERE id_produk='$kode'";
	$hasil = $conn->query($query);
	$query2=$conn->query("UPDATE stock SET stock='$stock' WHERE id_produk='$kode'");
if ($hasil) {

	echo "<script>window.alert('Data Berhasil Rubah');</script>";
	echo "<script>window.location = 'produk.php';</script>";
}else {
	echo "GAGAL".$query."<br>".$conn->error;
	//echo "<script>window.alert('Data Gagal Disimpan');</script>";
	//echo "<script>window.location = 'produk.php';</script>";
}






 ?>