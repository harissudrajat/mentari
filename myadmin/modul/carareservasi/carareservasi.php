<div class="content">
  <div class="workplace">
     
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Cara Reservasi</h1>
                    </div>
                    <?php
					echo "<form method='post' action='modul/carareservasi/aksicarareservasi.php'>";
					 $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='1'");
    				 $r    = mysql_fetch_array($sql);
				  echo "<input type=hidden name=id value=$r[id_modul]>";
                    
                  echo"<div class='row-fluid' id='wysiwyg_container'>
                        <textarea id='wysiwyg' name='isi' style='height: 250px;width: 525px;'>$r[konten]</textarea>
                     </div>";  //450px
				  echo "";
				  
					?>
                </div>
            </div>
       
       <div class="span9">
         <p>
             <input class="btn" type="submit" value="  Ubah  ">
         </p>
       </div>
      </form>
    </div>
	
	
</div>   
    