<?php
include "setting/server.php";
$sql = "SELECT * FROM produk";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
  while ($data = $query->fetch_assoc()) {
    


  
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
  <form action="" method="POST" accept-charset="utf-8">
    <td colspan="" rowspan="" headers="">Nama</td>&nbsp;<td><?php echo $data['nama_produk']; ?></td>&nbsp;
    <img src="produk/<?php echo $data['gambar'];?>" width="200px" height="200px"/>

  </form>
  	
  </body>
  </html>

  <?php 
}
}
   ?>