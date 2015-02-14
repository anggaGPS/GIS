<?php
include "koneksi.php";

$x = $_GET['x'];
$y = $_GET['y'];
$nama = $_GET['nama'];
$alamat  = $_GET['alamat'];
$idsto  = $_GET['idsto'];


$masuk = mysql_query("insert into rk values(null,'$nama','$alamat','$idsto',$x,$y)");
if($masuk){
    echo "berhasil";
}else{
    echo "gagal";
}
?>
