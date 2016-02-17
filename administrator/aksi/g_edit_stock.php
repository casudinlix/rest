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
$sql=$conn->query("SELECT * FROM g_produk WHERE kode='$kode'");
$row = $sql->fetch_array();
?>
<form method="POST" action="g_action_edit_stock.php" enctype="multipart/form-data"/>
<center><table>
<tr>
<td colspan="" rowspan="" headers="">Kode</td>
<td><input type="text" name="kode" value="<?php echo $kode;?>" readonly></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Deskripsi</td>
<td><textarea name="deskripsi" value="<?php echo $row['deskripsi']; ?>"><?php echo $row['deskripsi']; ?></textarea></td>
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
		$ambil = $conn->query("SELECT * FROM merk ORDER BY nama ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama'];?>"><?php echo $data['nama']; ?></option>';
			<?php
			}
		}
			?>
</select></td>
</tr>

<tr><td colspan="" rowspan="" headers="">Tanggal Masuk</td>
<td><input type="teks" name="tgl" value="<?php echo $row['tgl_masuk']; ?>" readonly></td>
</tr>



</table>
<input type="submit" name="update" value="UPDATE"/>
</form>
</body>
</html>