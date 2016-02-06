<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';
include_once '../menu/atas.php';
$sql = "SELECT * FROM produk ORDER BY id_produk";
$query = $conn->query($sql);
$x =0;
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
<a href="tambah.php" title="Tambah">Tambah Barang</a>
<center>
	<table border="1">
	<thead>
		
	
	<tr>
		<th colspan=" " rowspan="" headers="" scope="">NO</th>
		<th colspan=" " rowspan="" headers="" scope="">Kode Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Nama Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Jenis Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Kategori Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Merk Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Deskripsi Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Harga Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Stock Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Berat Barang</th>
		<th colspan="" rowspan="" headers="" scope="">Tanggal Masuk</th>
		<th colspan="" rowspan="" headers="" scope="">Gambar</th>
		<th colspan="" rowspan="" headers="" scope="">Terjual</th>
		<th colspan="" rowspan="" headers="" scope="">Diskon</th>
		<th colspan="" rowspan="" headers="" scope="">Aksi</th>
		</tr>

		<tbody>
			<tr>
				<?php 
if ($query->num_rows > 0) {
  while ($data = $query->fetch_assoc()) { 
$x++;
  	?>
  <td colspan="" rowspan="" headers=""><?php echo $x; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['id_produk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['nama_produk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['jenis']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['kategori']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['merk']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['deskripsi']; ?></td>
<td colspan="" rowspan="" headers="">Rp-,<?php echo $data['harga_jual']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['stock']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['berat']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['tgl_masuk']; ?></td>
<td colspan="" rowspan="" headers=""><img src="../../produk/<?php echo $data['gambar'];?>" alt="Produck" height=102></td>
<td colspan="" rowspan="" headers=""><?php echo $data['terjual']; ?></td>
<td colspan="" rowspan="" headers=""><?php echo $data['diskon']; ?></td>
<?php echo "<td colspan='' rowspan='' headers=''><a href=detail.php?id=".$data['id_produk']. ">Detail</a></td>";

?>
			</tr>
		</tbody>

		</thead>
		<?php

}
}
$conn->close();
?>
	</table>


	 
		
	
</body>
</html>
