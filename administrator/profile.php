<?php

require '../setting/server.php';
require'../setting/session.php';

if(isset($_POST['edit'])=='edit'){
  $nama = htmlentities($_POST['nama_pelanggan']);
  $alamat =htmlentities($_POST['alamat_pelanggan']);
  $tlp = htmlentities ($_POST['tlp_pelanggan']);
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<style type="text/css">


-->
</style></head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td bgcolor="#CCCC99"><a href="main_forum.php">Main Forum</a> &gt; User Profile 
	<?php 
	
	$sql="select * from user_login where email='".$_SESSION['user_forum']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	?></td>
  </tr>
  <tr>
    <td bgcolor="#CCCC99"><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellpadding="0">
        <tr>
          <td width="150" align="right">Email</td>
          <td width="10">&nbsp;</td>
          <td><input name="temail" type="text" id="temail" readonly="true" value="<?php echo $row['email'];?>" /></td>
        </tr>
        <tr>
          <td align="right">First Name </td>
          <td>&nbsp;</td>
          <td><input name="tfname" type="text" id="tfname" value="<?php echo $row['first_name'];?>" /></td>
        </tr>
        <tr>
          <td align="right">Last Name </td>
          <td>&nbsp;</td>
          <td><input name="tlname" type="text" id="tlname" value="<?php echo $row['last_name'];?>" /></td>
        </tr>
        <tr>
          <td align="right">Password</td>
          <td>&nbsp;</td>
          <td><input name="tpass1" type="password" id="tpass1" value="<?php echo $row['password'];?>" /></td>
        </tr>
        <tr>
          <td align="right">Retype Password </td>
          <td>&nbsp;</td>
          <td><input name="tpass2" type="password" id="tpass2" value="<?php echo $row['password'];?>" />
            <input name="action" type="hidden" id="action" value="edit" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Save" /></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
  <tr>
    <td><?php include('footer.php'); ?></td>
  </tr>
</table>
</body>
</html>
