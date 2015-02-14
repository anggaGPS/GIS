<?php
// menggunakan class phpExcelReader
include "excel_reader2.php";

// koneksi ke mysql
mysql_connect("localhost", "root", "");
mysql_select_db("drasticdata");

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);


// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=1; $i<=$baris; $i++)
{
// membaca data nim (kolom ke-i)
$id_rk = $data->val($i, 1);
$nama_rk = $data->val($i, 2);
$alamat = $data->val($i, 3);
$id_sto = $data->val($i, 4);
$lat = $data->val($i, 5);
$lng = $data->val($i, 6);


// setelah data dibaca, sisipkan ke dalam tabel 
//('id_perumahan','nama_perum','alamat','id','daerah','jumlah_dibangun','sudah_dibangun','lat','lng',) => 'drasticdata'.'perumahan'
$query = "INSERT INTO rk VALUES ('$id_rk', '$nama_rk', '$alamat','$id_sto','$lat','$lng')";
$hasil = mysql_query($query);

// jika proses insert data sukses, maka counter $sukses bertambah
// jika gagal, maka counter $gagal yang bertambah
if ($hasil) $sukses++;
else $gagal++;
}

// tampilan status sukses dan gagal
echo "Proses import data selesai. <br>"; 
echo "Jumlah data yang sukses diimport : ".$sukses." <br>";
echo "Jumlah data yang gagal diimport : ".$gagal." <br>";


?>