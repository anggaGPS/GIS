<?php
include "koneksi.php";

$x = $_GET['x'];
$y = $_GET['y'];
$jenis  = $_GET['jenis'];
$id_info  = $_GET['id_info'];
$id_prov  = $_GET['id_prov'];
$id_bencana  = $_GET['id_bencana'];
$korban  = $_GET['korban'];
$penyebab  = $_GET['penyebab'];
$kerusakan  = $_GET['kerusakan'];
$bantuan  = $_GET['bantuan'];
$pengungsi  = $_GET['pengungsi'];
$tgl  = $_GET['tgl'];

$masuk = mysql_query("insert into tbl_informasi(id_info,korban,penyebab,id_prov,id_bencana,kerusakan,bantuan, jenis,pengungsi,lat,lng,tgl)
values('$id_info','$korban','$penyebab','$id_prov','$id_bencana','$kerusakan','$bantuan','$jenis','$pengungsi',$x,$y,'$tgl')");
if($masuk){
    echo "Berhasil Menyimpan Data";
}else{
    echo "Gagal : ".mysql_error();

}

?>
