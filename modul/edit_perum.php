<?php session_start();
$nama=$_SESSION['teksnama'];
$alamat=$_SESSION['teksalamat'];
$kec=$_SESSION['tekskec'];  
$jumlah=$_SESSION['teksjumlah']; 
$sudah=$_SESSION['tekssudah'];  
?>

<html>
<title>Firmansyah Wahyudiarto & Lida Pratiwi Puteri - GIS</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="../dss/jquery-1.4.3.min.js"></script>
<script type="text/javascript">
//inisialisasi variabel tampung
var peta;
var pertama = 0;
var jenis = "home";
var namaperumx = new Array();
var alamatx = new Array();
var kecx = new Array();
var daerahx = new Array();
var jumlahx = new Array();
var sudahx = new Array();
var i;
var url;
var gambar_tanda;
//load peta google maps
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
    });
    ambildatabase('awal');
}

$(document).ready(function(){
    $("#tombol_simpan").click(function(){
        var x = $("#x").val();
        var y = $("#y").val();
		var nama = $("#nama").val();
		var alamat = $("#alamat").val();
		var kec = $("#kec").val();
		var daerah = $("#daerah").val();
		var jumlah = $("#jumlah").val();
		var sudah = $("#sudah").val();
		
		
        $("#loading").show();
        $.ajax({
            url: "simpanperum.php",
            data: "x="+x+"&y="+y+"&nama="+nama+"&alamat="+alamat+"&kec="+kec+"&daerah="+daerah+"&jumlah="+jumlah+"&sudah="+sudah,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
                $("#nama").val("");
				$("#alamat").val("");
				$("#kec").val("");
                $("#daerah").val("");
                $("#jumlah").val("");
                $("#sudah").val("");
                ambildatabase('akhir');
            }
        });
    });
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});
</script>
<style>
#jendelainfo{position:absolute;z-index:1000;top:100;
left:400;background-color:yellow;display:none;}
</style>
</head>
<body onLoad="peta_awal()">
<center>
<h1>Lokasi Perumahan di Kota Bogor</h1>
<table id="jendelainfo" border=1 cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="300" height="136">
  <tr>
    <td><td width="248" bgcolor="#000000" height="19"><font color=white><span id="teksnama"></span></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Alamat : <span id="teksalamat"></span></td>
  </tr>
  <tr>
  	<td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Kecamatan <span id="tekskec"></span></td>
  </tr>
  <tr>
    <td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Jumlah Dibangun : <span id="teksjumlah"></span></td>
  </tr>
  <tr>
    <td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Sudah Dibangun :<span id="tekssudah"></span></td>
  </tr>
</table>

<?php 
if (!(isset($tes))) { ?>
<table width="1024px" border="0" align="center" >
<?php } ?>
<div align="center">
  <table width="570" height="131" border="0" cellpadding="2" cellspacing="1" align="center">
     <tr>
      <td><fieldset>
      <legend><strong>Perumahan</strong></legend>
      <table>
<tr>
<form name="form1" method="post" action="../dss/tambahperum.html">
<td valign=top>
<p>
X : <input type=text id=x><br>
Y : <input type=text id=y><p>
Nama :<br>
<input name="nama" type="text" id="nama" value="<?php echo $nama; ?>"><p>
Alamat :<br>
<textarea cols=20 rows=8 id="alamat" value="<?php echo $alamat; ?>"></textarea><p>
Kecamatan:<br>
<select id='kec'>
<option value='1' SELECTED>Bogor Barat</option>
<option value='2' SELECTED>Bogor Selatan</option>
<option value='3' SELECTED>Bogor Tengah</option>
<option value='4' SELECTED>Bogor Timur</option>
<option value='5' SELECTED>Bogor Utara</option>
<option value='6' SELECTED>Tanah Sareal</option></select><p>
Daerah:<br>
<input type=text id="daerah" value="Bogor" size=30>
<p>Jumlah Dibangun:<br>
    <input type=text id="jumlah" size=30 value="<?php echo $jumlah; ?>">
  <p>Sudah Dibangun:<br>
      <input type=text id="sudah" size=30 value="<?php echo $sudah; ?>">
    
  <p>
<button id="tombol_simpan">Update</button>
<img src="../dss/ajax-loader.gif" style="display:none" id="loading">
</td>


</tr>
  </table>
</body>
</html>
