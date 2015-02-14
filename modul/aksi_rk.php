<?php
include "koneksi.php";
$act=$_GET[act];
$jenis=$_GET[jenis];

// =======================================================================================

//hapus rk
if ($jenis=='rk' AND $act=='hapus'){
  mysql_query("DELETE FROM rk WHERE id_rk='$_GET[id]'");
  header('location:editrk.php');
}

// Update rk
elseif ($jenis=='rk' AND $act=='edit_rk'){
  mysql_query("UPDATE rk SET nama_rk 	   = '$_POST[nama_rk]',
                                   alamat          = '$_POST[alamat]', 
                                   id_sto  	   	   = '$_POST[id_sto]',  
                                   lat    		   = '$_POST[lat]', 
                                   lng   		   = '$_POST[lng]'
								   WHERE id_rk  = '$_POST[id]'");
	header('location:editrk.php');
}
?>