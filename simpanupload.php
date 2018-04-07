<?php
/*error_reporting(0); */
session_start();
include "config/koneksi.php";
include "config/library.php";


$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
  
// Rename nama gambarnya dengan menambahkan tanggal dan jam upload
$gambarbaru = date('dmYHis').$gambar;

// Set path folder tempat menyimpan gambarnya
$path = "uploads/".$gambarbaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO upload(nama,gambar,deskripsi,no_telp,tgl,jam)
                            VALUES('$nama','$gambarbaru','$deskripsi','$no_telp','$tgl_sekarang','$jam_sekarang')";
  $sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='upload.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "<script>window.alert('Maaf, Gambar gagal untuk diupload karenamelebihi 2 Mb.')</script>";
  echo "<br><a href='upload.php'></a>";
}
?>