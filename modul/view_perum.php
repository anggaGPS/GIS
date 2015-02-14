<html>
<head>
<title>Telkom Consumer Service Division - View Perumahan</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
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
var namastox = new Array();
var kodestox = new Array();
var alamatstox = new Array();
var namarkx = new Array();
var alamatrkx = new Array();
var idstorkx = new Array();
var namadpx = new Array();
var alamatdpx = new Array();
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
        //kasihtanda(event.latLng);
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
	$("#tutup1").click(function(){
        $("#jendelainfo1").fadeOut();
    });
	$("#tutup2").click(function(){
        $("#jendelainfo2").fadeOut();
    });
	$("#tutup3").click(function(){
        $("#jendelainfo3").fadeOut();
    });
});

function set_icon(jenisnya){
    switch(jenisnya){
        case "home":
            gambar_tanda = 'icon/home.png';
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
        url = "ambildataperum.php?akhir=1";
    }else{
        url = "ambildataperum.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                namaperumx[i] = msg.wilayah.petak[i].nama;
				alamatx[i] = msg.wilayah.petak[i].alamat;
				kecx[i] = msg.wilayah.petak[i].kec;
                daerahx[i] = msg.wilayah.petak[i].daerah;
                jumlahx[i] = msg.wilayah.petak[i].jumlah;
                sudahx[i] = msg.wilayah.petak[i].sudah;

                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: 'icon/home.png'
                });
                setinfo(tanda,i);

            }
        }
    });
}


function ambildatasto(akhir){
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
				alamatstox[i] = msg.wilayah.petak[i].alamat;
				
                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: 'icon/telkom1.png'
                });
                setinfosto(tanda,i);
            }
        }
    });
}

function ambildatark(akhir){
    if(akhir=="akhir"){
        url = "ambildatark.php?akhir=1";
    }else{
        url = "ambildatark.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                namarkx[i] = msg.wilayah.petak[i].nama;
				alamatrkx[i] = msg.wilayah.petak[i].alamat;
				idstorkx[i] = msg.wilayah.petak[i].idsto;				
                
                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: 'icon/rk.png'
                });
                setinfork(tanda,i);
            }
        }
    });
}

function ambildatadp(akhir){
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
                setinfodp(tanda,i);
            }
        }
    });
}


function setjenis(jns){
    jenis = jns;
}

function setinfosto(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo1").fadeIn();
        $("#teksnama").html(namastox[nomor]);
        $("#teksalamatsto").html(alamatstox[nomor]);
		$("#tekskode").html(kodestox[nomor]);
        });
}

function setinfork(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo2").fadeIn();
        $("#teksnamark").html(namarkx[nomor]);
        $("#teksalamatrk").html(alamatrkx[nomor]);
		$("#teksidstork").html(idstorkx[nomor]);
        });
}

function setinfodp(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
       $("#jendelainfo3").fadeIn();
        $("#teksnamadp").html(namadpx[nomor]);
        $("#teksalamatdp").html(alamatdpx[nomor]);
		$("#tekskapasitas").html(kapasitasx[nomor]);
		$("#teksisi").html(isix[nomor]);
		$("#teksrusak").html(rusakx[nomor]);
		$("#tekswsucc").html(wsuccx[nomor]);
		$("#tekskosong").html(kosongx[nomor]);
	    $("#teksidrk").html(idrkx[nomor]);
    });
}

function setinfo(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksnama").html(namaperumx[nomor]);
        $("#teksalamat").html(alamatx[nomor]);
        $("#tekskec").html(kecx[nomor]);
		$("#teksdaerah").html(daerahx[nomor]);
		$("#teksjumlah").html(jumlahx[nomor]);
		$("#tekssudah").html(sudahx[nomor]);
	
    });
}
</script>
</head>
<body onLoad="peta_awal()">
<table id="jendelainfo" border=1 cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="300" height="136">
  <tr>
    <td><td width="248" bgcolor="#000000" height="19"><font color=white><span id="teksnama"></span></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a href="edit_perum.php" target="_blank" value="perum" onClick="set_icon(this.value)"><b><img src="edit16x16.png"></b></a></font></td>
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

<table id="jendelainfo1" border=1 cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="300" height="136">
  <tr>
    <td><td width="248" bgcolor="#000000" height="19"><font color=white><span id="teksnama"></span></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a href="edit_sto.html" target="_blank" value="sto" onClick="set_icon(this.value)"><b><img src="edit16x16.png"></b></a></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup1"><b>X</b></a></font></td>
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

<table id="jendelainfo2" border=1 cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="300" height="136">
  <tr>
    <td><td width="248" bgcolor="#000000" height="19"><font color=white><span id="teksnamark"></span></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a href="edit_rk.html" target="_blank" value="rk" onClick="set_icon(this.value)"><b><img src="edit16x16.png"></b></a></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup2"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Alamat : <span id="teksalamatrk"></span></td>
  </tr>
  <tr>
    <td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">STO : <span id="teksidstork"></span></td>
  </tr>
</table>

<table id="jendelainfo3" border=1 cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" width="300" height="136">
  <tr>
    <td><td width="248" bgcolor="#000000" height="19"><font color=white><span id="teksnamadp"></span></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a href="edit_dp.html" target="_blank" value="dp" onClick="set_icon(this.value)"><b><img src="edit16x16.png"></b></a></font></td>
    <td><td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup3"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td><td width="300" bgcolor="#FFCC00" height="19" valign="top" colspan="2"><p align="center">Alamat : <span id="teksalamatdp"></span></td>
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
                        <center><B>PETA TAMPILAN PERUMAHAN</B></center>
                    </ul>
                </div>
          <div class="clear">
          	<br>
          </div>
           <div id="petaku" style="width:auto; height:600px;" ></div>
          <p>Silakan Klik Menu Navigasi Di Bawah Ini Untuk Mengakses Tampilan Peta Perumahan Berdasarkan Kategori </p>
          
          <table width="798" height="30" border="0">
            <tr>
              <td width="284">
                
                 <button id="tombol_sto" value="sto" onClick="ambildatasto('awal')">Tampilkan STO</button>
               
             </td>
              <td width="248">
                
                 <button id="tombol_rk" value="rk" onClick="ambildatark('awal')">Tampilkan RK</button>
               
              </td>
              <td width="252">
                
                  <button id="tombol_dp" value="dp" onClick="ambildatadp('awal')">Tampilkan DP</button>
               
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