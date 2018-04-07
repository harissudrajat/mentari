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

$p=$_GET[p];
$act=$_GET[act];

// Hapus paket
if ($act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM paket WHERE id_paket='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM paket WHERE id_paket='$_GET[id]'");
     unlink("../../../foto_paket/$_GET[namafile]");   
     unlink("../../../foto_paket/small_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM paket WHERE id_paket='$_GET[id]'");
  }
  header('location:../../media.php?p=paket');


  mysql_query("DELETE FROM paket WHERE id_paket='$_GET[id]'");
  header('location:../../media.php?p=paket');
}

// Input paket
elseif ($act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 


  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/png"){
    echo "<script>window.alert('Upload Gagal');
        window.location=('../../media.php?p=paket)</script>";
    }
    else{
    UploadImage($nama_file_unik);

    mysql_query("INSERT INTO paket(nama_paket,
                                    id_kategori,
                                    harga,
                                    deskripsi,
                                    tgl_masuk,
                                    gambar) 
                            VALUES('$_POST[nama_paket]',
                                   '$_POST[kategori]',
                                   '$_POST[harga]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang',
                                   '$nama_file_unik')");
  header('location:../../media.php?p=paket');
  }
  }
  else{
    mysql_query("INSERT INTO paket(nama_paket,
                                    id_kategori,
                                    harga,
                                    deskripsi,
                                    tgl_posting) 
                            VALUES('$_POST[nama_paket]',
                                   '$_POST[kategori]',
                                   '$_POST[harga]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang')");
  header('location:../../media.php?p=paket');
  }
}

// Update paket
elseif ($act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 


  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE paket SET nama_paket = '$_POST[nama_paket]',
                                   id_kategori = '$_POST[kategori]',
                                   harga       = '$_POST[harga]',
                                   deskripsi   = '$_POST[deskripsi]'
                             WHERE id_paket   = '$_POST[id]'");
  header('location:../../media.php?p=paket');
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/png"){
    echo "<script>window.alert('Upload Gagal');
        window.location=('../../media.php?module=paket)</script>";
    }
    else{
    UploadImage($nama_file_unik);
    mysql_query("UPDATE paket SET nama_paket = '$_POST[nama_paket]',
                                   id_kategori = '$_POST[kategori]',
                                   harga       = '$_POST[harga]',
                                   deskripsi   = '$_POST[deskripsi]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_paket   = '$_POST[id]'");
    header('location:../../media.php?p=paket');
    }
  }
}
}
?>
