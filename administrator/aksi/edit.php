<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tanggal1 = date('d/m/Y H:i:s');
 ?>

<head>
<title>EDIT Data Barang</title>
</head>
<body>
<?php
$kode =$_GET['id'];
$sql=$conn->query("SELECT * FROM m_produk WHERE id_produk='$kode'");
$row = $sql->fetch_array();
?>
<form method="POST" action="action_edit.php" enctype="multipart/form-data"/>
<center><table>
<tr>
<td colspan="" rowspan="" headers="">Kode</td>
<td><input type="text" name="kode" value="<?php echo $kode;?>" readonly></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Nama Produk</td>
<td><input type="text" name="nama" value="<?php echo $row['nama_produk']; ?>"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Jenis</td>
<td><select name="jenis">

	<option value="<?php echo $row['jenis'] ?>"><?php echo $row['jenis']; ?></option>
	<?php
		$ambil = $conn->query("SELECT * FROM jenis ORDER BY nama_jenis");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {
				?>
				<option value="<?php echo $data['nama_jenis']; ?>"><?php echo $data['nama_jenis']; ?></option>';
				<?php
			}
		}
			?>
	
</select></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Kategori</td>
<td><select name="kategori" >
	<option value="<?php echo $row['kategori']; ?>"><?php echo $row['kategori']; ?></option>
	<?php
		$ambil = $conn->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama_kategori'];?>"><?php echo $data['nama_kategori']; ?></option>';
			<?php
			}
		}
			?>
</select></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Merk</td>
<td><select name="merk">
	<option value="<?php echo $row['merk']; ?>"><?php echo $row['merk']; ?></option>
	<?php
		$ambil = $conn->query("SELECT * FROM merk ORDER BY nama_merk ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama_merk'];?>"><?php echo $data['nama_merk']; ?></option>';
			<?php
			}
		}
			?>
</select></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Deskripsi</td>
<td><textarea name="deskripsi" value="<?php echo $row['deskripsi']; ?>"><?php echo $row['deskripsi']; ?></textarea></td>
</tr>

<tr><td colspan="" rowspan="" headers="">Berat Barang</td>
<td><input type="text" name="berat" value="<?php echo $row['berat']; ?>">KG</td>
</tr>
<tr><td colspan="" rowspan="" headers="">QTY MIN</td>
<td><input type="text" name="qtymin" value="<?php echo $row['qty_min']; ?>"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">QTY MAX</td>
<td><input type="text" name="qtymax" value="<?php echo $row['qty_max']; ?>"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Stock</td>
<td><input type="text" name="stock" value="<?php echo $row['stock']; ?>"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Tanggal Masuk</td>
<td><input type="teks" name="tgl" value="<?php echo $row['tgl_masuk']; ?>" readonly></td>
</tr>



</table>
<input type="submit" name="update" value="UPDATE"/>
</form>
</body>
</html>