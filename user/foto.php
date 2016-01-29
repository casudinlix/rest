<?php 
require '../setting/server.php';
require'../setting/session.php';

$query_pelanggan = "SELECT * FROM login WHERE id='".$_SESSION['id']."'LIMIT 1";
	 $hasil = $conn->query($query_pelanggan);
	 if ($hasil->num_rows > 0) {
	 	while ($data = $hasil->fetch_assoc())  {

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<center>
<form action="" method="POST" accept-charset="utf-8">
	
	<td colspan="" rowspan="" headers=""> <img src=<?php echo $data['foto'] ?> ></td><br/>

<td><input type="file" name="foto"></td>
	

	
	</form>
	</center>
</body>
</html>


<?php } 
}?>