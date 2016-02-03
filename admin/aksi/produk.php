<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';
$sql = "SELECT * FROM produk";
$query= $conn->query($sql);
if ($query->num_rows > 0) {
	while ($data = $query->fecth_assoc()) {
		}
}
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
	<?php 

	echo $data[''];	




	 ?>
		
	</form>
</body>
</html>





























<?php 

 	

$conn->close();
 ?>