<html>
<head>
<?php include("koneksi.php");
include("class_paging.php");
?>
<title>Telkom Consumer Service Division - Edit Distribution Point</title>
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
    <p>Silakan Edit Data DP Berikut ini :</p><br>
    <div id="tengah">
    <?php
    $aksi="aksi_semua.php";
switch($_GET[act]){
  // Tampilkan DP pd tabel
  default:
    echo "<table border=1>
          <tr>
		  <th>No</th>
		  <th>Kode DP</th>
		  <th>Alamat</th>
		  <th>Kapasitas</th>
		  <th>Jml Isi</th>
		  <th>Jml Rusak</th>
		  <th>Jml WSUCC</th>
		  <th>Jml kosong</th>
		  <th>Latitude</th>
		  <th>Longitude</th>
		  <th>Aksi</th>
		  </tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM dp ORDER BY id_dp DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "
	  			<tr align=center>
				<td>$no</td>
                <td width=50>$r[kode_dp]</td>
                <td width=90>$r[alamat]</td>
                <td width=60>$r[kapasitas]</td>
				<td width=40>$r[jumlah_isi]</td>
                <td width=40>$r[jumlah_rusak]</td>
                <td width=40>$r[jumlah_wsucc]</td>
				<td width=40>$r[jumlah_kosong]</td>
				<td>$r[lat]</td>
				<td>$r[lng]</td>
                <td><a href=?jenis=dp&act=edit_dp&id=$r[id_dp]>Edit</a> | 
	                  <a href=$aksi?jenis=dp&act=hapus&id=$r[id_dp]>Hapus</a>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM dp"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	echo "<br /> <br />";
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break;
  
  case "edit_dp":
    $edit = mysql_query("SELECT * FROM dp WHERE id_dp='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Data DP</h2>
          <form method=POST action=$aksi?jenis=dp&act=edit_dp>
          <input type=hidden name=id value=$r[id_dp]>
          <table>
          <tr><td>Kode Dp</td><td>     : <input type=text name='kode_dp' size=30 value='$r[kode_dp]'></td></tr>
          <tr><td>Alamat</td><td>  : <input type=text name='alamat' size=30 value='$r[alamat]'></td></tr>
          <tr><td>Kapasitas</td><td>     : <input type=text name='kapasitas' size=30 value='$r[kapasitas]'></td></tr>
          <tr><td>Jumlah Isi</td><td>  : <input type=text name='jumlah_isi' size=30 value='$r[jumlah_isi]'></td></tr>
		  <tr><td>Jumlah Rusak</td><td>     : <input type=text name='jumlah_rusak' size=30 value='$r[jumlah_rusak]'></td></tr>
          <tr><td>Jumlah WSUCC</td><td>  : <input type=text name='jumlah_wsucc' size=30 value='$r[jumlah_wsucc]'></td></tr>
		  <tr><td>Jumlah Kosong</td><td>     : <input type=text name='jumlah_kosong' size=30 value='$r[jumlah_kosong]'></td></tr>
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