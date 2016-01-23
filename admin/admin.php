<?php

include_once '../setting/server.php';
include_once '../setting/session.php';



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
<?php
if (isset($_GET['profil'])) {
	$id = $_GET['id_pelanggan'];
}


	 $query_pelanggan = "SELECT * FROM pelanggan WHERE id_pelanggan='".$_SESSION['id']."'";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc()) {
echo "<a href=profil.php?id=".$data['id_pelanggan']."=".$_SESSION['nama'].">Profil</a>";	 	}
	 }
	 	
	  ?>
	<a href="../logout.php">Keluar</a>
	
	

</body>
</html>
