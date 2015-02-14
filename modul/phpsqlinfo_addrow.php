<?php
require("phpsqlinfo_dbinfo.php");

// Gets data from URL parameters
$nama_perum = $_GET['nama_perum'];
$alamat = $_GET['alamat'];
$coords = $_GET['coords'];
//$lng = $_GET['lng'];
$id = $_GET['id'];
$jumlah_dibangun = $_GET['jumlah_dibangun'];
$sudah_dibangun = $_GET['sudah_dibangun'];



// Opens a connection to a MySQL server
$connection=mysql_connect ("localhost", $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Insert new row with user data
$query = sprintf("INSERT INTO perumahan " .
         " (id_perumahan, nama_perum, alamat, coords, id, jumlah_dibangun, sudah_dibangun) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s');",
         mysql_real_escape_string($nama_perum),
         mysql_real_escape_string($alamat),
         mysql_real_escape_string($coords),
         //mysql_real_escape_string($lng),
		 mysql_real_escape_string($id),
		 mysql_real_escape_string($jumlah_dibangun),
         mysql_real_escape_string($sudah_dibangun));

$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>