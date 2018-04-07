<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus upload
if ($act=='hapus'){
  mysql_query("DELETE FROM upload WHERE id_upload='$_GET[id]'");
  header('location:../../media.php?p=buktitf');
}
