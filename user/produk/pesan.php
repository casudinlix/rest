<?php
include "../../setting/server.php";
include "../../setting/session.php";



//$idt = $_SESSION['nama'];
//$id=$_GET['id'];
/*$query = $conn->query("SELECT * FROM order_user WHERE username ='$idt' AND id_order='$id'");
if ($query->num_rows == 0) {
	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
	echo "<script>window.location = '../user.php';</script>";
}
*/

 //$detail = "SELECT * FROM order_user WHERE username='$idt'";
//$query = $conn->query($detail);

$query = $conn->query("SELECT * FROM order_user, m_produk WHERE username='$idt'AND order_user.id_produk=m_produk.id_produk ");
//$query = $conn->query("SELECT * FORM order_user ot INNER JOIN m_produk p ON ot.id_produk=p.id_produk WHERE username='$idt'");
$numRow = $query->num_rows;
if ($numRow == 0) {
	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
	echo "<script>window.location = '../user.php';</script>";
}


?>
<form method="post" action="save_pesan.php">
	<div class="row-isi">
		<table width="95%" align="center">
			<tr>
				<td><h2>Rincian Pembelian :</h2></td>
			</tr>
			<tr>
				<td>
					<a href="../user.php"><input type="button" value="Beli Lagi" class="button round"></a>
				</td>
			</tr>
		</table>

		<table border="1"  width="" align="center">
			<tr bgcolor="#75D1FF">
				<th width="">No</th>
				
				
				<th width="">Nama produk</th>
				<th width="">Jumlah</th>
				<th width="">Harga</th>
				<th width="">Sub Total</th>
				<th width="">Gambar</th>
				<th width="">Aksi</th>

			</tr>
			<tbody>
			<?php
$no = 0;
				while ($row=$query->fetch_array()) {
					
					$no++;
	$subtotal = $row['qty'] * $row['harga'];
       $total = $total + $subtotal;
		
					?>
					<input type="hidden" name="id[]" value="<?php echo $row['id_produk'] ?>" >
					<tr><td colspan="" rowspan="" headers=""><?php echo $no; ?></td>
					
					<td colspan="" rowspan="" headers=""><?php echo $row['nama_produk']; ?></td>

					<td align="center">
					<?php if ($row['qty'] > 1): ?>
						<a class="href minus" href="aksi.php?act=min&amp;id=<?php echo $row['id_product']; ?>&amp;qty=<?php echo $row['qty'] ?>"></a>
					<?php else: ?>
						<a class="href minus disabled"></a>
					<?php endif ?>
					<input name="qty[]" readonly type="text" class="input" size="1" style="text-align:center; width:38px; padding-left:0;" value="<?php echo $row['qty']; ?>"/>
					<?php if ($row['qty'] < $row['stock']): ?>
						<a class="href plus" href="aksi.php?act=plus&amp;id=<?php echo $row['id_product']; ?>&amp;qty=<?php echo $row['qty'] ?>"></a>
					<?php else: ?>
						<a class="href plus disabled"></a>
					<?php endif ?>
				</td>
					
					<td colspan="" rowspan="" headers="">Rp-,<?php echo $row['harga'];?> </td>

						<td colspan="" rowspan="" headers="">Rp-,<?php echo $subtotal; ?></td>
						<td colspan="" rowspan="" headers=""><img src="../../produk/<?php echo $row['gambar']; ?>" width="250px"alt=""></td>
							<td><a href="hapus_pesan.php?id=<?php echo $row['id_produk']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
						</td>


					</tr>

			
							
<?php } 

?>
		<td align="right" colspan="4"><b style="margin-right: 3px;">Total Belanja</b></td>

<td align="right" colspan="3"><b>Rp.</b> <?php echo $total;?></td>		
<td><input type="submit" name="simpan" value="Lanjutkan"></td>

</tbody>
			</table>
			
</form>
