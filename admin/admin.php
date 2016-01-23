<?php

include_once '../setting/server.php';
include_once '../setting/session.php';



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $_SESSION['nama'];?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<a href="../logout.php">Keluar</a>
	<a href="profil.php">Lengkapi Profile <?php echo $_SESSION['nama'];?></a>

</body>
</html>
