<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/paket/aksi_paket.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		  
		  <p align='right'><a href='?p=paket&aksi=tambah' role='button' class='btn'>Input Paket Baru</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Paket</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                   <th width='25%'>Nama Paket</th>
                                    <th width='25%'>Harga</th>
                                    <th width='25%'>Gambar</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM paket ORDER BY id_paket ASC');
							while($r=mysql_fetch_array($tp)){
							$harga=format_rupiah($r[harga]);
                             echo"<tr>
                                   <td>$r[nama_paket]</td>
                                    <td>$harga</td>
									<td><img src='../foto_paket/$r[gambar]'width=50px></td>
                                    <td><a href='?p=paket&aksi=edit&id=$r[id_paket]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_paket]&namafile=$r[gambar]'>HAPUS</td>
                                    
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
case "edit":
	$edit = mysql_query("SELECT * FROM paket WHERE id_paket='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/paket/aksi_paket.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Edit Paket</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_paket]>
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Paket</div>
                            <div class='span9'><input type='text' name='nama_paket' value='$r[nama_paket]'/></div>
                        </div>
						 
					   <div class='row-form clearfix'>
                            <div class='span3'>Kategori</div>
                            <div class='span9'>
							<select name='kategori' id='s2_1' style='width: 100%;'>";
								  $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
								  if ($r[id_kategori]==0){
									echo "<option value=0 selected>- Pilih Kategori -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[id_kategori]==$w[id_kategori]){
									  echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
									}
									else{
									  echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
									}
								  }                                 
                       echo"</select>
							</div>
                        </div>
						
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Harga</div>
                            <div class='span9'><input type='text' name='harga' value='$r[harga]'/></div>
                    </div>
					
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Deskripsi</div>
                            <div class='span9'> <textarea id='wysiwyg2' name='deskripsi'' style='height: 50px;'>$r[deskripsi]</textarea></div>
                    </div>
					
					 <div class='row-form clearfix'>
					 	<div class='block gallery clearfix'><img src='../foto_paket/$r[gambar]'width=250px></div>
					 </div>
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>Gambar</div>
                            <div class='span9'> <input type='file' name='fupload'>
							<br>
							*) Apabila gambar tidak diubah, dikosongkan saja.
							</div>
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

case "tambah":
echo "<form method='post' action='modul/paket/aksi_paket.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>Input Data Baru</h1>
                    </div>    
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Paket</div>
                            <div class='span9'><input type='text' name='nama_paket'/></div>
                        </div>
						 
					   <div class='row-form clearfix'>
                            <div class='span3'>Kategori</div>
                            <div class='span9'>
							<select name='kategori' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Kategori -</option>";
										$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
						
					 
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Harga</div>
                            <div class='span9'><input type='text' name='harga'/></div>
                    </div>
					
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Deskripsi</div>
                            <div class='span9'> <textarea id='wysiwyg' name='deskripsi'' style='height: 500px;'></textarea></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Gambar</div>
                            <div class='span9'> <input type='file' name='fupload'>
							<br>
							*) Jika gambar tidak diubah, dikosongkan saja.
							</div>
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
			}//penutup switch
}//penutup session
?>    
</body>
</html>