<?php 

 include_once '../../setting/server.php';


function random_char( $panjang ) { 
	$karakter = 'T'; 
	$string = ''; 
	for ( $i = 0; $i < $panjang; $i++ ) { 
		$pos = strlen( $karakter ) - 1 ; 
		$string .= $karakter{$pos}; 
	} 
return $string;
}


$encript = md5("ORDER");
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = $conn->query("SELECT max(id_order) AS last FROM order_detail WHERE id_order LIKE '$kode%'");
$result = $kdauto->fetch_array();
$lastNoOrder = $result['last'];
$lastNoUrut = substr($lastNoOrder, 5, 3);
$nextNoUrut = $lastNoUrut + 1;
$nextNoOrder = $kode.sprintf('%03s', $nextNoUrut);




 ?>