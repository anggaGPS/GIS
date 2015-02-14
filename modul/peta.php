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

var koorx = new Array();
var koory = new Array();

var i;
var url;
var gambar_tanda;
function peta_awal(){
    var jakarta = new google.maps.LatLng(-6.237281, 106.332724);
    var petaoption = {
        zoom: 6,
        center: jakarta,
        mapTypeId: google.maps.MapTypeId.ROADMAP
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
        var judul = $("#judul").val();
        var des = $("#deskripsi").val();
		
		var id_info = $("#id_info").val();
		var id_prov = $("#id_prov").val();
		var id_bencana = $("#id_bencana").val();
		
		var korban = $("#korban").val();
		var penyebab = $("#penyebab").val();
		
        $("#loading").show();
        $.ajax({
            url: "simpanlokasi.php",
            data: "x="+x+"&y="+y+"&jenis="+jenis+"&id_info="+id_info+"&id_prov="+id_prov+"&id_bencana="+id_bencana+"&korban="+korban+"&penyebab="+penyebab,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
				$("#id_info").val("");
				$("#korban").val("");
				$("#penyebab").val("");
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
        case "banjir":
            gambar_tanda = 'icon/banjir.png';
            break;
        case "gunung":
            gambar_tanda = 'icon/gunung.png';
            break;
        case  "gempa":
            gambar_tanda = 'icon/gempa.png';
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
		
		$("#tekskoorx").html(koorx[nomor]);
		$("#tekskoory").html(koory[nomor]);
    });
}
</script>
<style>
#jendelainfo{position:absolute;z-index:1000;top:100;
left:400;background-color:yellow;display:none;}
</style>
</head>
<body onload="peta_awal()">

<table id="jendelainfo" border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" height="136">
  <tr>
    <td width="248" bgcolor="#000000" height="19"><font color=white>ID Info : <span id="teksid_info"></span></font></td>
    <td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00" valign="top" colspan="2"> 
    Provinsi : <span id="teksprov"></span><br>
	Bencana : <span id="teksbencana"></span><br>
	Korban : <span id="tekskorban"></span><br>
	Penyebab : <span id="tekspenyebab"></span><br>
	
	Koor X : <span id="tekskoorx"></span><br>
	Koor Y : <span id="tekskoory"></span><br>
	</td>
  </tr>
</table>

<table border=0>
<tr>
<td width="700">
<div id="petaku" style="width:750px; height:500px"></div>
</td>
</tr>
</table>

<br>
<center>
<?php
	$entries=10;
	$query=mysql_query("select * from view_informasi"); //input
	$get_pages=mysql_num_rows($query);
	
	if ($get_pages>$entries)  //proses
	{
		$jumlah_halaman=ceil($get_pages/$entries);
		$halaman_aktif=$_GET['id'];
		
		//untuk prev
		if(($halaman_aktif)>0){
			$prev=$halaman_aktif-1;
			?><a href="?page=peta&id=<?php  echo $prev; ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"> &laquo;Prev&nbsp;&nbsp;</font></a><?php 
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
	
	//untuk next
	if($halaman_aktif<$jumlah_halaman){
		$next=$halaman_aktif+1;
		?>&nbsp;&nbsp;<a href="?page=peta&id=<?php  echo $next; ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900">Next&raquo;</font></a><?php 
	}
	
	//proses halaman
	$page=(int)$_GET['id'];
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
				<th><h3>Nomor</h3></th>
				<th><h3>ID Bencana</h3></th>
				<th><h3>Nama Provinsi</h3></th>
				<th><h3>Nama Bencana</h3></th>
				<th><h3>Korban</h3></th>
				<th><h3>penyebab</h3></th>
				<th><h3>Koord X</h3></th>
				<th><h3>Koord Y</h3></th>
			</tr>
		</thead>
		<tbody>
		 <?php
			//$query=mysql_query("SELECT * FROM view_informasi");					

		
			while($row=mysql_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $d=$d+1;?></td>
					<td><?php echo $row['id_info'];?></td>
					<td><?php echo $row['nama_prov'];?></td>
					<td><?php echo $row['nama_bencana'];?></td>
					<td><?php echo $row['korban'];?></td>
					<td><?php echo $row['penyebab'];?></td>
					<td><?php echo $row['lat'];?></td>
					<td><?php echo $row['lng'];?></td>
				</tr>
				<?php
			}
			echo $x;
			echo $y;
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

</body>
</html>

