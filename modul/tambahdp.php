<html>
<head>
<?php include("koneksi.php");?>
<title>Telkom Consumer Service Division - Tambah Distribution Point</title>
<link rel="stylesheet" type="text/css" href="style_perum.css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">
//inisialisasi variabel tampung
var peta;
var pertama = 0;
var jenis = "dp";
var namadpx = new Array();
var alamatx = new Array();
var kapasitasx = new Array();
var isix = new Array();
var rusakx = new Array();
var wsuccx = new Array();
var kosongx = new Array();
var idrkx = new Array();
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
		var kapasitas = $("#kapasitas").val();
		var isi = $("#isi").val();
		var rusak = $("#rusak").val();
		var wsucc = $("#wsucc").val();
		var kosong = $("#kosong").val();
		var idrk = $("#idrk").val();
				
        $("#loading").show();
        $.ajax({
            url: "simpan_dp.php",
            data: "x="+x+"&y="+y+"&nama="+nama+"&alamat="+alamat+"&kapasitas="+kapasitas+"&isi="+isi+"&rusak="+rusak+
			"&wsucc="+wsucc+"&kosong="+kosong+"&idrk="+idrk,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
                $("#nama").val("");
				$("#alamat").val("");
				$("#kapasitas").val("");
				$("#isi").val("");
				$("#rusak").val("");
				$("#wsucc").val("");
				$("#kosong").val("");
				$("#idrk").val("");
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
        case "dp":
            gambar_tanda = 'icon/dp.png';
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
        url = "ambildatadp.php?akhir=1";
    }else{
        url = "ambildatadp.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                namadpx[i] = msg.wilayah.petak[i].nama;
				alamatx[i] = msg.wilayah.petak[i].alamat;
				kapasitasx[i] = msg.wilayah.petak[i].kapasitas;
				isix[i] = msg.wilayah.petak[i].isi;
				rusakx[i] = msg.wilayah.petak[i].rusak;
				wsuccx[i] = msg.wilayah.petak[i].wsucc;
				kosongx[i] = msg.wilayah.petak[i].kosong;
				idrkx[i] = msg.wilayah.petak[i].idrk;				
                
                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: 'icon/dp.png'
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
        $("#teksnama").html(namadpx[nomor]);
        $("#teksalamat").html(alamatx[nomor]);
		$("#tekskapasitas").html(kapasitasx[nomor]);
		$("#teksisi").html(isix[nomor]);
		$("#teksrusak").html(rusakx[nomor]);
		$("#tekswsucc").html(wsuccx[nomor]);
		$("#tekskosong").html(kosongx[nomor]);
	    $("#teksidrk").html(idrkx[nomor]);
    });
}
</script>
<style>
#jendelainfo{position:absolute;z-index:1000;top:100;
left:400;background-color:yellow;display:none;}
</style>
</head>
<body>
<body onLoad="peta_awal()">

<center><h1>Lokasi Distribution Point di Kota Bogor</h1></center>

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
  	<td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Kapasitas : <span id="tekskapasitas"></span></td>
  </tr>
  <tr>
  	<td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Isi : <span id="teksisi"></span></td>
  </tr>
  <tr>
  	<td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Rusak : <span id="teksrusak"></span></td>
  </tr>
  <tr>
  	<td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">WSUCC : <span id="tekswsucc"></span></td>
  </tr>
  <tr>
  	<td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Kosong : <span id="tekskosong"></span></td>
  </tr>
  <tr>
  	<td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">RK : <span id="teksidrk"></span></td>
  </tr>
</table>

<div id="main_content">
		<div id="top_banner"></div>
        
  <div id="page_content">
                <div>
                    <ul class="menu">
                        <center>
                          <B>TAMBAH DISTRIBUTION POINT SECARA MANUAL INPUT</B>
                        </center>
                    </ul>
                </div>
          <div class="clear">
          	<br>
          </div>
           <div id="petaku" style="width:auto; height:600px;" ></div>
    <p>Silakan Isikan Data Distribution Point Yang Akan Ditambahkan dibawah ini :</p>
          
    <table width="798" height="30" border="0">
      <tr>
        <td><p><strong>LOKASI DISTRIBUTION POINT di KOTA BOGOR</strong></p></td>
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
    <td>Nama Distribution Point</td>
    <td>:</td>
    <td><input type=text id="nama" size=60 maxlength="60"></td>
  </tr>
  <tr>
    <td>Alamat </td>
    <td>:</td>
    <td><input type=text id="alamat" size=60 maxlength="60"></td>
  </tr>
  <tr>
    <td>Kapasitas</td>
    <td>:</td>
    <td><input type=text id="kapasitas" size=30></td>
  </tr>
  <tr>
    <td>Jumlah Terisi</td>
    <td>:</td>
    <td><input type=text id="isi" size=30></td>
  </tr>
  <tr>
    <td>Jumlah Rusak</td>
    <td>:</td>
    <td><input type=text id="rusak" size=30></td>
  </tr>
  <tr>
    <td>Jumlah WSUCC</td>
    <td>:</td>
    <td><input type=text id="wsucc" size=30></td>
  </tr>
  <tr>
    <td>Jumlah Kosong</td>
    <td>:</td>
    <td><input type=text id="kosong" size=30></td>
  </tr>
  <tr>
    <td>Rumah Kabel</td>
    <td>:</td>
    <td><?php $hasil2 = mysql_query("select * from rk"); ?>
        <select name="idrk" id=idrk>
        <?php while($row=mysql_fetch_array($hasil2)){?>
        <option value='<?php echo "$row[id_rk]";?>'><?php echo "$row[nama_rk]"; ?></option>
		<?php } ?>
      </select></td>
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