<?php
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
$kar1=strstr($_POST[email], "@");
$kar2=strstr($_POST[email], ".");
 
$nama           = $_POST['nama'];
$paket	        = $_POST['paket'];
$email	        = $_POST['email'];
$no_telepon		= $_POST['contact'];
$jumlah			= $_POST['jumlah'];
$start 		    = $_POST['rsrv_start'];
$end 	        = $_POST['rsrv_end'];

if (strlen($kar1)==0 OR strlen($kar2)==0){
	 echo "<script>window.alert('Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.')</script>";
 echo "<meta http-equiv='refresh' content='0; url=reservasi.php'>";
}
else{
mysql_query("INSERT INTO reservations(nama, paket, email, contact, jumlah, rsrv_start, rsrv_end) 
             VALUES('$nama','$paket','$email','$no_telepon','$jumlah','$start' ,'$end')");

			 
			 
 echo "<script>window.alert('Pendaftaran Berhasil, Klik OK untuk melanjutkan')</script>";
 echo "<meta http-equiv='refresh' content='0; url=reservasi.php'>";

}

?>

</body>
</html>