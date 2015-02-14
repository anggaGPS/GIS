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
$id_dp = $data->val($i, 1);
$kode_dp = $data->val($i, 2);
$alamat = $data->val($i, 3);
$kapasitas = $data->val($i, 4);
$jumlah_isi = $data->val($i, 5);
$jumlah_rusak = $data->val($i, 6);
$jumlah_wsucc = $data->val($i, 7);
$jumlah_kosong = $data->val($i, 8);
$id_rk = $data->val($i, 9);
$lat = $data->val($i, 10);
$lng = $data->val($i, 11);


// setelah data dibaca, sisipkan ke dalam tabel 
//('id_perumahan','nama_perum','alamat','id','daerah','jumlah_dibangun','sudah_dibangun','lat','lng',) => 'drasticdata'.'perumahan'
$query = "INSERT INTO dp VALUES ('$id_dp', '$kode_dp', '$alamat','$kapasitas','$jumlah_isi','$jumlah_rusak','$jumlah_wsucc','$jumlah_kosong','$id_rk','$lat','$lng')";
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