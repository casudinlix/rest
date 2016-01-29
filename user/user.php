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
	$id = $_GET['id'];
}


	 $query_pelanggan = "SELECT * FROM login WHERE id='".$_SESSION['id']."' LIMIT 1";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc()) {
	 		echo "<a href=profil.php?id=".$data['id']."=".$_SESSION['nama'].">Profil</a>"; 
	 		echo "&nbsp &nbsp &nbsp||&nbsp &nbsp &nbsp;";
	 		echo "<a href=pass.php?id=".$data['id']."=".$_SESSION['nama'].">Rubah Password</a>";
	 	}
	 }
	 	
	  ?>
	<a href="../logout.php">Keluar</a>
	
	

</body>
</html>
