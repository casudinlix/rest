<?php
include_once '../../setting/server.php';


	$id_produk = $_POST['id_produk'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	$kategori = $_POST['kategori'];
	$merk = $_POST['merk'];
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	$stock = $_POST['stock'];
	$berat = $_POST['berat'];
	$tgl_masuk = $_POST['tgl'];
	$terjual =$_POST['terjual'];
	$diskon =$_POST['diskon'];

$lokasi_file = $_FILES['gambar']['tmp_name'];

$nama_file = $_FILES['gambar']['name'];

$tipe_file = $_FILES['gambar']['type'];

$ukuran_file = $_FILES['gambar']['size']; 

$upload = $nama_file;

$direktori = "../../produk/$nama_file";
$sql = $conn->query("SELECT * FROM produk WHERE id='$id'");

if(move_uploaded_file($lokasi_file, $direktori)){
$sql = "UPDATE produk SET nama_produk='$nama', jenis='$jenis',kategori='$kategori',merk='$merk', deskripsi='$deskripsi', harga_jual='$harga', stock='$stock', berat='$berat', tgl_masuk='$tgl_masuk', gambar='$nama_file', terjual='$terjual',diskon='$diskon' WHERE id_produk='$id_produk'";
 }else{
$sql = "UPDATE produk SET nama_produk='$nama', jenis='$jenis',kategori='$kategori',merk='$merk', deskripsi='$deskripsi', harga_jual='$harga', stock='$stock', berat='$berat', tgl_masuk='$tgl_masuk', gambar='$nama_file', terjual='$terjual',diskon='$diskon' WHERE id_produk='$id_produk'";
	}
	$hasil = $conn->query($sql);
	if ($hasil) {
		header('location:produk.php?=Berhasil');
	} else {
		header('location:produk.php?=Gagal');
	}





 ?>