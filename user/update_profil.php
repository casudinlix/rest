
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
 	
 	<table>
<tr>
<td>ID Anda :<input type="teks" name="id" value="<?php echo $data['id'];?>" disabled></td>

</tr>



<tr>
<td>Nama Lengkap Anda :<input type="teks" name="nama" value=<?php echo $data['nama'] ?> > </td>
</tr>
<tr>
<td>Email :<input type="text" name="email" value=<?php echo $data['email'] ?> > </td>
</tr>
<tr>
<td>Alamat :<input type="text" name="alamat" value=<?php echo $data['alamat'] ?> > </td>
</tr>
<tr>
<td>No Telphon :<input type="teks" name="tlp" value=<?php echo $data['tlp'] ?> >  </td>
</tr>


</tr>
 	</table>
<input type="submit" name="update" value="Update">
 </form>
 	<a href="user.php" title="HOME">HOME</a>
 </body>
 </html>

 <?php 	}
	 }


/*$nama_file=$_FILES['foto']['name'];
	$tmp_file=$_FILES['foto']['tmp_name'];
	move_uploaded_file($tmp_file, 'foto/'.$nama_file);
*/
	 ?>










