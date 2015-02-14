<?php
include "koneksi.php";
$act=$_GET[act];
$jenis=$_GET[jenis];


// Hapus sto
if ($jenis=='sto' AND $act=='hapus'){
  mysql_query("DELETE FROM sto WHERE id_sto='$_GET[id]'");
  header('location:editsto.php');
}

// Update sto
elseif ($jenis=='sto' AND $act=='edit_sto'){
  mysql_query("UPDATE sto SET kode_sto = '$_POST[kode_sto]',
								   nama_sto        = '$_POST[nama_sto]', 
                                   alamat          = '$_POST[alamat]', 
                                   id  	   		   = '$_POST[id]', 
                                   daerah          = '$_POST[daerah]',
								   lat    		   = '$_POST[lat]', 
                                   lng   		   = '$_POST[lng]'
								   WHERE id_sto     = '$_POST[id]'");
	header('location:editsto.php');
}
?>