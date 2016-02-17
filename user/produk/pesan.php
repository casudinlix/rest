<?php
include "../../setting/server.php";
include "../../setting/session.php";

$idt = $_SESSION['nama'];
$query = $conn->query("SELECT * FROM order_sementara ot INNER JOIN produk p ON ot.id_produk=p.id_produk WHERE username = '$idt'");

if ($query->num_rows == 0) {
	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
	echo "<script>window.location = '../user.php';</script>";
}

?>
<form method="post" action="save_purchase.php">
	<div class="row-isi">
		<table width="95%" align="center">
			<tr>
				<td><h2>Rincian Pembelian :</h2></td>
			</tr>
			<tr>
				<td>
					<a href="../aplikasi/index.php"><input type="button" value="Beli Lagi" class="button round"></a>
				</td>
			</tr>
		</table>
		<table border="1" class="border" width="95%" align="center">
			<tr bgcolor="#75D1FF">
				<th width="25px">No</th>
				<th width="305px">Nama Produk</th>
				<th width="190px">Harga Satuan</th>
				<th width="95px">Jumlah</th>
				<th width="190px">Sub Total</th>
			</tr>
			<?php
				$no = 1;
				$total = 0;
			?>
			<tr>
		        <?php while ($data = $query->fetch_assoc()): ?>

				<input type="hidden" name="id[]" value="<?php echo $data['id_produk']; ?>" />
				<td align="center"><?php echo $no; ?></td>
				<td style="padding-left:5px;"><?php echo $data['nama_produk']; ?>&nbsp;<?php echo $data['jenis']; ?></td>
				<td>Rp. <input readonly type="text" class="input" style="width:135px;" value="<?php echo price($data['price']); ?>"></td>

				<?php
					$sub_total = $data['harga'] * $data['qty'];
			        $total += $sub_total;
				?>

				<td align="center">
					<?php if ($data['qty'] > 1): ?>
						<a class="href minus" href="../aplikasi/aksi.php?act=min&amp;id=<?php echo $data['id_produk']; ?>&amp;qty=<?php echo $data['qty'] ?>"></a>
					<?php else: ?>
						<a class="href minus disabled"></a>
					<?php endif ?>
					<input name="qty[]" readonly type="text" class="input" size="1" style="text-align:center; width:38px; padding-left:0;" value="<?php echo $data['qty']; ?>"/>
					<?php if ($data['qty'] < $data['stock']): ?>
						<a class="href plus" href="../aplikasi/aksi.php?act=plus&amp;id=<?php echo $data['id_produk']; ?>&amp;qty=<?php echo $data['qty'] ?>"></a>
					<?php else: ?>
						<a class="href plus disabled"></a>
					<?php endif ?>
				</td>
				<td>
					Rp. <input style="width:130px;" type="text" class="input" readonly value="<?php echo harga($sub_total); ?>">

					<a href="../aplikasi/aksi.php?act=del&amp;id=<?php echo $data['id_produk']; ?>" style="vertical-align: -3px;">
						<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/shop/image/icon/delete.png' ?>" width ="13px">
					</a>
				</td>
			</tr>
			<?php
				$no++;
				endwhile
			?>
			<tr>
				<td align="right" colspan="4"><b style="margin-right: 3px;">Total Belanja</b></td>
				<td><b>Rp.</b> <input style="font-weight: bold; width:130px;" name="total" type="text" class="input" readonly value="<?php echo harga($total); ?>"></td>
			</tr>
			<tr>
				<td colspan="5" align="center">
					<input type="submit" value="Lanjutkan" class="button round">
					<a href="../aplikasi/aksi.php?act=clear" class="button round error">Batal</a>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td><?php include "../footer/footer.php" ?></td>
			</tr>
		</table>
	</div>
</form>
