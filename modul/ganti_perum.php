<?php
include "koneksi.php";

$nama=$_POST['teksnama'];
$alamat=$_POST['teksalamat'];
$kec=$_POST['tekskec'];  
$jumlah=$_POST['teksjumlah']; 
$sudah=$_POST['tekssudah']; 

if(trim($nama) == "") {
	echo "<center><h2><br><br><br><br><br><br><br><br><br>nama masih kosong, tolong diisi";
	echo "<meta http-equiv='refresh' content='1; url=tambahperum.html'>";
}
else if (trim($alamat) == "") {
	echo "<center><h2><br><br><br><br><br><br><br><br><br>alamat masih kosong, tolong diisi";
	echo "<meta http-equiv='refresh' content='1; url=tambahperum.html'>";
}
else if (trim($kec) == "") {
	echo "<center><h2><br><br><br><br><br><br><br><br><br>kecamatan masih kosong, tolong diisi";
	echo "<meta http-equiv='refresh' content='1; url=tambahperum.html'>";
}
else {
	$sqlSimpan = "UPDATE login SET
					nama_perum='$nama', alamat='$alamat', id='$kec',
					jumlah_dibangun='$jumlah', sudah_dibangun='$sudah'
					where nama_perum='$nama'"; 
	mysql_query($sqlSimpan, $koneksi) 
				or die ("Gagal Perintah SQL". mysql_error());
	
	echo "<center><h2><br><br><br><br><br><br><br><br><br>Save Success</center>";
	echo "<meta http-equiv='refresh' content='1; url=index.php'>";
}
?>
	<br /><center><img width="70" src="./dss/img/loading.gif"></center>