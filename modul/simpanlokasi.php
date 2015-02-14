<?php
include "koneksi.php";

$x = $_GET['x'];
$y = $_GET['y'];
$nama = $_GET['nama'];
$kode = $_GET['kode'];
$alamat  = $_GET['alamat'];
$kec  = $_GET['kec'];
$daerah  = $_GET['daerah'];

$masuk = mysql_query("insert into sto values(null,'$kode','$nama','$alamat','$kec','$daerah',$x,$y)");
if($masuk){
    echo "berhasil";
}else{
    echo "gagal";
}
?>
