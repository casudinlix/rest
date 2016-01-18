<?php
// memulai session
session_start();
error_reporting(0);

if (isset($_SESSION['role']))
{
 // jika level administrator
 if ($_SESSION['role'] == "1"){

   	header('location:administrator/administrator.php');
   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   elseif ($_SESSION['role'] == "2")
   {
       header('location:user/user.php');
   }

}
elseif ($_SESSION['role'] == "3") {
	header('location:user/user.php');
}
if (!isset($_SESSION['role']))
{
 header('location:index.php?Error=Login');
}
 ?>