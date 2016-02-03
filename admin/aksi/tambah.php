<?php 
include_once '../../setting/server.php';
include_once '../../setting/session.php';
 ?>

<head>
<title>Membuat Kode Otomatis Menggunakan PHP</title>
</head>
<body>
<?php
include 'fungsi.php';

?>
<form method="post"/>
<input type="text" name="kode" value="<?php echo $kode;?>" disabled/>
<input type="submit" name="save" value="Simpan"/>
</form>
</body>
</html>