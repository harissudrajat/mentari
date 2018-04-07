<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$aksi=$_GET[aksi];

// Hapus 
if ($aksi=='hapus'){
  mysql_query("DELETE FROM reservations WHERE rsrv_id='$_GET[id]'");
  header('location:../../media.php?p=reservasi');
}


elseif ($aksi=='edit'){
  mysql_query("UPDATE reservations SET dp = '$_POST[dp]' WHERE rsrv_id = '$_POST[id]'");
  
  header('location:../../media.php?p=reservasi');
}

elseif ($aksi=='update'){
   if ($_POST[status]=='Diterima'){ 
     
      // Update status reservasi
      mysql_query("UPDATE reservations SET status='$_POST[status]' where rsrv_id='$_POST[id]'");
      header('location:../../media.php?p=reservasi');
      }	  
 elseif ($_POST[status]=='Uang_Muka'){ 
     
      // Update status reservasi
      mysql_query("UPDATE reservations SET status='$_POST[status]' where rsrv_id='$_POST[id]'");
      header('location:../../media.php?p=reservasi');
      }	 
 else{
     mysql_query("UPDATE reservations SET status='$_POST[status]' where rsrv_id='$_POST[id]'");
     header('location:../../media.php?p=reservasi');
     }
}
}
?>