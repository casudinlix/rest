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
	$harga = $_POST['harga'];
	$stock = $_POST['stock'];
	$berat = $_POST['berat'];
	$terjual =$_POST['terjual'];
	$diskon =$_POST['diskon'];

	$query = "UPDATE produk SET nama_produk='$nama', jenis='$jenis', kategori='$kategori', merk='$merk', deskripsi='$deskripsi',harga_jual='$harga' , stock='$stock' , berat='$berat' , diskon='$diskon' WHERE id_produk='$kode'";
	$hasil = $conn->query($query);
	$query2=$conn->query("UPDATE stock SET stock='$stock' WHERE id_produk='$kode'");
if ($hasil) {

	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = 'produk.php';</script>";
}else {
	echo "GAGAL".$query."<br>".$conn->error;
	//echo "<script>window.alert('Data Gagal Disimpan');</script>";
	//echo "<script>window.location = 'produk.php';</script>";
}






 ?>