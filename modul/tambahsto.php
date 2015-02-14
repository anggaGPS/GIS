<html>
<head>
<title>Telkom Consumer Service Division - Tambah STO</title>
<link rel="stylesheet" type="text/css" href="style_perum.css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">
//inisialisasi variabel tampung
var peta;
var pertama = 0;
var jenis = "sto";
var namastox = new Array();
var kodestox = new Array();
var alamatx = new Array();
var kecx = new Array();
var daerahx = new Array();
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
		var kode = $("#kode").val();
		var alamat = $("#alamat").val();
		var kec = $("#kec").val();
		var daerah = $("#daerah").val();
		
        //var judul = $("#judul").val();
        //var des = $("#deskripsi").val();
		
        $("#loading").show();
        $.ajax({
            url: "simpansto.php",
            data: "x="+x+"&y="+y+"&nama="+nama+"&kode="+kode+"&alamat="+alamat+"&kec="+kec+"&daerah="+daerah,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
                $("#nama").val("");
                $("#kode").val("");
				$("#alamat").val("");
				$("#kec").val("");
                $("#daerah").val("");
                ambildatabase('akhir');
            }
        });
    });
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});
function kasihtanda(lokasi){
    set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: peta,
            icon: gambar_tanda
    });
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());

}

function set_icon(jenisnya){
    switch(jenisnya){
        case "sto":
            gambar_tanda = 'icon/telkom1.png';
            break;
        case "airport":
            gambar_tanda = 'icon/airport.png';
            break;
        case  "masjid":
            gambar_tanda = 'icon/mosque.png';
            break;
    }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildatasto.php?akhir=1";
    }else{
        url = "ambildatasto.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                namastox[i] = msg.wilayah.petak[i].nama;
                kodestox[i] = msg.wilayah.petak[i].kode;
				alamatx[i] = msg.wilayah.petak[i].alamat;
				kecx[i] = msg.wilayah.petak[i].kec;
                daerahx[i] = msg.wilayah.petak[i].daerah;

                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: 'icon/telkom1.png'
                });
                setinfo(tanda,i);

            }
        }
    });
}

function setjenis(jns){
    jenis = jns;
}

function setinfo(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksnama").html(namastox[nomor]);
        $("#teksalamat").html(alamatx[nomor]);
		$("#tekskode").html(kodestox[nomor]);
        $("#tekskec").html(kecx[nomor]);
		$("#teksdaerah").html(daerahx[nomor]);
    });
}
</script>
<style>
#jendelainfo{position:absolute;z-index:1000;top:100;
left:400;background-color:yellow;display:none;}
</style>
</head>
<body onLoad="peta_awal()">
<center>
<table id="jendelainfo" border=1 cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="300" height="136">
  <tr>
    <td><td width="248" bgcolor="#000000" height="19"><font color=white><span id="teksnama"></span></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Kode STO : <span id="tekskode"></span></td>
  </tr>
  <tr>
    <td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Alamat : <span id="teksalamat"></span></td>
  </tr>
  <tr>
  	<td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Kecamatan <span id="tekskec"></span></td>
  </tr>
  </table>

<div id="main_content">
		<div id="top_banner"></div>
        
  <div id="page_content">
                <div>
                    <ul class="menu">
                        <center>
                          <B>TAMBAH STO SECARA MANUAL INPUT</B>
                        </center>
                    </ul>
                </div>
          <div class="clear">
          	<br>
          </div>
           <div id="petaku" style="width:auto; height:600px;" ></div>
    <p>Silakan Isikan Data STO Yang Akan Ditambahkan dibawah ini :</p>
          
    <table width="798" height="30" border="0">
      <tr>
        <td><p><strong>LOKASI STO di KOTA BOGOR</strong></p></td>
      </tr>
    </table>
    <hr>
  <table width="560" border="0" align="center" cellpadding="3">
  <tr>
    <td width="158">Koordinat X (Lat)</td>
    <td width="8">:</td>
    <td width="368"><input type=text id=x size="60" maxlength="60"></td>
  </tr>
  <tr>
    <td>Koordinat Y (Long)</td>
    <td>:</td>
    <td><input type=text id=y size="60" maxlength="60"></td>
  </tr>
  <tr>
    <td>Nama STO</td>
    <td>:</td>
    <td><input type=text id="nama" size=60 maxlength="60"></td>
  </tr>
  <tr>
    <td>Kode STO</td>
    <td>:</td>
    <td><input type=text id="kode" size=60 maxlength="60"></td>
  </tr>
  <tr>
    <td>Alamat </td>
    <td>:</td>
    <td><input type=text id="alamat" size=60 maxlength="60"></td>
  </tr>
  <tr>
    <td>Kecamatan</td>
    <td>:</td>
    <td><select id='kec'>

<option value='1' SELECTED>Bogor Barat</option>

<option value='2' SELECTED>Bogor Selatan</option>

<option value='3' SELECTED>Bogor Tengah</option>

<option value='4' SELECTED>Bogor Timur</option>

<option value='5' SELECTED>Bogor Utara</option>

<option value='6' SELECTED>Tanah Sareal</option></select></td>
  </tr>
  <tr>
    <td>Daerah</td>
    <td>:</td>
    <td><input type=text id="daerah" value="Bogor" size=60></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
      
        <button id="tombol_simpan">Simpan Data</button>
      
    </td>
    </tr>
  </table>

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