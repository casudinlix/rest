<?php 

 include_once '../../setting/server.php';


function random_char( $panjang ) { 
	$karakter = 'P'; 
	$string = ''; 
	for ( $i = 0; $i < $panjang; $i++ ) { 
		$pos = strlen( $karakter ) - 1 ; 
		$string .= $karakter{$pos}; 
	} 
return $string;
}


$years = date( 'Y' ); // tahun
$get_3_number_of_year = substr( $years,-3 ); // mengambil 3 angka dari sebelah kanan pada tahun sekarang


/**
*
* Query untuk mengambil 1 baris data berdasarkan id / kode yg terakhir
* RIGHT(kd_barang,3) maksudnya mengambil 3 angka dari sebelah kanan diurutkan berdasarkan kode tsb secara Descending
*/
$get_data = $conn->query("SELECT RIGHT(id_produk,2) FROM m_produk ORDER BY RIGHT(id_produk,2) DESC" );

$check_data = $get_data->num_rows;
$fetch_data = $get_data->fetch_array();
$maxid = $fetch_data[0];

// MEMBUAT CUSTOM KODE BAGIAN DEPAN
$custom_code = random_char(1) . $get_3_number_of_year . '-'; // 7 karakter custom code dari sebelah kiri


if ( empty( $check_data ) ) { // Mengecek apakah di dlm database tidak ada data maka
  $new_code = 1; // kode dimulai dr 1
} else { // jika ada data dlm db maka
  $the_code = substr( $maxid, -7 ); // kode yg ada pd db di pecah dan diambil hannya karakter selain ke 7 custom code tsb. / hannya 3 angka dibagian blkng yg diambil
  $new_code = $the_code + 1; // 3 angka tsb setelah dipecah akan ditambahkan 1 secara berurutan berdasarkan data yg terakhir
}

/**
*
* Dibawah ini merupakan custom code bagian belakan
* Saya membuat code bagian belakang hanya untuk menampung ribuan data (3 angka)
*/
$kd = ''; // Mendifinisikan nilai variable.
if ( $new_code >= 1 && $new_code < 10 ) :
 	$kd .= $custom_code."00".$new_code;
elseif ( $new_code >= 10 && $new_code < 100 ) :
 	$kd .= $custom_code."0".$new_code;
else :
	$kd .= $custom_code.$new_code; // batas data di db hannya sampai 9999 data
endif;

 ?>