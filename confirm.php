<?php
include_once 'setting/server.php';


if (isset($_GET['username'])&& isset($_GET['kode'])) {
	$kode = $_GET['kode'];
	$username = $_GET['username'];

$update = $conn->query("UPDATE login SET confirm='Y' WHERE kode='$kode'");

if($update) {
		echo "Member dengan username <strong>".$username."</strong> telah diaktifkan<br> Selahkan Login <a href='login.php' title='Masuk'>Disini</a>";
	} else {
		echo "Gagal diaktifkan";
	}
}


	
	
	

	
	
	
?>