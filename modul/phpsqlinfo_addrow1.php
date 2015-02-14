<?php
require("phpsqlinfo_dbinfo.php");

// Gets data from URL parameters
$coords = $_GET['coords'];
$nama_sto = $_GET['nama_sto'];
$kode_sto = $_GET['kode_sto'];
$alamat = $_GET['alamat'];
$id = $_GET['id'];
$daerah  = $_GET['daerah'];


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
$query = sprintf("INSERT INTO sto " .
         " (id_sto, kode_sto, nama_sto,alamat,coords,id,daerah) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s');",
		 mysql_real_escape_string($kode_sto),
         mysql_real_escape_string($nama_sto),
         mysql_real_escape_string($alamat),
         mysql_real_escape_string($coords),
         //mysql_real_escape_string($lng),
		 mysql_real_escape_string($id),
		 mysql_real_escape_string($daerah));

$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>