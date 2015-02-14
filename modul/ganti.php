<?php
include "koneksi.php";

$nama=$_POST['teksnama'];
$alamat=$_POST['teksalamat'];
$kec=$_POST['tekskec'];  
$jumlah=$_POST['teksjumlah']; 
$sudah=$_POST['tekssudah']; 

if(trim($nim) == "") {
	echo "<center><h2><br><br><br><br><br><br><br><br><br>NIM masih kosong, tolong diisi";
	echo "<meta http-equiv='refresh' content='1; url=register.php'>";
}
else if (trim($pass) == "") {
	echo "<center><h2><br><br><br><br><br><br><br><br><br>Password masih kosong, tolong diisi";
	echo "<meta http-equiv='refresh' content='1; url=register.php'>";
}
else if (trim($nama) == "") {
	echo "<center><h2><br><br><br><br><br><br><br><br><br>Nama masih kosong, tolong diisi";
	echo "<meta http-equiv='refresh' content='1; url=register.php'>";
}
else {
	$sqlSimpan = "UPDATE login SET
					password='$pass', nama_lengkap='$nama', nama_panggilan='$nick',
					tempat_lahir='$tempat', tanggal_lahir='$tanggal',
					jenis_kelamin='$gender', alamat='$alamat', 			telp='$telp',
					email='$email', agama='$agama'
					where nim='$nim'"; 
	mysql_query($sqlSimpan, $koneksi) 
				or die ("Gagal Perintah SQL". mysql_error());
	
	echo "<center><h2><br><br><br><br><br><br><br><br><br>Save Success</center>";
	echo "<meta http-equiv='refresh' content='1; url=index.php'>";
}
?>
	<br /><center><img width="70" src="../websipo/images/loading.gif"></center>