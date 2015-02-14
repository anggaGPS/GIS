<?php
include "koneksi.php";

$x = $_GET['x'];
$y = $_GET['y'];
$nama = $_GET['nama'];
$alamat  = $_GET['alamat'];
$jumlah  = $_GET['jumlah'];
$sudah  = $_GET['sudah'];
$kec  = $_GET['kec'];
$daerah  = $_GET['daerah'];


$masuk = mysql_query("insert into perumahan values(null,'$nama','$alamat','$kec','$daerah','$jumlah','$sudah',$x,$y)");
if($masuk){
    echo "berhasil";
}else{
    echo "gagal";
}
?>
