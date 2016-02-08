<?php 
require '../setting/server.php';
require'../setting/session.php';

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Update Password</title>
 	<link rel="stylesheet" href="">
 </head>
 <center>
 <body>
 	<h1>Rubah password <?php echo $_SESSION['nama'];?></h1>

<form action="" method="POST">
	<table>
	<tr><td>  <b><?php echo $_SESSION['username']."&nbsp; ID :&nbsp;". $_SESSION['id']; ?> </b></td></tr>

		<tr>
		<td> Masukan Password lama</td>
		<td><input type="password" name="password" ></td></tr>
		<tr>
		<td> Masukan Password Baru</td>
		<td><input type="password" name="password1" ></td></tr>
		<tr>
		<td> Konfirmasi</td>
		<td><input type="password" name="password2" ></td></tr>
		<td><input type="submit" name="submit" value="Simpan"></td>
	</table>
</form>
 </body>
 </html>

 <?php
			if(isset($_POST['submit'])=='Simpan'){
				$id = $_GET['id'];
				$password 	= md5($_POST['password']);
				$password1 	= $_POST['password1'];
				$password2 	= $_POST['password2'];
				
				$cek = $conn->query("SELECT * FROM login WHERE id='$id' AND password='$password'");
				if($cek->num_rows == 0){
					echo 'Password sekarang tidak tepat.';
				}else{
					if($password1 == $password2){
						if(strlen($password1) >= 5){
							$pass = md5($password1);
							$update = $conn->query("UPDATE login SET password='$pass' WHERE id='".$_SESSION['id']."'");
							
							if($update){
								header('location:user.php');
								
							}else{
								echo 'Password gagal dirubah';
							}
						}else{
							echo 'Panjang karakter Password minimal 5 karakter.';
						}
					}else{
						echo 'Konfirmasi Password tidak tepat.';
					}
				}
			}
			?>

			<?php 
 	echo "<a href=profil.php?id=".$_SESSION['id']. ">Profil</a>";
 	?>