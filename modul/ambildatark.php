<?php
include "koneksi.php";
$akhir = $_GET['akhir'];
if($akhir==1){
    $query = "SELECT * FROM rk ORDER BY id_rk DESC LIMIT 1";
}else{
    $query = "SELECT * FROM rk";
}
$data = mysql_query($query);

$json = '{"wilayah": {';
$json .= '"petak":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id_sto":"'.$x['id_sto'].'",
		"nama":"'.htmlspecialchars($x['nama_rk']).'",
        "alamat":"'.htmlspecialchars($x['alamat']).'",
		"idsto":"'.$x['id_sto'].'",
		"x":"'.$x['lat'].'",
        "y":"'.$x['lng'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}}';
echo $json;

?>
