

<script type="text/javascript">
	$(function () {
		var chart;
		$(document).ready(function() {
			chart = new Highcharts.Chart({
				chart: {
					renderTo: 'container',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: 'Diagram Info Bencana'
				},
				tooltip: {
					formatter: function() {
						return '<b>'+
				this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ('+ this.y +' Kejadian)';
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: '#000000',
							formatter: function() {
								return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
							}
						}
					}
				},
				series: [{
				   type: 'pie',
					name: 'Browser share',
					data: [
					
					<?php 
						$query=mysql_query("SELECT distinct(nama_bencana) FROM view_informasi");					
	
						while($row=mysql_fetch_assoc($query)){
							 $nama     = $row['nama_bencana'];
							 
							 $data = mysql_fetch_array(mysql_query("SELECT count(id_info) as jumlah FROM view_informasi where nama_bencana='$nama'"));
							 $jumlah = $data['jumlah'];
							?>['<?php echo $nama?>',   <?php echo $jumlah;?>],<?php
						}
					?>
					
					]
				}]
			});
		});
		
	});
	</script>
	
	<div id="container" style="min-width: 350px; height: 350px; margin: 0 auto"></div>
	
	<br><br>
	<h2 align="center"><font color="#666666">Tabel Info Bencana</font></h2>
	
	<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
		<thead>
			<tr>
				
				<th><h3>Nama Bencana</h3></th>
				<th><h3>Jumlah Kejadian</h3></th>
			</tr>
		</thead>
		<tbody>
		 <?php
			$query=mysql_query("SELECT distinct(nama_bencana) FROM view_informasi");					
	
			while($row=mysql_fetch_assoc($query)){
				 $nama = $row['nama_bencana'];
	
				 $data = mysql_fetch_array(mysql_query("SELECT count(id_info) as jumlah FROM view_informasi where nama_bencana='$nama'"));
				 $jumlah = $data['jumlah']; 
				 ?>
				 
				<tr>
					
					
					<td><?php echo $nama;?></td>
					<td><?php echo $jumlah;?></td>
				</tr>
				<?php
			}
		?>
		</tbody>
	</table>
	
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
	//Gunakan Koneksi
	include("koneksi.php");
	//Buat array bobot { C1 = 35%; C2 = 25%; C3 = 25%; dan C4 = 15%.}
	$bobot = array(1, 0.67, 0.33, 0);

	//Buat fungsi tampilkan nama
	function getNama($id){
		$q =mysql_query("SELECT * FROm tbl_informasi where id_info = '$id'");
		$d = mysql_fetch_array($q);
		return $d['id_info'];
		
	}
	function getPenyebab($penyebab){
	$x =mysql_query("SELECT * FROm tbl_informasi where penyebab = '$penyebab'");
		$y = mysql_fetch_array($x);
		return $y['penyebab'];
		
	}
	function getId_prov($id_prov){
	$x =mysql_query("SELECT * FROm tbl_informasi where id_prov = '$id_prov'");
		$y = mysql_fetch_array($x);
		return $y['id_prov'];
		
	}
	function getId_bencana($id_bencana){
	$x =mysql_query("SELECT * FROm tbl_informasi where id_bencana = '$id_bencana'");
		$y = mysql_fetch_array($x);
		return $y['id_bencana'];
		
	}
	function getJenis($jenis){
	$x =mysql_query("SELECT * FROm tbl_informasi where jenis = '$jenis'");
		$y = mysql_fetch_array($x);
		return $y['jenis'];
		
	}
	
	//Setelah bobot terbuat select semua di tabel Matrik
	$sql = mysql_query("SELECT * FROM tbl_informasi");
	//Buat tabel untuk menampilkan hasil
	echo "
	<table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
			";
	$no = 1;
	while ($dt = mysql_fetch_array($sql)) {
		"<tr>
			<td>$no</td><td>".getId_prov($dt['id_prov'])."</td><td>".getId_bencana($dt['id_bencana'])."</td><td>".getNama($dt['id_info'])."</td><td>".getPenyebab($dt['penyebab']).
			"</td><td>$dt[id_bencana]</td><td>$dt[kerusakan]</td><td>$dt[id_bencana]</td><td>$dt[pengungsi]</td>
		</tr>";
	$no++;
	}
echo "</table>";
	//Lakukan Normalisasi dengan rumus pada langkah 2
	//Cari Max atau min dari tiap kolom Matrik
	$crMax = mysql_query("SELECT max(id_bencana) as maxK1, 
						max(kerusakan) as maxK2,
						max(id_bencana) as maxK3,
						max(pengungsi) as maxK4 
			FROM tbl_informasi");
	$max = mysql_fetch_array($crMax);
	//Hitung Normalisasi tiap Elemen
	$sql2 = mysql_query("SELECT * FROM tbl_informasi");
	//Buat tabel untuk menampilkan hasil
	echo "
	<table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
		";
		
	$no = 1;
	while ($dt2 = mysql_fetch_array($sql2)) {
		 "<tr>
			<td>$no</td><td>".getId_prov($dt2['id_prov'])."</td><td>".getId_bencana($dt2['id_bencana'])."</td><td>".getNama($dt2['id_info'])."</td><td>".round($dt2['id_bencana']/$max['maxK1'],2)."</td><td>".round($dt2['kerusakan']/$max['maxK2'],2).
			"</td><td>".round($dt2['id_bencana']/$max['maxK3'],2)."</td><td>".round($dt2['pengungsi']/$max['maxK4'],2)."</td>
		</tr>";
	$no++;
	}
echo "</table>";
	//Proses perangkingan dengan rumus langkah 3
	$sql3 = mysql_query("SELECT * FROM tbl_informasi");
	//Buat tabel untuk menampilkan hasil
	echo " <center><H3>Sistem Pendukung Keputusan Metode SAW</H3>
	<table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
		<tr>
			<td>No</td><td>id provinsi</td><td>id bencana</td><td>id info</td><td>jenis</td><td>Rangking</td>
		</tr> </center>
		";
	$no = 1;
	//Kita gunakan rumus (Normalisasi x bobot)
	while ($dt3 = mysql_fetch_array($sql3)) {

		echo "<tr>
			<td>$no</td><td><a href='http://localhost/google-gis-ri32/dashboard.php?page=peta26/".getId_prov($dt3['id_prov'])."'>".getId_prov($dt3['id_prov'])."</a></td><td>".getId_bencana($dt3['id_bencana'])."</td><td>".getNama($dt3['id_info'])."</td><td>".getJenis($dt3['jenis'])."</td>
			<td>"
			.round((($dt3['id_bencana']/$max['maxK1'])*$bobot[0])+
			(($dt3['kerusakan']/$max['maxK2'])*$bobot[1])+
			(($dt3['id_bencana']/$max['maxK3'])*$bobot[2])+
			(($dt3['pengungsi']/$max['maxK4'])*$bobot[3]),2)
			.
			"</td>		
		</tr>";
	$no++;
	
	}
	echo "</table>";
echo " pilih urutan 3 paling bawah atau 3 ranking paling tinggi";
?>
echo "<td><a href='http://localhost/contoh/".$row['nama']."'>".$row['nama']."</a></td>";
echo "<td><a href='alamat linknya'>".$row['nama']."</a></td>";


		