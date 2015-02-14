<html>
<head>
<?php include("koneksi.php");
include("class_paging.php");
?>
<title>Telkom Consumer Service Division - Edit STO</title>
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
    <p>Silakan Edit Data STO Berikut ini :</p><br>
    <div id="tengah4">
    <?php
    $aksi="aksi_sto.php";
switch($_GET[act]){
  // Tampilkan sto pd tabel
  default:
    echo "<table border=1>
          <tr>
		  <th>No</th>
		  <th>Kode STO</th>
		  <th>Nama STO</th>
		  <th>Alamat</th>
		  <th>ID</th>
		  <th>Daerah</th>
		  <th>Latitude</th>
		  <th>Longitude</th>
		  <th>Aksi</th>
		  </tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM sto ORDER BY id_sto DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "
	  			<tr align=center>
				<td>$no</td>
				<td width=70>$r[kode_sto]</td>
                <td width=70>$r[nama_sto]</td>
                <td width=90>$r[alamat]</td>
                <td width=40>$r[id]</td>
				<td width=70>$r[daerah]</td>
				<td>$r[lat]</td>
				<td>$r[lng]</td>
                <td><a href=?jenis=sto&act=edit_sto&id=$r[id_sto]>Edit</a> | 
	                  <a href=$aksi?jenis=sto&act=hapus&id=$r[id_sto]>Hapus</a>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM sto"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	echo "<br /> <br />";
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break;
  
  case "edit_sto":
    $edit = mysql_query("SELECT * FROM sto WHERE id_sto='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Data STO</h2>
          <form method=POST action=$aksi?jenis=sto&act=edit_sto>
          <input type=hidden name=id value=$r[id_sto]>
          <table>
		  <tr><td>Kode STO</td><td>     : <input type=text name='kode_sto' size=30 value='$r[kode_sto]'></td></tr>
          <tr><td>Nama STO</td><td>     : <input type=text name='nama_sto' size=30 value='$r[nama_sto]'></td></tr>
          <tr><td>Alamat</td><td>  : <input type=text name='alamat' size=30 value='$r[alamat]'></td></tr>
          <tr><td>ID</td><td>     : <input type=text name='id' size=30 value='$r[id]'></td></tr>
		  <tr><td>Daerah</td><td>  : <input type=text name='daerah' size=30 value='$r[daerah]'></td></tr>
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