<?php
// memulai session
session_start();

if (isset($_SESSION['role']))
{
 // jika level administrator
 if ($_SESSION['role'] == "1"){

   	echo "<script>window.location.assign('administrator/administrator.php')</script>";
   }
   // jika kondisi level user maka akan diarahkan ke halaman lain
   elseif ($_SESSION['role'] == "2")
   {
       echo "<script>window.location.assign('user/user.php')</script>";
   }

}
elseif ($_SESSION['role'] == "3") {
	echo "<script>window.location.assign('admin/admin.php')</script>";
}
if (!isset($_SESSION['role']))
{
 header('location:index.php?Error=Login');
}
 ?>