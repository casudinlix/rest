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
	 $query_pelanggan = "SELECT id_pelanggan FROM pelanggan";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc()) {
	 		echo $data['id_pelanggan'];
	 	}
	 }
	 	
	  ?>
	<a href="../logout.php">Keluar</a>
	
	

</body>
</html>
