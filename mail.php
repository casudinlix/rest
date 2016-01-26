<?php
session_start();
error_reporting(0);



include 'setting/server.php';

if (isset($_POST['submit'])) {
	$username =$_POST['username'];
	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$pass1= md5 (trim($_POST['pass1']));
	$pass2= md5 (trim($_POST['pass2']));
	

	//cek Validasi
	
	if (strlen(trim($username))<=4) {
 		echo "Setidaknya username 5 karakter";
 		include_once 'daftar.php';
 		die("Silahkan Coba Lagi");
 		

 		
 	}elseif (strlen(trim($pass1))<=5) {
 		echo "Panjang Password Harus Lebih Dari 5 karakter";
 		include_once 'daftar.php';
 		die("Silahkan Coba Lagi");


 	}elseif (strlen(trim($pass2))<=5) {
 		echo "Password  harus diisi minimal 6 digit";
 		include_once 'daftar.php';
 		die("Silahkan Coba Lagi");

 		

 		
 	}elseif (trim($pass1) != trim($pass2)) {
 		echo "Sepertinya Password Anda Tidak Sama";
 		include_once 'daftar.php';
 		die("Silahkan Coba Lagi");

 		
 		
 	}elseif (trim($username)=="") {
 		echo "Username Jangan Sampai Kosong";
 		include_once 'daftar.php';
 		die("Silahkan Coba Lagi");

 	}elseif (trim($email)=="") {
 		echo "Email Masih Kosong";
 		include_once 'daftar.php';
 		die("Silahkan Coba Lagi");
 		
 		
 	}else{
 		$username = strtolower($username);
 		$cek_user = $conn->query("SELECT * FROM login WHERE username='$username'");
 		if ($cek_user->num_rows > 0) {
 			echo "Username<br/>".$username."<br/>Sudah Ada";
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

		$pesan	= "Klik link berikut untuk mengaktifkan akun Anda: <br/>";
		$pesan	.= "<a href='".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode&username=".$_POST['username']."'>".ROOT."confirm.php?email=".$_POST['email']."&kode=$kode</a>";

		$kirim	= mail($to, $judul, $pesan, $dari);
		
		if($kirim){
			echo  "<script language='JavaScript'>alert('Sebuah Email Telah dikirim Ke Akun Anda Cek Sekarang');

			window.location='login.php';
 		</script>"
 		;
		}else{
			echo "Gagal Mengirim";
		}


 		}

 	}


		



	

}

?>