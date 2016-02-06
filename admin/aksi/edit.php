<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';
$id = $_GET['id'];
 $detail = "SELECT * FROM produk WHERE id_produk='$id'";
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
	<form action="update_produk.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<table>
	<tr>

		<td>KODE :<input type="teks" name="id_produk" value="<?php echo $row['id_produk']; ?>" disabled></td>
		</tr>
<tr>
		<td>Nama Produk :<input type="teks" name="nama" value="<?php echo $row['nama_produk']; ?>" ></td>
</tr>
<tr>
		<td>Jenis Produk :<select name="jenis">

			<option value="<?php echo $row['jenis']; ?>"><?php echo $row['jenis']; ?></option>
		<?php
		$ambil = $conn->query("SELECT * FROM jenis ORDER BY nama_jenis ASC LIMIT 2");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {
				?>
				<option value="<?php echo $data['id']; ?>"><?php echo $data['nama_jenis']; ?></option>';
				<?php
			}
		}
			?>

			
		</select>
		</td>
</tr>
<tr>
		<td>Kategori Produk :<select name="kategori">

	<option value="<?php echo $row['kategori']; ?>"><?php echo $row['kategori']; ?><option>
			<?php
		$ambil = $conn->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {
				echo '<option>'.$data['nama_kategori'].'</option>';
			}
		}
			?>
		</select>


		
</tr>
<tr>
		<td>Merk Produk :
		<select name="merk">
		<option value=""><?php echo $row['merk'] ?></option>}
		
		<?php 
		
		$ambil = $conn->query("SELECT * FROM merk ORDER BY nama_merk ASC");
		
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {
				echo '<option>'.$data['nama_merk'].'</option>';
			}
		}
			?>
		</select>

</tr>
<tr>
		<td>Deskripsi Produk :<textarea name="deskripsi" ><?php echo $row['deskripsi']; ?></textarea></td>
</tr>
<tr>
		<td>Harga Produk :<input type="teks" name="harga" value="<?php echo $row['harga_jual']; ?>" ></td>
</tr>
<tr>
		<td>Stock Produk :<input type="teks" name="stock" value="<?php echo $row['stock']; ?>" disabled></td>
</tr>
<tr>
		<td>Berat Produk :<input type="teks" name="berat" value="<?php echo $row['berat']; ?>" ></td>
</tr>
<tr>
		<td>Tanggal Masuk :<input type="date" name="tgl" value="<?php echo $row['tgl_masuk']; ?>" disabled></td>
</tr>
<tr>
		<td>Gambar Produk : <input type="file" name="gambar" value="">
		<img src="../../produk/<?php echo $row['gambar']; ?>" alt="" height="120"> 
		</td>
</tr>
<tr>
		<td>Terjual :<input type="teks" name="terjual" value="<?php echo $row['terjual']; ?>" disabled></td>
</tr>

<tr>
		<td>Diskon :<input type="teks" name="diskon" value="<?php echo $row['diskon']; ?>" ></td>
</tr>


</table>
<input type="submit" name="update" value="Update" >
	</form>
	
		
	

		
		

 </body>
 </html>