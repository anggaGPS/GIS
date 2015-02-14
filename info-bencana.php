<?php
if(isset($_GET['mode'])=='delete'){
	 $id_info=$_GET['id_info'];
	 mysql_query("delete from tbl_informasi where id_info='$id_info'");
	 
	 ?><script language="javascript">document.location.href="?page=info-bencana"</script><?php
}
?>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">

var peta;
var pertama = 0;
var jenis = "banjir";
var judulx = new Array();
var desx = new Array();
var provx = new Array();
var bencanax = new Array();
var id_infox = new Array();

var korbanx = new Array();
var penyebabx = new Array();
var kerusakanx = new Array();
var bantuanx = new Array();
var pengungsix = new Array();
var tglx = new Array();

var koorx = new Array();
var koory = new Array();

var i;
var url;
var gambar_tanda;
function peta_awal(){
    var bandung = new google.maps.LatLng(-6.9171563, 107.6036539);
    var petaoption = {
        zoom:4,
        center: bandung,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtanda(event.latLng);
    });
    ambildatabase('awal');
	
	/*untuk tgl*/
	new JsDatePick({
		useMode:2,
		target:"tgl",
		dateFormat:"%Y-%m-%d"
	});
}

$(document).ready(function(){
    $("#tombol_simpan").click(function(){
        var x = $("#x").val();
        var y = $("#y").val();
		
        var judul = $("#judul").val();
        var des = $("#deskripsi").val();
		var id_info = $("#id_info").val();
		var id_prov = $("#id_prov").val();
		var id_bencana = $("#id_bencana").val();
		var korban = $("#korban").val();
		var penyebab = $("#penyebab").val();
		var kerusakan = $("#kerusakan").val();
		var bantuan = $("#bantuan").val();
		var pengungsi = $("#pengungsi").val();
		var tgl = $("#tgl").val();
		
        $("#loading").show();
        $.ajax({
            url: "simpanlokasi.php",
            data: "x="+x+"&y="+y+"&jenis="+jenis+"&id_info="+id_info+"&id_prov="+id_prov+"&id_bencana="+id_bencana+"&korban="+korban+"&penyebab="+penyebab+"&kerusakan="+kerusakan+"&bantuan="+bantuan+"&pengungsi="+pengungsi+"&tgl="+tgl,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
				$("#id_info").val("");
				$("#korban").val("");
				$("#penyebab").val("");
				$("#kerusakan").val("");
				$("#bantuan").val("");
				$("#pengungsi").val("");
				$("#tgl").val("");
                ambildatabase('akhir');
				document.location.href='?page=info-bencana';
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
        case "banjir":
            gambar_tanda = 'icon/banjir.png';
            break;
        case "gunung":
            gambar_tanda = 'icon/gunung.png';
            break;
        case  "gempa":
            gambar_tanda = 'icon/gempa.png';
            break;
		case  "kekeringan":
            gambar_tanda = 'icon/kekeringan.png';
            break;
		case  "kebakaran":
            gambar_tanda = 'icon/kebakaran.png';
            break;
		case  "tsunami":
            gambar_tanda = 'icon/tsunami.png';
            break;	
		case  "topan":
            gambar_tanda = 'icon/topan.png';
            break;	
    }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildata.php?akhir=1";
    }else{
        url = "ambildata.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
		
            for(i=0;i<msg.wilayah.petak.length;i++){
                judulx[i] = msg.wilayah.petak[i].judul;
                desx[i] = msg.wilayah.petak[i].deskripsi;
				provx[i] = msg.wilayah.petak[i].nama_prov;
				bencanax[i] = msg.wilayah.petak[i].nama_bencana;
				id_infox[i] = msg.wilayah.petak[i].id_info;
				korbanx[i] = msg.wilayah.petak[i].korban;
				penyebabx[i] = msg.wilayah.petak[i].penyebab;
				kerusakanx[i] = msg.wilayah.petak[i].kerusakan;
				bantuanx[i] = msg.wilayah.petak[i].bantuan;
				pengungsix[i] = msg.wilayah.petak[i].pengungsi;
					
				tglx[i] = msg.wilayah.petak[i].tgl;
				
				koorx[i] = msg.wilayah.petak[i].x;
				koory[i] = msg.wilayah.petak[i].y;
				
                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);
				var infowindow = new google.maps.InfoWindow({
                    content: "jauhh"
               });

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
        $("#teksjudul").html(judulx[nomor]);
        $("#teksdes").html(desx[nomor]);
		$("#teksprov").html(provx[nomor]);
		$("#teksbencana").html(bencanax[nomor]);
		$("#teksid_info").html(id_infox[nomor]);
		$("#tekskorban").html(korbanx[nomor]);
		$("#tekspenyebab").html(penyebabx[nomor]);
		$("#tekskerusakan").html(kerusakanx[nomor]);
		$("#teksbantuan").html(bantuanx[nomor]);
		$("#tekspengungsi").html(pengungsix[nomor]);
		$("#tekstgl").html(tglx[nomor]);
		
		$("#tekskoorx").html(koorx[nomor]);
		$("#tekskoory").html(koory[nomor]);
		 infowindow.open(map, marker);
    });
}
</script>


<style>
#jendelainfo{position:absolute;z-index:1000;top:100;
left:400;background-color:yellow;display:none;}
</style>
</head>
<body onload="peta_awal()">
<center>
<table id="jendelainfo" border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" height="140">
  <tr>
    <td width="248" bgcolor="#000000" height="19"><font color=white>ID Info : <span id="teksid_info"></span></font></td>
    <td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00" valign="top" colspan="2"> 
    Provinsi : <span id="teksprov"></span><br>
	Bencana : <span id="teksbencana"></span><br>
	Tanggal : <span id="tekstgl"></span><br>
	Korban : <span id="tekskorban"></span><br>
	Penyebab : <span id="tekspenyebab"></span><br>
	Kerusakan : <span id="tekskerusakan"></span><br>
	Bantuan : <span id="teksbantuan"></span><br>
	Pengungsi : <span id="tekspengungsi"></span><br>
	
	Koor X : <span id="tekskoorx"></span><br>
	Koor Y : <span id="tekskoory"></span><br>
	</td>
  </tr>
</table>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<table border=0>
<tr><td width="700">
<div id="petaku" style="width:550px; height:500px"></div>
</td>
<td width="80" valign=top>
Pilih Icon Bencana<p>

<input type=radio name=jenis value="gunung" onclick="setjenis(this.value)">
<img src="icon/gunung.png"> Gunung Meletus <br>
<input type=radio name=jenis value="gempa" onclick="setjenis(this.value)">
<img src="icon/gempa.png"> Gempa Bumi <br>
<input type=radio checked name=jenis value="banjir" onclick="setjenis(this.value)">
<img src="icon/banjir.png"> Banjir <br>
<input type=radio checked name=jenis value="banjir" onclick="setjenis(this.value)">
<img src="icon/kebakaran.png"> Kebakaran <br>
<input type=radio checked name=jenis value="kekeringan" onclick="setjenis(this.value)">
<img src="icon/kekeringan.png">Kekeringan <br>
<input type=radio checked name=jenis value="tsunami" onclick="setjenis(this.value)">
<img src="icon/tsunami.png"> Tsunami <br>
<input type=radio checked name=jenis value="topan" onclick="setjenis(this.value)">
<img src="icon/topan.png"> topan <br>

<p>
X : <input type=text id=x><br>
Y : <input type=text id=y><p>
ID Info :<br>
<input type=text id="id_info" placeholder="urutkan nomor bedasarkan jumlah bencana" size=30><p>
Provinsi : <br>
<select name="id_prov" id="id_prov">
<?php 
$query=mysql_query("select * from tbl_provinsi order by nama_prov asc");

while($row=mysql_fetch_array($query))
{
	?><option value="<?php  echo $row['id_prov']; ?>"><?php  echo $row['nama_prov']; ?></option><?php 
}
?>
</select>
<br><br>
Bencana : <br>
<select name="id_bencana" id="id_bencana">
<?php 
$query2=mysql_query("select * from tbl_bencana order by nama_bencana asc");

while($row2=mysql_fetch_array($query2))
{
	?><option value="<?php  echo $row2['id_bencana']; ?>"><?php  echo $row2['nama_bencana']; ?></option><?php 
}
?>
</select>
<br><br>
Korban :<br>
<input type=text name="korban" placeholder="Meninggal dan Luka-Luka "id="korban" size=30><p>
penyebab :<br>
<input type=text name="penyebab" id="penyebab" size=30><p>
Kerusakan : <br>
<input type=text name="kerusakan" placeholder="Total Kerugian (dalam Rp)" id="kerusakan" size=30><p>
Bantuan Dibutuhkan :<br>
<input type=text name="bantuan" id="bantuan" size=30><p>
Jumlah Pengungsi :<br>
<input type=text name="pengungsi" placeholder="Total Jumlah Pengungsi" id="pengungsi" size=30><p>
Tanggal : <br>
<input type="text" name="tgl" id="tgl" size="12">
<br><br>
<button id="tombol_simpan">Simpan</button>
<img src="ajax-loader.gif" style="display:none" id="loading">
</td>
</tr>
</table>

</body>
</html>


<br>
<?php
	$entries=11;
	$query=mysql_query("select * from view_informasi"); //input
	$get_pages=mysql_num_rows($query);
	
	if ($get_pages>$entries)  //proses
	{
		$jumlah_halaman=ceil($get_pages/$entries);
		$halaman_aktif=$_GET['id'];
		
		//untuk prev
		if(($halaman_aktif)>0){
			$prev=$halaman_aktif-1;
			?><a href="?page=info-bencana&id=<?php  echo $prev; ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"> &laquo;Prev&nbsp;&nbsp;</font></a><?php 
		}
		
		//echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries))
		{
			
			//untuk menandai halaman yang aktif
			if (($pages-1)==$halaman_aktif){
				$font="<font size='2' face='verdana' color='red'>";
			}else{
				$font="<font size='2' face='verdana' color='#009900'>";
			}
		?>
			
		<?php 
				$pages++;
		}
	}else{
		$pages=0;
	}
	$jumlah_halaman=10;
	//untuk next
	if($pages<$jumlah_halaman){
		$next=$pages+1;
		?>&nbsp;&nbsp;<a href="?page=info-bencana&id=<?php  echo $next; ?> " 
		style="text-decoration:none"><font size="2" face="verdana" color="#009900">Next&raquo;</font></a>
<?php 
	}
	
	//proses halaman
	$page=(int)$pages;
	$offset=$page*$entries;
	$result=mysql_query("select * from view_informasi order by id_info asc limit $offset,$entries"); //output
	$jumlah=mysql_num_rows($query);
	
	//akhir paging
	echo "</center>";

	if ($jumlah){
	?>

		<div style='overflow-y:scroll;overflow-x:scroll;width:720px;height:500px;padding:20px;scroll-color:hidden;'>
		<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
		<thead>
			<tr>
				<th><h3>Aksi</h3></th>
				<th><h3>ID Info</h3></th>
				<th><h3>Nama Provinsi</h3></th>
				<th><h3>Nama Bencana</h3></th>
				<th><h3>Tanggal</h3></th>
				<th><h3>Korban</h3></th>
				<th><h3>penyebab</h3></th>
				<th><h3>kerusakan</h3></th>
			
				<th><h3>Koord X</h3></th>
				<th><h3>Koord Y</h3></th>
			</tr>
		</thead>
		<tbody>
		 <?php
			$query=mysql_query("SELECT * FROM view_informasi");					

		
			while($row=mysql_fetch_assoc($result)){
				?>
				<tr>
					<td><img src="images/edit.png"> <a href="?page=info-bencana&mode=delete&id_info=<?php echo $row['id_info'];?>" onClick="return confirm('Apakah Anda Yakin?')"><img src="images/delete.png"></a></td>
					
					<td><?php echo $row['id_info'];?></td>
					<td><?php echo $row['nama_prov'];?></td>
					<td><?php echo $row['nama_bencana'];?></td>
					<td><?php echo $row['tgl'];?></td>
					<td><?php echo $row['korban'];?></td>
					<td><?php echo $row['penyebab'];?></td>
					<td><?php echo $row['kerusakan'];?></td>
					
					
					<td><?php echo $row['lat'];?></td>
					<td><?php echo $row['lng'];?></td>	
				</tr>
				<?php
			}
		?>
		</tbody>
		</table>
		</div>
		<center>Jumlah Data : <?php echo $jumlah;?></center>
		<script type="text/javascript" src="script.js"></script>
		<script type="text/javascript">
			var sorter = new TINY.table.sorter("sorter");
			sorter.head = "head";
			sorter.asc = "asc";
			sorter.desc = "desc";
			sorter.even = "evenrow";
			sorter.odd = "oddrow";
			sorter.evensel = "evenselected";
			sorter.oddsel = "oddselected";
			sorter.paginate = true;
			sorter.currentid = "currentpage";
			sorter.limitid = "pagelimit";
			sorter.init("table",0);
		</script>

<?php 	
}else{
	?><p><center><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></center><br /><?php 
}
?>