<html>
<head>
<?php include("koneksi.php");
include("class_paging.php");
?>
<title>Telkom Consumer Service Division - Edit Perumahan</title>
<link rel="stylesheet" type="text/css" href="style_edit2.css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>

<div id="main_content">
		<div id="top_banner"></div>
        
  <div id="page_content">
                <div>
                    <ul class="menu">
                    </ul>
                </div>
          <div class="clear">
          	<br>
          </div>
    <p>Silakan Edit Data Perumahan Berikut ini :</p><br>
    <div id="tengah3">
    <?php
    $aksi="aksi_perum.php";
switch($_GET[act]){
  // Tampilkan Perum pd tabel
  default:
    echo "<table border=1>
          <tr>
		  <th>No</th>
		  <th>Nama Perum</th>
		  <th>Alamat</th>
		  <th>Daerah</th>
		  <th>Jml Dibangun</th>
		  <th>Sudah Dibangun</th>
		  <th>Latitude</th>
		  <th>Longitude</th>
		  <th>Aksi</th>
		  </tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM perumahan ORDER BY id_perumahan DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "
	  			<tr align=center>
				<td>$no</td>
                <td width=70>$r[nama_perum]</td>
                <td width=90>$r[alamat]</td>
                <td width=40>$r[daerah]</td>
				<td width=40>$r[jumlah_dibangun]</td>
                <td width=40>$r[sudah_dibangun]</td>
				<td>$r[lat]</td>
				<td>$r[lng]</td>
                <td><a href=?jenis=perum&act=edit_perum&id=$r[id_perumahan]>Edit</a> | 
	                  <a href=$aksi?jenis=perum&act=hapus&id=$r[id_perumahan]>Hapus</a>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM perumahan"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	echo "<br /> <br />";
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break;
  
  case "edit_perum":
    $edit = mysql_query("SELECT * FROM perumahan WHERE id_perumahan='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Data Perumahan</h2>
          <form method=POST action=$aksi?jenis=perum&act=edit_perum>
          <input type=hidden name=id value=$r[id_perumahan]>
          <table>
          <tr><td>Nama Perumahan</td><td>     : <input type=text name='nama_perum' size=30 value='$r[nama_perum]'></td></tr>
          <tr><td>Alamat</td><td>  : <input type=text name='alamat' size=30 value='$r[alamat]'></td></tr>
          <tr><td>Daerah</td><td>     : <input type=text name='daerah' size=30 value='$r[daerah]'></td></tr>
          <tr><td>Jumlah Dibangun</td><td>  : <input type=text name='jumlah_dibangun' size=30 value='$r[jumlah_dibangun]'></td></tr>
		  <tr><td>Sudah Dibangun</td><td>     : <input type=text name='sudah_dibangun' size=30 value='$r[sudah_dibangun]'></td></tr>
		  <tr><td>Latitude</td><td>     : <input type=text name='lat' size=30 value='$r[lat]'></td></tr>
		  <tr><td>Longitude</td><td>     : <input type=text name='lng' size=30 value='$r[lng]'></td></tr>";

    echo "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
		  </form>";
    break;  
}
?>
<br>
<a href="../halaman_utama.php">Kembali</a>
    </div>
  </div>
<div id="footer">
		<div class="footer_links">
                 <a href="#" title="">Copyright &copy; 2011 by Firmansyah Wahyudiarto & Lida Pratiwi Puteri</a><a href="#" title=""></a>       
        </div>
    	<div class="copyright"></div>
</div>



	
</div>

</body>
</html>