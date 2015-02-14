<?php
include "koneksi.php";
$act=$_GET[act];
$jenis=$_GET[jenis];

// =======================================================================================

//hapus Perum
if ($jenis=='perum' AND $act=='hapus'){
  mysql_query("DELETE FROM perumahan WHERE id_perumahan='$_GET[id]'");
  header('location:editperum.php');
}

// Update Perum
elseif ($jenis=='perum' AND $act=='edit_perum'){
  mysql_query("UPDATE perumahan SET nama_perum 	   = '$_POST[nama_perum]',
                                   alamat          = '$_POST[alamat]', 
                                   daerah  	   	   = '$_POST[daerah]', 
                                   jumlah_dibangun = '$_POST[jumlah_dibangun]',
								   sudah_dibangun  = '$_POST[sudah_dibangun]', 
                                   lat    		   = '$_POST[lat]', 
                                   lng   		   = '$_POST[lng]'
								   WHERE id_perumahan  = '$_POST[id]'");
	header('location:editperum.php');
}
?>