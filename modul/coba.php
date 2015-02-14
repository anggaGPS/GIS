<?php session_start();
include("koneksi.php");?>

<head>
<title>Firmansyah Wahyudiarto & Lida Pratiwi Puteri - GIS</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="../dss/jquery-1.4.3.min.js"></script>
<script type="text/javascript">
var peta;
var pertama = 0;
var jenis = "rk";
var namarkx = new Array();
var alamatx = new Array();
var kecx = new Array();
var daerahx = new Array();
var jumlahx = new Array();
var sudahx = new Array();
var i;
var url;
var gambar_tanda;

function peta_awal(){
    var bogor = new google.maps.LatLng(-6.589155,106.793032);
    var petaoption = {
        zoom: 14,
        center: bogor,
        mapTypeId: google.maps.MapTypeId.SATELLITE
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtanda(event.latLng);
    };
    ambildatabase('awal');
}
</script>

</head>

<body>
<center><h1>Lokasi Rumah Kabel di Kota Bogor</h1></center>

<table id="jendelainfo" border="1" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="300" height="136">
  <tr>
    <td width="248" bgcolor="#000000" height="19"><font color=white><span id="teksnama"></span></font></td>
    <td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td width="290" bgcolor="#FFCC00" height="100" valign="top" colspan="2">
    <p align="center"><span id="teksalamat"></span></td>
    
  </tr>
</table>
<table border=0 width=1000>
<tr><td>
<div id="petaku" style="width:700px; height:500px"></div>
</td>
<td valign=top>
<form method="post" action="coba.php">
<p>
X : <input type=text id=x><br>
Y : <input type=text id=y><p>
Nama Rumah Kabel:<br>
<input type=text id="nama" size=30><p>
STO :
<?php $hasil = mysql_query("select * from sto"); ?>
<select name='kode_sto'>
<?php while($row=mysql_fetch_array($hasil))?>
<option value="<?php echo "$row[kode_sto]";?>"> <?php echo "$row[kode_sto]";?></option>
       </select>
<label></label>
<p>Kecamatan:<br>
    <select id='kec'>
      <option value='1' SELECTED>Bogor Barat</option>
      <option value='2' SELECTED>Bogor Selatan</option>
      <option value='3' SELECTED>Bogor Tengah</option>
      <option value='4' SELECTED>Bogor Timur</option>
      <option value='5' SELECTED>Bogor Utara</option>
      <option value='6' SELECTED>Tanah Sareal</option>
    </select></br></p>

<p>
Daerah:<br>
<input type=text id="daerah" value="Bogor" size=30></br></p>
<p>Jumlah Dibangun:<br>
    <input type=text id="jumlah" size=30></br></p>
  <p>Sudah Dibangun:<br>
      <input type=text id="sudah" size=30></br></p>
    
  <p>
<button id="tombol_simpan">Simpan</button>
<img src="../dss/ajax-loader.gif" style="display:none" id="loading"></p>
</form>

</td>
</tr>
</table>
</body>
</html>