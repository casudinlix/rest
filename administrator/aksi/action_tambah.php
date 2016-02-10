<?php 
error_reporting(0);
include_once '../../setting/server.php';
include 'fungsi.php';

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
	$tgl_masuk = $_POST['tgl'];
	$harga =$_POST['harga'];
	//$diskon =$_POST['diskon'];
$foto= $_FILES['gambar']['name'];
$acak = rand(1,99);

$unic = $acak.$foto;
$u=$conn->query("SELECT * FROM m_produk WHERE id_produk='$id'");

$us=$u->fetch_array();
if(file_exists("../../produk/".$us['gambar'])){
	unlink("../../produk/".$us['gambar']);
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../../produk/".$acak.$_FILES['gambar']['name']);
	$query = "INSERT INTO m_produk(id_produk, nama_produk, jenis, kategori,merk,deskripsi, berat, qty_min, qty_max,tgl_masuk, harga,gambar)
	VALUES('$kode','$nama','$jenis','$kategori','$merk','$deskripsi','$berat','$qtymin','$qtymax',NOW(),'$harga','$unic')";
	//$query2 = $conn->query("INSERT INTO stock values('$kode','$stock',NOW())");
	$hasil = $conn->query($query);

}else{
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../../produk/".$acak.$_FILES['gambar']['name']);
	$query = "INSERT INTO m_produk(id_produk, nama_produk, jenis, kategori,merk,deskripsi, berat, qty_min, qty_max,tgl_masuk,harga, gambar)
	VALUES('$kode','$nama','$jenis','$kategori','$merk','$deskripsi','$berat','$qtymin','qtymax',NOW(),'$harga','$unic')";
	$hasil = $conn->query($query);
	//$query2 = "INSERT INTO stock (id_produk,stock,last)values('$kode','$stock',NOW())";
}$hasil2 =$conn->query($query2);

	if ($hasil) {

	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = 'produk.php';</script>";
} else {
	echo "GAGAL".$query."<br>".$conn->error;
	//echo "<script>window.alert('Data Gagal Disimpan');</script>";
	//echo "<script>window.location = 'produk.php';</script>";
}






 ?>