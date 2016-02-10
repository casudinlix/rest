<?php 
include_once '../setting/server.php';
$q=$_POST['q'];

// query untuk melakukan pencarian
$query=$conn->query("SELECT * from m_produk where id_produk like '%".$q."%' LIMIT 1");
// mendapatkan jumlah baris
$row=$query->num_rows;
?>
<html>

<?php 
if ($row > 0) // jika baris lebih dari 0 / data ditemukan
{
	while ($data=$query->fetch_array()) // perulangna untuk menampilkan data
	{
		// menampilkan data dalam bentuk table
		?>
		<form action="aksi/action_stock.php" method="POST" accept-charset="utf-8">
	

<table border="0">
<tr>
		<td >Kode Barang </td>
</tr>
		<tr><td><input type="text" name="kode" value="<?php echo $data['id_produk']; ?>"readonly></td>
		</tr>
		<tr><td >Nama Barang</td>
</tr>
		 <tr><td><input type="text" name="nama" value="<?php echo $data['nama_produk']; ?>" placeholder="" readonly></td>
		</tr>
		<tr><td>Jenis Barang </td>
		<tr><td><input type="text" name="jenis" value="<?php echo $data['jenis']; ?>" placeholder="" readonly></td>
		</tr>
		<tr><td>Kategori Barang </td>
		</tr>
		<tr>
		<td><input type="text" name="kategori" value="<?php echo $data['kategori']; ?>" placeholder="" readonly></td>
		</tr>
		<tr><td>Merk Barang</td>
		</tr>
		<tr><td> <input type="text" name="merk" value="<?php echo $data['merk']; ?>" placeholder="" readonly></td>
		</tr>
		<tr><td>Deskripsi Barang</td>
		 </tr>
		 <tr>
		 <td><input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" placeholder="" readonly></td>
		</tr>
		<tr><td >Berat Barang </td>
</tr>
		<tr><td><input type="text" name="berat" value="<?php echo $data['berat']; ?>" placeholder="" readonly></td>
		</tr>
		<tr><td>QTY min </td></tr>
		<tr>
		<td><input type="text" name="qtymin" value="<?php echo $data['qty_min']; ?>" placeholder="" readonly></td>
		
		</tr>
		<tr><td>QTY MAX </td>
</tr>
<tr>
		<td><input type="text" name="qtymax" value="<?php echo $data['qty_max']; ?>" placeholder="" readonly></td>
		</tr>
		<tr>
		<td>Tanggal Masuk </td>
		</tr>
		<tr><td><input type="text" name="tgl" value="<?php echo $data['tgl_masuk']; ?>" placeholder="" readonly></td>
		</tr>
		<tr>
		<td>Harga </td>
		</tr>
		</tr>
		<tr><td><input type="text" name="harga" value="<?php echo $data['harga']; ?>" placeholder="" readonly></td>
		</tr>
		<tr><td>Gambar</td>
		</tr>
		<tr>
		 <td><img src="../produk/<?php echo $data['gambar'];?>" alt="Produck" height=102></td>
		</tr>
		<tr>
		<td colspan="" rowspan="" headers="">Tambah <input type="text" name="qty" value="" placeholder="Isi QTY"><input type="submit" name="tambah" value="Tambah"></td>

		
		</tr>

			<?php
	}
}
else // jika data tidak ditemukan
{
	echo "<strong>Data tidak ditemukan</strong>";	
}
?>
</table>

</form>
</html>