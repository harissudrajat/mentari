<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($_GET['p']=='reservasi')
{ 
include "modul/reservasi/reservasi.php";
}
else
if ($_GET['p']=='carareservasi')
{ 
include "modul/carareservasi/carareservasi.php";
}
else
if ($_GET['p']=='gantipassword')
{ 
include "modul/gantipassword/gantipass.php";
}
else
if ($_GET['p']=='paket')
{ 
include "modul/paket/paket.php";
}
else
if ($_GET['p']=='kategori')
{ 
include "modul/kategori/kategori.php";
}
else
if ($_GET['p']=='buktitf')
{ 
include "modul/buktitf/buktitf.php";
}
else

?>
</body>
</html>