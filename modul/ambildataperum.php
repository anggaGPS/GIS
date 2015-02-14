<?php
include "koneksi.php";
$akhir = $_GET['akhir'];
if($akhir==1){
    $query = "SELECT * FROM perumahan ORDER BY id_perumahan DESC LIMIT 4";
}else{
    $query = "SELECT * FROM perumahan";
}
$data = mysql_query($query);

$json = '{"wilayah": {';
$json .= '"petak":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id_perumahan":"'.$x['id_perumahan'].'",
		"nama":"'.htmlspecialchars($x['nama_perum']).'",
        "alamat":"'.htmlspecialchars($x['alamat']).'",
		"kec":"'.$x['country_map.nama_kec'].'",
		"daerah":"'.$x['daerah'].'",
		"jumlah":"'.$x['jumlah_dibangun'].'",
		"sudah":"'.$x['sudah_dibangun'].'",
		"x":"'.$x['lat'].'",
        "y":"'.$x['lng'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}}';
echo $json;

?>
