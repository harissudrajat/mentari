<hr/>
     <div role="main" class="container checkout">
        <div class="row">
          <div class="span9 checkout-list">
            <ol class="rr">
              <li class="current">
                <h6>Daftar Member Baru</h6>
                <div class="row">
                  <div class="span9 content-wrapper clearfix">
                    <div class="right-col">
                      <form action="simpanuser.php" method="post">
                       <ul class="rr">
                        <table border="0" width="700">
                          <tr><td valign="top">Nama Lengkap</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="nama" placeholder="Nama Lengkap ..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                          <tr><td valign="top">password</td>
                          <td>
                          <li>
                            <label>
                              <input type="password" name="password" placeholder="Password Anda..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                          <tr><td valign="top">Alamat Pengiriman</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="alamat" placeholder="Alamat Lengkap..." size="80" class="tbox"/><br>
                              *) Alamat pengiriman harus di isi lengkap, termasuk kota/kabupaten dan kode posnya.
                            </label>
                          </li>
                          </td>
                          </tr>
                          <tr><td valign="top">No. Hp</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="no_hp" placeholder="No. Hp..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                          <tr><td valign="top">Email</td>
                          <td>
                          <li>
                            <label>
                              <input type="text" name="email" placeholder="email..." size="50"/>
                            </label>
                          </li>
                          </td>
                          </tr>
                           <tr><td valign=top>Kota Tujuan</td><td> :  
                              <select name='kota'>
                              <option value=0 selected>- Pilih Kota -</option>
                              <?php
                              $tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
                              while($r=mysql_fetch_array($tampil)){
                                 echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
                              }
							  ?>
                          </select> <br /><br />*) Ongkos kirim dihitung berdasarkan kota tujuan</td></tr>
                                <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
                                <tr><td>&nbsp;</td><td>(Masukkan kode diatas)<br /><input type=text name=kode size=16 maxlength=6><br /></td></tr>
                           <tr><td></td><td>
                      
                          <input type="submit" class="btn secondary" value="Daftar">
                        </a>
                           </td></tr>

                          </table>
                        </ul>
                        
                        
                      
                      </form>
                    
                    </div>  
                  </div>                      
                </div>
              </li>
            </ol>
          </div>
        
        </div>
      </div>    
      
      