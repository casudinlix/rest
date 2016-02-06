<?php 
error_reporting(0);
include_once '../../setting/server.php';
include 'fungsi.php';

$id =$_GET['id'];

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
$foto= $_FILES['gambar']['name'];
$acak = rand(1,99);

$unic = $acak.$foto;
$u=$conn->query("SELECT * FROM produk WHERE id_produk='$id'");

$us=$u->fetch_array();
if(file_exists("../../produk/".$us['gambar'])){
	unlink("../../produk/".$us['gambar']);
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../../produk/".$acak.$_FILES['gambar']['name']);
	$query = "INSERT INTO produk(id_produk, nama_produk, jenis, kategori,merk,deskripsi,harga_jual ,stock, berat,tgl_masuk, gambar, diskon)
	VALUES('$kode','$nama','$jenis','$kategori','$merk','$deskripsi','$harga','$stock','$berat',NOW(),'$unic','$diskon')";
	$hasil = $conn->query($query);
}else{
	move_uploaded_file($_FILES['gambar']['tmp_name'], "../../produk/".$acak.$_FILES['gambar']['name']);
	$query = "INSERT INTO produk(id_produk, nama_produk, jenis, kategori,merk,deskripsi,harga_jual ,stock, berat,tgl_masuk, gambar, diskon)
	VALUES('$kode','$nama','$jenis','$kategori','$merk','$deskripsi','$harga','$stock','$berat',NOW(),'$unic','$diskon')";
	$hasil = $conn->query($query);
}

	if ($hasil) {

	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = 'produk.php';</script>";
} else {
	echo "GAGAL".$query."<br>".$conn->error;
	//echo "<script>window.alert('Data Gagal Disimpan');</script>";
	//echo "<script>window.location = 'produk.php';</script>";
}






 ?>