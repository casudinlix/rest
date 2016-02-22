<?php 
include "../../setting/server.php";
include "../../setting/session.php";


$idt = $_SESSION['nama'];

$sql = $conn->query("SELECT * FROM login WHERE nama='$idt' ");
$data =$sql->fetch_assoc();

$query = $conn->query("SELECT username FROM order_user WHERE username='$idt'");
if ($numRow=$query->num_rows == 0) {
	echo "<script>window.alert('Anda Belum Melakukan Transaksi);</script>";
	echo "<script>window.location = '../user.php';</script>";
}
$query = $conn->query("SELECT * FROM login WHERE nama='$idt'");
$datacus = $query->fetch_array();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Konfirmasi</title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
<form action="save_konfir_pesan.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
<center>
	<H1>Data Customers</H1>
	<table>

	<input type="hidden" name="id_cus" value="<?php echo $datacus['nama']; ?>">
	<input type="hidden" name="kode" value="<?php echo $_GET['id_order']; ?>" placeholder="">
		<tr>
			<td colspan="" rowspan="" headers="">Nama:<input type="teks" name="nama" value="<?php echo $idt; ?>" readonly></td>
		</tr>
		<tr>
			<td colspan="" rowspan="" headers="">Alamat:<textarea name="alamat"  readonly=""><?php echo $data['alamat']; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="" rowspan="" headers="">Ongkos Kirim:
			<select name="ongkos">
				<option value="">---</option>
				<?php
		$ambil = $conn->query("SELECT * FROM tarif ");
		if($ambil->num_rows > 0){
			while ( $data =$ambil->fetch_array()) {
				?>
				<option value="<?php echo $data['reg']; ?>"><?php echo $data['kota']."&nbsp;Rp-,".$data['reg']; ?></option>';
				<?php
			}
		}
			?>
			</select>
			</td></tr>
			<tr>
			<td colspan="" rowspan="" headers="">Email:<input type="teks" name="email"  readonly value="<?php echo $datacus['email'];?>" ></td>
			<tr>
			<td colspan="" rowspan="" headers="">Bukti Transfer:<input type="file" name="bukti" ></td>
		</tr>
		
	</table>
<td colspan="" rowspan="" headers=""><input type="submit" name="simpan" value="Simpan"></td>
</center>
</form>
 </body>
 </html>