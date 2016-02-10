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
<img src="foto/<?php echo $data['foto'];?>" width="200px" height="200px"/>
<form action="action_foto.php" method="POST"  enctype="multipart/form-data">



<td>Upload Photo <?php echo $_SESSION['nama'] ?> <br/>
<input name="id" type="hidden" value="<?php echo $_SESSION['id']; ?>">
<input type="file" name="foto"></td><br/>

<td><input type="submit" name="submit" value="Update"></td>

	</form>
	</center>
</body>
</html>


<?php }

}




?>