<?php 
require '../setting/server.php';
require'../setting/session.php';

if (isset($_GET['profil'])) {
	$id = $_GET['id_pelanggan'];
}

$query_pelanggan = "SELECT * FROM pelanggan WHERE id_pelanggan='".$_SESSION['id']."'";
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
 <form action="" method="POST" accept-charset="utf-8">
 	<frame>
 	<table>
<tr>
<td>ID Anda :<input type="teks" name="id" value=<?php echo $data['id_pelanggan']; ?> disabled> </td>

</tr>



<tr>
<td>Nama Anda :<input type="teks" name="nama"  > </td>
</tr>
<tr>
<td>Alamat Anda :<textarea name="alamat"></textarea> </td>
</tr>
<tr>
<td>No Telphon :<input type="teks" name="tlp"  > </td>
</tr>
 	</table>
 	<input type="submit" name="submit" value="Update">
 	</frame>
 </form>
 	
 </body>
 </html>

 <?php 	}
	 } ?>