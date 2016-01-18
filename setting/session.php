<?php
// memulai session
session_start();
error_reporting(0);

if (isset($_SESSION['role']))
{
 // jika level admin
 if ($_SESSION['role'] == "1")
   {   
   echo "Selamat Datang<br/>".$_SESSION['nama'];
   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   else if ($_SESSION['role'] == "2")
   {
       echo "Selamat Datang<br/>".$_SESSION['nama'];
   }
   elseif ($_SESSION['role']=="3") {
   	echo "Selamat Datang<br/>".$_SESSION['nama'];
   }
}
if (!isset($_SESSION['role']))
{
 header('location:../fail.php');
}
 ?>