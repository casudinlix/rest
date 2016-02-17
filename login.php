<?php
session_start()
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Bengkel</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<center>
		<h1>Login User</h1>
	<form action="" method="POST" accept-charset="utf-8">
		<table>
		<tr>
		<td>Email</td>
		<td><input type="teks" name="username" value="" placeholder="Username"></td>
		</tr>

		<tr>
		<br/>
		<td>Password</td>
		<td><input type="password" name="pass" value="" placeholder="Password"></td>
		</tr>
		</table>
		<td><input type="submit" name='login' value="LOGIN"></td>
	</form>
	</center>
</body>
</html>

<?php
include "setting/server.php";
if (isset($_POST['login'])=='LOGIN') {
	$username=$_POST['username'];
	$pass=md5($_POST['pass']);

	$cari = $conn->query("SELECT * FROM login WHERE username='$username' AND password='$pass'");
	$row = $cari->fetch_array();
	if ($cari->num_rows > 0) {

		$_SESSION['id']=$row['id'];
		$_SESSION['nama']=$row['nama'];
		$_SESSION['username']=$row['username'];
		$_SESSION['id_pelanggan']=['id_pelanggan'];
		$_SESSION['confirm']=$row['confirm'];
		$_SESSION['role']=$row['role'];
		$_SESSION['transaksi']=$row['transaksi'];
		$_SESSION['foto']=$row['foto'];
		header('location:cek.php');
	}
	

}


?>