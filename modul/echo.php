<?php
require("koneksi.php");
function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

// Opens a connection to a MySQL server
$connection=mysql_connect ($dbhost, $dbuser, $dbpass);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}
// Set the active MySQL database
$db_selected = mysql_select_db($dbname, $koneksi);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
// Select all the rows in the markers table
$query = "SELECT * FROM tbl_informasi WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml");
// Start XML file, echo parent node
echo '<tbl_informasi>';
// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<tbl_informasi ';
  echo 'id_bencana="' . parseToXML($row['id_bencana']) . '" ';
  echo 'id_prov="' . parseToXML($row['id_prov']) . '" ';
  echo 'tgl="' . parseToXML($row['tgl']) . '" ';
  echo 'penyebab="' . parseToXML($row['penyebab']) . '" ';
  echo 'jenis="' . parseToXML($row['jenis']) . '" ';
    echo 'kerusakan="' . parseToXML($row['kerusakan']) . '" ';
	echo 'bantuan="' . parseToXML($row['bantuan']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'korban="' . $row['korban'] . '" ';
  echo '/>'; // ganti sama database GIS sendiri Angga
}
// End XML file
echo '</tbl_informasi>';
?>
