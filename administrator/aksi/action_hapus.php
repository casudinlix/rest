<?php 
error_reporting(0);
include_once '../../setting/server.php';
$id = $_GET['id'];
$foto= $_FILES['gambar']['name'];
$u=$conn->query("SELECT * FROM m_produk WHERE id_produk='$id'");

$us=$u->fetch_array();
if(file_exists("../../produk/".$us['gambar'])){
	unlink("../../produk/".$us['gambar']);
$query = "DELETE FROM m_produk WHERE id_produk='$id'";
$conn->query($query);

$sql=$conn->query("DELETE FROM stock WHERE id_produk='$id'");
echo "<script>window.alert('Data Berhasil Di Hapus');</script>";
	echo "<script>window.location ='produk.php';</script>";
}
 ?>