<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';
$id = $_GET['id'];
 $detail = "SELECT * FROM m_produk WHERE id_produk='$id'";
$query = $conn->query($detail);
$row=$query->fetch_assoc();
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	<center>
	<form action="" method="POST" accept-charset="utf-8">
	<table>
	<tr>

		<td>KODE :<input type="teks" name="id" value="<?php echo $row['id_produk']; ?>" disabled></td>
		</tr>
<tr>
		<td>Nama Produk :<input type="teks" name="id" value="<?php echo $row['nama_produk']; ?>" disabled></td>
</tr>
<tr>
		<td>Jenis Produk :<input type="teks" name="id" value="<?php echo $row['jenis']; ?>" disabled></td>
</tr>
<tr>
		<td>Kategori Produk :<input type="teks" name="id" value="<?php echo $row['kategori']; ?>" disabled></td>
</tr>
<tr>
		<td>Merk Produk :<input type="teks" name="id" value="<?php echo $row['merk']; ?>" disabled></td>
</tr>
<tr>
		<td>Deskripsi Produk :<textarea name="deskripsi" disabled><?php echo $row['deskripsi']; ?></textarea></td>
</tr>
<tr>
		<td>Harga Produk :<input type="teks" name="id" value="<?php echo $row['harga_jual']; ?>" disabled></td>
</tr>
<tr>
		<td>Sock Produk :<input type="teks" name="id" value="<?php echo $row['stock']; ?>" disabled></td>
</tr>
<tr>
		<td>Berat Produk :<input type="teks" name="id" value="<?php echo $row['berat']; ?>" disabled></td>
</tr>
<tr>
		<td>Tanggal Masuk :<input type="teks" name="id" value="<?php echo $row['tgl_masuk']; ?>" disabled></td>
</tr>
<tr>
		<td>Gambar Produk :<img src="../../produk/<?php echo $row['gambar']; ?>" alt="" height="120"> </td>
</tr>
<tr>
		<td>Terjual :<input type="teks" name="id" value="<?php echo $row['terjual']; ?>" disabled></td>
</tr>

<tr>
		<td>Diskon :<input type="teks" name="id" value="<?php echo $row['diskon']; ?>" disabled></td>
</tr>


</table>
<?php echo "<a href=edit.php?id=".$row['id_produk']. ">Edit</a></td>"; ?>
	</form>
	
		
	

		
		

 </body>
 </html>