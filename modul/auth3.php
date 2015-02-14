<?php
include('koneksi.php');


								
$NIP = $_POST['NIP'];
$password = $_POST['password'];

										
										 
$ins="INSERT INTO `db_googlemap`.`user` (`NIP`, `password`) VALUES ($NIP, $password);";
$x=mysql_query($ins) or die ("Gagal Simpan Query".mysql_error());
											
											
// code D
if (!$x) {
echo("gagal euy");
}else{
	 header( 'Location: user.php' ) ;
}
									
?>