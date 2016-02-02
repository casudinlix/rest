<?php
require '../setting/server.php';
require'../setting/session.php';

if (isset($_GET['profil'])) {
	$id = $_GET['id'];
}

$query_pelanggan = "SELECT * FROM login WHERE id='".$_SESSION['id']."'LIMIT 1";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc())  {


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Selamat Datang  <?php echo $_SESSION['nama'];?></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 
 <form action="../lib/update_u.php" method="POST" accept-charset="utf-8">
 	<img src="foto/<?php echo $data['foto'];?>" width="200px" height="200px"/>
 	<table>
<tr>
<td>ID &nbsp;:&nbsp; <?php echo $data['id']; ?> </td>

</tr>



<tr>
<td>Nama Lengkap Anda :<input type="teks" name="nama" value="<?php echo $data['nama'] ?>" disabled> </td>
</tr>
<tr>
<td>Email :<input type="text" name="email" value="<?php echo $data['email'] ?>" disabled> </td>
</tr>
<tr>
<td>Alamat :<input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" disabled> </td>
</tr>
<tr>
<td>No Telphon :<input type="teks" name="tlp" value="<?php echo $data['tlp'] ?>" disabled>  </td>
</tr>
<tr>
<td>foto :</tr>
 	</table>
<?php 
 	echo "<a href=update_profil.php?id=".$data['id']."=".$_SESSION['nama']. ">Edit Data</a>";
 	?>
 	||
 	<?php 
 	echo "<a href=pass.php?id=".$data['id']."=".$_SESSION['nama']. ">Edit Password</a>";
 	?>
 	||
 	<?php 
 	echo "<a href=foto.php?id=".$data['id']."=".$_SESSION['nama']. ">Ganti Foto</a>";
 	?>
 	
 </form>
 	<a href="user.php" title="HOME">HOME</a>
 	<a href="../logout.php" title="Keluar">Logout</a>
 </body>
 </html>

 <?php 	}
	 }


/*$nama_file=$_FILES['foto']['name'];
	$tmp_file=$_FILES['foto']['tmp_name'];
	move_uploaded_file($tmp_file, 'foto/'.$nama_file);
*/
	 ?>


