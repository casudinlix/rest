<?php
session_start();
error_reporting(0);

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}

include 'setting/server.php';

if (isset($_POST['submit'])) {
	$username =$_POST['username'];
	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$pass= md5($_POST['pass']);

$sql_daftar = $conn->query("SELECT * FROM login WHERE email='$email");

if ($sql_daftar->num_rows > 0) {
	die("User".$email. "<br>Telah terdaftar");
}else{
	$add_user = $conn->query("INSERT INTO login SET nama='$usrname', email='$email', name='$nama', password='$pass', confirm='N' role='2' ");
}

if ($add_user) {
	
}else{

require_once('library/class.phpmailer.php'); //menginclude librari phpmailer

		$mail             = new PHPMailer();
		$body             =
		"<body style='margin: 10px;'>
		<div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
		<br>
		<strong>Terima Kasih Telah Mendaftar</strong><br>
		<b>Nama Anda : </b>".$nama."<br>
		<b>Email : </b>".$email."<br>
		<br>
		</div>
		</body>";
		$body             = eregi_replace("[\]",'',$body);
		$mail->IsSMTP(); 	// menggunakan SMTP
		$mail->SMTPDebug  = 1;   // mengaktifkan debug SMTP

		$mail->SMTPAuth   = true;   // mengaktifkan Autentifikasi SMTP
		$mail->Host 	= '49.xxx.xxx.xxx'; // Gunakan Ip Shared Address Hosting Anda
		$mail->Port       = 25;  // post gunakan port 25
		$mail->Username   = "hello@mkhuda.com"; // username email akun
		$mail->Password   = "passwordanda";        // password akun

		$mail->SetFrom('hello@mkhuda.com', 'Hello Mkhuda');

		$mail->Subject    = "Hello";
		$mail->MsgHTML($body);

		$address = $email; //email tujuan
		$mail->AddAddress($address, "Hello (Reciever name)");

		if(!$mail->Send()) {
			echo "Oops, Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Mail Sukses";
		}



}

}

?>