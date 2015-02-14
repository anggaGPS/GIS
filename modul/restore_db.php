<img src="gambar/mobads.png" width="148" height="61" />

<?php
// koneksi ke db mysql
include "../include/koneksi_backup.php";

mysql_connect($host, $user, $pass);
mysql_select_db($dbase);

echo "<h1>Restore Data MySQL</h1>";

echo "DB Name: ".$dbase;

// form upload file dumo
echo "<form enctype='multipart/form-data' method='post' action='".$_SERVER['PHP_SELF']."?op=restore'>";
echo "<input type='hidden' name='MAX_FILE_SIZE' value='20000000'>
      <input name='datafile' type='file'>
      <input name='submit' type='submit' value='Restore'>";
echo "</form>";

// proses restore data
if ($_GET['op'] == "restore")
{
  // baca nama file
  $fileName = $_FILES['datafile']['name'];

  // proses upload file
  move_uploaded_file($_FILES['datafile']['tmp_name'], $fileName);

  // membentuk string command untuk restore
  // di sini diasumsikan letak file mysql.exe terletak di direktori C:\xampp\MySQL\bin
  $string = "C:\xampp\MySQL\bin\mysql -u".$user." -p".$pass." ".$dbase." < ".$fileName;

  // menjalankan command restore di shell via PHP
  exec($string);

  // hapus file dump yang diupload
  unlink($fileName);
}

?>