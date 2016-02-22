<?php 
include "../../setting/server.php";
include "../../setting/session.php";
$id=$_GET['id'];

$idt = $_SESSION['nama'];
//$query = $conn->query("SELECT * FROM transaksi, m_produk WHERE username='$idt'AND transaksi.id_produk=m_produk.id_produk ");
//$cek = $query->fetch_array();
$query = $conn->query("SELECT * FROM transaksi WHERE username='$idt' AND id_order='$id' ");


 ?>
 <form method="post" action="save_pesan.php">
	<div class="row-isi">
		<table width="95%" align="center">
			<tr>
				<td><h2>Rincian Pembelian :</h2></td>
			</tr>
			<tr>
				<td>
					<a href="../user.php"><input type="button" value="Beli Lagi" ></a>
				</td>
			</tr>
		</table>

		<table border="1"  width="" align="center">
			<tr bgcolor="#75D1FF">
				<th width="">No</th>
				
				
				<th width="">ID Order</th>
				<th width="">Id Produk</th>
				
				<th width="">QTY</th>
				
				<th width="">Status</th>

			</tr>
			<tbody>
			<?php
$no = 0;
				while ($row=$query->fetch_array()) {
					
					$no++;
	
		
					?>
					
					<tr><td colspan="" rowspan="" headers=""><?php echo $no; ?></td>
					
					<td colspan="" rowspan="" headers=""><?php echo $row['id_order']; ?></td>
					<td colspan="" rowspan="" headers=""><?php echo $row['id_produk']; ?></td>
					<td><?php echo $row['qty'];?></td>

						<td><?php echo $row['status'];?></td>
						</td>


					</tr>

			
							
<?php } 

?>
		




</tbody>
			</table>