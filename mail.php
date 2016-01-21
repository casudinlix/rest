<?php
session_start();
error_reporting(0);



include 'setting/server.php';

if (isset($_POST['submit'])) {
	$username =$_POST['username'];
	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$pass1= md5($_POST['pass1']);
	$pass2= md5($_POST['pass2']);
	

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
 		$username = strtolower($email);
 		$cek_email = $conn->query("SELECT * FROM login WHERE email='$email'");
 		if ($cek_user->num_rows > 0) {
 			echo "Username<br/>".$email."<br/>Sudah Ada";
 			include_once 'daftar.php';
 			$conn->close();
 		}else{

define('ROOT', 'http://127.0.0.1/TA/');
		
		
		
		$kode	= md5(uniqid(rand(),TRUE));
		$konfirmasi = "INSERT INTO login (username,email,nama,password,confirm,kode,role) VALUES('$username','$email','$nama','$pass1','N','$kode','2')";
			if ($conn->query($konfirmasi)===TRUE) {
				
			}else{
				die("ERROR".$konfirmasi."<br>".$conn->error);
			}


		$to 	= $_POST['email'];
		$judul 	= "Aktivasi Akun Anda";
		$dari	= "From: admin@bengkel.com \n";
		$dari	.= "Content-type: text/html \r\n";

		$pesan	= "Klik link berikut untuk mengaktifkan akun Anda: <br />";
		$pesan	.= "<a href='".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode&username=".$_POST['username']."'>".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode</a>";

		$kirim	= mail($to, $judul, $pesan, $dari);
		
		if($kirim){
			echo "Cek Email Anda Untuk Konfirmasi";
		}else{
			echo "Gagal Mengirim";
		}


 		}

 	}
	
#### UNTUK AKTIVASI EMAIL #######
#								#	
#								#
#								#
#################################



		



	

}

?>