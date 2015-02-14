<?php
include "koneksi.php";
$act=$_GET[act];
$jenis=$_GET[jenis];


// Hapus DP
if ($jenis=='dp' AND $act=='hapus'){
  mysql_query("DELETE FROM dp WHERE id_dp='$_GET[id]'");
  header('location:edit_dp.php');
}

// Update DP
elseif ($jenis=='dp' AND $act=='edit_dp'){
  mysql_query("UPDATE dp SET kode_dp = '$_POST[kode_dp]',
                                   alamat          = '$_POST[alamat]', 
                                   kapasitas  	   = '$_POST[kapasitas]', 
                                   jumlah_isi      = '$_POST[jumlah_isi]',
								   jumlah_rusak    = '$_POST[jumlah_rusak]', 
                                   jumlah_wsucc    = '$_POST[jumlah_wsucc]', 
                                   jumlah_kosong   = '$_POST[jumlah_kosong]',
								   lat    		   = '$_POST[lat]', 
                                   lng   		   = '$_POST[lng]'
								   WHERE id_dp     = '$_POST[id]'");
	header('location:edit_dp.php');
}
?>