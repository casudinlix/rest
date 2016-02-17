<?php 
include_once '../setting/server.php';
include_once '../setting/session.php';

$batas   = 5;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}
$sql = "SELECT * FROM g_produk LIMIT $posisi,$batas";
$query = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Produk</title>
	<link rel="stylesheet" href="">
</head>
<body>
<a href="cari_produk.php" title="Tambah">Tambah Barang</a>
<center>
	<table border="1">
	<thead>
		
	
	<tr>
		<th colspan=" " rowspan="" headers="" scope="">NO</th>
		<th colspan=" " rowspan="" headers="" scope="">Kode Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Deskripsi</th>
		<th colspan="" rowspan="" headers="" scope="">Jenis Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Kategori Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Stock</th>
		<th colspan="" rowspan="" headers="" scope="">Harga</th>
		
		<th colspan="" rowspan="" headers="" scope="">Merk</th>
		<th colspan="" rowspan="" headers="" scope="">Tanggal Masuk</th>
		
		
		<th colspan="" rowspan="" headers="" scope="">Lokasi</th>
		<th colspan="" rowspan="" headers="" scope="">AKSI</th>
		
		
		
		</tr>

		<tbody>
			<tr>
				<?php 
				$x =$posisi+1;
if ($query->num_rows) {
  while ($data = $query->fetch_array()) { 

  	?>
  <td colspan="" rowspan="" headers=""><?php echo $x; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['kode']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['deskripsi']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['jenis']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['kategori']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['qty']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['harga']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['merk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['tgl_masuk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['lokasi']; ?></td>

<td colspan="" rowspan="" headers=""><a href="aksi/g_edit_stock.php?id=<?php echo $data['kode'];?>"</a>Edit<br/>
<a href="action_hapus.php?id=<?php echo $data['id_produk'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a></td>

<?php 
//echo "<td colspan='' rowspan='' headers=''><a href=edit.php?id=".$data['id_produk']. ">Edit</a>~&nbsp;<a href=action_hapus.php?id=".$data['id_produk']. ">Hapus</a></td>";
?>
			</tr>
			<?php $x++; ?>
		</tbody>

		</thead>
		<?php

}
}

?>
	</table>
<?php
$sql2 = $conn->query("SELECT * FROM g_produk");
$jmldata = $sql2->num_rows;
$jmlhalaman =ceil($jmldata/$batas);
?>
Halaman:
<?php
for($i=1;$i<=$jmlhalaman;$i++)
if ($i != $halaman){
 echo " <a href=\"g_produk.php?halaman=$i\">$i</a> | ";
}
else{ 
 echo " <b>$i</b> | "; 
}
echo "<p>Total  Produk: <b>$jmldata</b> </p>";
?>
	 
		
	
</body>
</html>
