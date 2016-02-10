<?php 
error_reporting(0);
include_once '../../setting/server.php';



	$kode =$_POST['kode'];
	//$nama = $_POST['nama'];
	$deskripsi = $_POST['deskripsi'];
	$jenis = $_POST['jenis'];
	$kategori = $_POST['kategori'];
	$qty = $_POST['qty'];
	$harga =$_POST['harga'];
	$merk = $_POST['merk'];
	//$lokasi = $_POST['lokasi'];
	//$qtymin = $_POST['qtymin'];
	//$qtymax = $_POST['qtymax'];
	//$berat = $_POST['berat'];
	$tgl_masuk = $_POST['tgl'];
	//$terjual =$_POST['terjual'];
	//$diskon =$_POST['diskon'];


	$query = "INSERT INTO g_produk(kode,deskripsi,jenis, kategori,qty,harga,merk,tgl_masuk, lokasi)
	VALUES('$kode','$deskripsi','$jenis','$kategori','$qty','$harga','$merk',NOW(),'I01')";
	$query2 = $conn->query("INSERT INTO stock (id_produk,stock,last)values('$kode','$qty',NOW())");
	
	$hasil = $conn->query($query);



	if ($hasil) {

	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location ='../g_produk.php';</script>";
} else {
	echo "GAGAL".$query."<br>".$conn->error;
	//echo "<script>window.alert('Data Gagal Disimpan');</script>";
	//echo "<script>window.location = 'produk.php';</script>";
}






 ?>