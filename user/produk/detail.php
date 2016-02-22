<?php 
include_once '../../setting/server.php';

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

		<td>KODE :<input type="teks" name="kode" value="<?php echo $row['id_produk']; ?>" disabled></td>
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
		<td>Harga Produk :<input type="teks" name="harga" value="<?php echo $row['harga']; ?>" disabled></td>
</tr>
<tr>
		<td>Stock Produk :<input type="teks" name="qty" value="<?php echo $row['stock']; ?>" disabled></td>
</tr>
<tr>
		<td>Berat Produk :<input type="teks" name="id" value="<?php echo $row['berat']; ?>" disabled></td>
</tr>

<tr>
		<td>Gambar Produk :<img src="../../produk/<?php echo $row['gambar']; ?>" alt="" height="120"> </td>
</tr>



</table>
<a href="aksi.php?act=add&amp;id=<?php echo $row['id_produk']; ?>">BELI</a>
</form>
	<?php //pending buat transaksi sementara ?>

 </body>
 </html>