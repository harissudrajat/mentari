<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/reservasi/aksi_reservasi.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
	   <form method='post'>
     <input type='text' placeholder='Nama' name='cari'> 
     <input type='submit' class='btn ' value='cari' name='filter'>
     </form>
	 
		<p>
    <p>
			 <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Reservasi Masuk</h1>      
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
								<th width='5%'>No.Reservasi</th>
								<th width='10%'>Nama</th>
								<th width='15%'>Paket Reservasi</th>
								<th width='5%'>jumlah</th>
								<th width='10%'>Check-In</th>
								<th width='10%'>Check-Out</th>      
								<th width='15%'>Email</th>       
								<th width='10%'>No. Telp</th>  
								<th width='10%'>Status</th>   
								<th width='10%'>Aksi</th>                                         
                       </tr>
					   
                            </thead>
                            <tbody>";
					   
    
	if(isset($_POST['filter'])){
               $cari = $_POST['cari'];
			   $tampil = mysql_query("SELECT * FROM reservations  where nama like '%".$cari."%' ORDER BY rsrv_id desc ");
              }else{
  							$tampil=mysql_query("SELECT * FROM reservations  ORDER BY rsrv_id desc ");
                
              }
              $no=1;
							while($r=mysql_fetch_array($tampil)){
                             echo"<tr>
                                    <td>$r[rsrv_id]</td>
                                    <td>$r[nama]</td>
                                    <td>$r[paket]</td>
									<td>$r[jumlah]</td>
                                    <td>$r[rsrv_start]</td>
                                    <td>$r[rsrv_end]</td>
                                    <td>$r[email]</td>
                                    <td>$r[contact]</td>
									<td>$r[status]</td>
                                    <td><a href=?p=reservasi&aksi=detailreservasi&id=$r[rsrv_id]>Baca</a>|
										<a href=?p=reservasi&aksi=edit&id=$r[rsrv_id]>Edit</a>|
									    <a href='$aksi?aksi=hapus&id=$r[rsrv_id]&namafile=$r[gambar]'>Hapus</td>     
                                </tr>";
								
    }
	
	           

    break;
  
  case "edit":
	$edit = mysql_query("SELECT * FROM reservations WHERE rsrv_id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/reservasi/aksi_reservasi.php?aksi=edit' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Masukan Uang Muka</h1>
                    </div>    
					<input type=hidden name=id value=$r[rsrv_id]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Uang Muka</div>
                            <div class='span9'><input type='text' name='dp' value='$r[dp]'/></div>
                        </div>
						 
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
  ";
echo "";
break;
  
 
  case "detailreservasi":
    $edit = mysql_query("SELECT * FROM reservations WHERE rsrv_id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    $pilihan_status = array('Batal','Uang_Muka','Lunas');
    $pilihan_reservasi = '';
    foreach ($pilihan_status as $status) {
	   $pilihan_reservasi .= "<option value=$status";
	   if ($status == $r[status]) {
		    $pilihan_reservasi .= "selected";
	   }
	   $pilihan_reservasi .= ">$status</option>\r\n";
    }

    echo "
	<div class='content'>

        <div class='workplace'>
            
            <div class='row-fluid'>
                
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Reservasi Detail</h1>      
                    </div>
                    <div class='block-fluid'>";

    echo "<form method=POST action=$aksi?p=reservasi&aksi=update>
          <input type=hidden name=id value=$r[rsrv_id]>
          <table  cellpadding='0' cellspacing='0' width='100%' class='table'>
          <tr><td>No. Reservasi</td>        <td> : $r[rsrv_id]</td></tr>
          <tr><td>Tanggal Reservasi</td> <td> : $r[rsrv_start] Sampai $r[rsrv_end]</td></tr>
          <tr><td>Status Reservasi      </td><td>: <select name=status>$pilihan_reservasi</select> 
          <input type=submit value='Ubah Status'></td></tr>
          </table></form>";
	
  // tampilkan rincian produk yang di reservasi
  $sql2=mysql_query("select * from reservations where rsrv_id='$r[rsrv_id]'");
   $c=mysql_fetch_array($sql2);
  
  echo "<table breservasi=0 width=500  cellpadding='0' cellspacing='0' width='100%' class='table'>
        <tr><th colspan=2>Data reservasi</th></tr>
        <tr><td>Nama Penyewa</td><td> : $c[nama]</td></tr>
        <tr><td>No. Telpon/HP</td><td> : $c[contact]</td></tr>
        <tr><td>Email</td><td> : $c[email]</td></tr>
        <tr><td>Pelunasan / Uang Muka</td><td> : Rp.$c[dp]</td></tr>
        </table>";
    
	
	case "kiriminvoice":        

    echo "<h2>Kirim Faktur Pembelian</h2>
          <form method=POST action='?p=reservasi&aksi=kirimemail'>
          <table  cellpadding='0' cellspacing='0' width='100%' class='table'>
          <tr><td>Kepada</td><td> : <input type=text name='email' size=30 value='$c[email]'></td></tr>
          <tr><td>Subjek</td><td> : <input type=text name='subjek' size=50 value='Faktur Pembelian'></td></tr>
          <tr><td>Pesan</td><td><textarea name='pesan' style='width: 600px; height: 350px;' id='wysiwyg' >		  
-----------------------------------------------------------------------------------
  Kami Telah Menerima Pembayaran Reservasi 
  No. Reservasi $r[rsrv_id], 
  Atas Nama: $c[nama] 
  Sebesar Rp. $c[dp]
  Dengan ini, Kami Sampaikan Bahwa pesanan Anda 
  Telah kami Proses dan Akan Segera Kami Kirim, 
  
  
  Terima kasih telah percaya kepada kami.
								Salam kami,
		    
								Kampoeng Jelok Resto
  -----------------------------------------------------------------------------------
  </textarea></td></tr>
          <tr><td colspan=2><input type=submit value=Kirim>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
	echo "         </div>
                </div>                                
                
            </div>            
            
            <div class='dr'><span></span></div>
        </div>
        
    </div>";

     break;
    
  case "kirimemail":
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: KampoengJelokResto@gmail");
    echo "<script>alert('Email telah sukses terkirim ke tujuan'); window.location = 'media.php?p=reservasi'</script>";
	 break;
 }
}
?>

