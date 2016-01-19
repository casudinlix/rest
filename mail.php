<?php
session_start();
error_reporting(0);



include 'setting/server.php';

if (isset($_REQUEST['submit'])) {
	$username =$_REQUEST['username'];
	$email = $_REQUEST['email'];
	$nama = $_REQUEST['nama'];
	$pass1= md5($_REQUEST['pass1']);
	$pass2= md5($_REQUEST['pass2']);
	
#### UNTUK AKTIVASI EMAIL #######
#								#	
#								#
#								#
#################################


define('ROOT', 'http://127.0.0.1/TA/');
		
		
		$kode	= md5(uniqid(rand()));
		
		$konfirmasi = $conn->query("INSERT INTO login(username,email,nama,password,confirm,role)
			VALUES($username,$email,$nama,$pass1,'N','2')");
		

		$to 	= $_POST['email'];
		$judul 	= "Aktivasi Akun Anda";
		$dari	= "From: admin@bengkel.com \n";
		$dari	.= "Content-type: text/html \r\n";

		$pesan	= "Klik link berikut untuk mengaktifkan akun Anda: <br />";
		$pesan	.= "<a href='".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode&username=".$_POST['username']."'>".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode</a>";

		$kirim	= mail($to, $judul, $pesan, $dari);
		
		if($kirim AND $konfirmasi){
			echo "Cek Email Anda Untuk Konfirmasi";
		}else{
			echo "Gagal Mengirim";
		}
		



	//cek Validasi
	
	if (strlen(trim($username))<=4) {
 		echo "Setidaknya username 5 karakter";
 		include_once 'daftar.php';
 	}elseif (strlen(trim($pass1))<=5) {
 		echo "Panjang Password Harus Lebih Dari 5 karakter";
 		include 'daftar.php';
 	}elseif (strlen(trim($pass2))<=5) {
 		echo "Password 2 harus diisi minimal 6 digit";
 		include_once 'daftar.php';
 	}elseif (trim($pass1) != trim($pass2)) {
 		echo "Sepertinya Password Anda Tidak Sama";
 		include 'daftar.php';
 	}elseif (trim($username)=="") {
 		echo "Username Jangan Sampai Kosong";
 		include "daftar.php";

 	}elseif (trim($email)=="") {
 		echo "Email Masih Kosong";
 		include_once "daftar.php";
 	}else{
 		$username = strtolower($username);
 		$cek_user = $conn->query("SELECT * FROM login WHERE username='$username'");
 		if ($cek_user->num_rows > 0) {
 			echo "Username<br/>".$username."<br/>Sudah Ada";
 			include_once 'daftar.php';
 			close();
 		}

 	}

}

?>