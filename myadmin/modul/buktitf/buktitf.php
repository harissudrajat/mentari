<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/buktitf/aksi_buktitf.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		     <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Bukti Transfer</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th width='15%'>Nama</th>
                                    <th width='15%'>Deskripsi</th>
                                    <th width='10%'>Jam</th>
									<th width='10%'>Tanggal</th>
                                    <th width='15%'>No. Telp</th>
                                    <th width='15%'>Gambar</th>
                                    <th width='15%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$upload=mysql_query('SELECT * FROM upload ORDER BY id_upload ASC');
							while($r=mysql_fetch_array($upload)){
                             echo"<tr>
                                    <td>$r[nama]</td>
                                    <td>$r[deskripsi]</td>
									<td>$r[jam]</td>
									<td>$r[tgl]</td>
									<td>$r[no_telp]</td>
                                    <td valign='top'><img src=../uploads/$r[gambar] width=50 height=20></td>
                                    <td><a href='$aksi?act=hapus&id=$r[id_upload]&namafile=$r[gambar]'>HAPUS</td>
                                    
                                </tr>";
							}
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
                        
        </div>
    </div>";    

break;


			}//penutup switch
}//penutup session
?>    
</body>
</html>