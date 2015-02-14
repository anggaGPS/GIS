<?php
include "koneksi.php";
$akhir = $_GET['akhir'];
if($akhir==1){
    $query = "SELECT * FROM dp ORDER BY id_dp DESC LIMIT 1";
}else{
    $query = "SELECT * FROM dp";
}
$data = mysql_query($query);

$json = '{"wilayah": {';
$json .= '"petak":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id_dp":"'.$x['id_dp'].'",
		"nama":"'.htmlspecialchars($x['kode_dp']).'",
        "alamat":"'.htmlspecialchars($x['alamat']).'",
		"kapasitas":"'.htmlspecialchars($x['kapasitas']).'",
		"isi":"'.htmlspecialchars($x['jumlah_isi']).'",
		"rusak":"'.htmlspecialchars($x['jumlah_rusak']).'",
		"wsucc":"'.htmlspecialchars($x['jumlah_wsucc']).'",
		"kosong":"'.htmlspecialchars($x['jumlah_kosong']).'",
		"idrk":"'.$x['id_rk'].'",
		"x":"'.$x['lat'].'",
        "y":"'.$x['lng'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}}';
echo $json;

?>
