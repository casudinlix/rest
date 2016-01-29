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
	
	<td><img src="<?php echo $data['foto'] ?>" width=250 height=150> </td><br/>

<td>Upload Photo <?php echo $_SESSION['nama'] ?> <br/>

<input type="file" name="foto"></td><br/>
	
<td><input type="submit" name="submit" value="Update"></td>
	<input type="hidden" id="x" name="x" value="<?php echo $data['foto'] ?>" >
	</form>
	</center>
</body>
</html>


<?php } 

}
$file = $_FILES['foto']['tmp_name'];

if (!isset($file)) {
	echo "PILIH FOTO coy";
}else{
	$image= addslashes(file_get_contents($_FILLES['foto']['tmp_name']));
	$image_name = addslashes($_FILLES['foto']['name']);
	$image_size = getimagesize($_FILLES['foto']['tmp_name']);
	if ($image == FALSE) {
		echo "File Bukan Gambar";
	}else{
		if (!$insert = $conn->query("INSERT INTO login (foto) VALUES('$foto')")) {
			echo "Gagal".$conn->error;
		}else{
			$last = $conn->insert_id();
			echo "Gambar berhasil";
		}
	}
}

	
			
		
		$sql = "UPDATE login  SET foto='$buat_foto' WHERE id='".$_SESSION['id']."'";

		

	

	


?>