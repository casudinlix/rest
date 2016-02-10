<?php



if (isset($_GET['profil'])) {
	$id = $_GET['id'];
}


	 $query_pelanggan = "SELECT * FROM login WHERE id='".$_SESSION['id']."' LIMIT 1";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc()) {
	 		echo "<a href=menu/profil.php?id=".$data['id']."=".$_SESSION['nama'].">Profil</a>"; 
	 		echo "&nbsp||&nbsp;";
	 		echo "<a href=menu/pass.php?id=".$data['id']."=".$_SESSION['nama'].">Rubah Password</a>";
	 	}
	 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Selamat Datang  <?php echo $_SESSION['nama'];?> </title>
	<link rel="stylesheet" href="">
</head>
<body>
	||<a href="aksi/produk.php">Master Produk</a>|| 
	<a href="../../logout.php">Keluar</a>||
	<a href="cari_produk.php" title=""> Cari Produk</a>
</body>
</html>