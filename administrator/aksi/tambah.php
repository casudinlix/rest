<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal= mktime(date("m"),date("d"),date("Y"));
$tglsekarang = date("Y-m-d", $tanggal);
$tanggal1 = date('d/m/Y H:i:s');
 ?>

<head>
<title>Input Data Barang</title>
</head>
<body>
<?php
include 'fungsi.php';

?>
<form method="POST" action="action_tambah.php" enctype="multipart/form-data"/>
<center><table>
<tr>
<td colspan="" rowspan="" headers="">Kode</td>
<td><input type="text" name="kode" value="<?php echo $kd;?>" readonly></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Nama Produk</td>
<td><input type="text" name="nama" placeholder="Nama Barang"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Jenis</td>
<td><select name="jenis">

	<option value="">---</option>
	<?php
		$ambil = $conn->query("SELECT * FROM jenis ORDER BY nama_jenis ASC LIMIT 2");
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
	<option value="">---</option>
	<?php
		$ambil = $conn->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama_kategori'];?>"><?php echo $data['nama_kategori'] ?></option>';
			<?php
			}
		}
			?>
</select></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Merk</td>
<td><select name="merk">
	<option value="">---</option>
	<?php
		$ambil = $conn->query("SELECT * FROM merk ORDER BY nama ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {?>

				<option value="<?php echo $data['nama'];?>"><?php echo $data['nama'] ?></option>';
			<?php
			}
		}
			?>
</select></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Deskripsi</td>
<td><textarea name="deskripsi" placeholder="Deskripsi"></textarea></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Harga</td>
<td><input type="text" name="harga" placeholder="Harga"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Stock</td>
<td><input type="text" name="stock" placeholder="Input Stock"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Berat Barang</td>
<td><input type="text" name="berat" placeholder="> 1Kg"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Tanggal Masuk</td>
<td><input type="date" name="tgl" value="<?php echo $tglsekarang; ?>" readonly></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Gambar</td>
<td><input type="file" name="gambar"></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Terjual</td>
<td><input type="teks" name="terjual" value="0" readonly="" =""></td>
</tr>
<tr><td colspan="" rowspan="" headers="">Diskon</td>
<td><input type="teks" name="diskon" placeholder="Input Jika Ada Diskon"></td>
</tr>
</table>
<input type="submit" name="save" value="Simpan"/>
</form>
</body>
</html>