<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda Telah Keluar Dari Halaman Admin Kampoeng Jelok Resto'); window.location = 'index.php'</script>";
?>
