<?php
error_reporting(0);
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

$r=mysql_fetch_array(mysql_query("SELECT * FROM admin where username='admin'"));

$pass_lama=md5($_POST[pass_lama]);
$pass_baru=md5($_POST[pass_baru]);

if (empty($_POST[pass_baru]) OR empty($_POST[pass_lama]) OR empty($_POST[pass_ulangi])){
  echo "<p align=center>Anda harus mengisikan semua data pada form Ganti Password.<br />"; 
  echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
}
else{ 
if ($pass_lama==$r[password]){
    if ($_POST[pass_baru]==$_POST[pass_ulangi]){
    mysql_query("UPDATE admin SET password = '$pass_baru'");
	  echo "<script>alert('Update Password Berhasil'); window.location = '../../media.php?p=gantipassword'</script>";
  }
  else{
	echo "<script>alert('Password baru yang anda masukkan tidak sama'); window.location = '../../media.php?p=gantipassword'</script>";
  }
}
else{
echo "<script>alert('Password Lama anda salah'); window.location = '../../media.php?p=gantipassword'</script>";
}
}
}
?>
