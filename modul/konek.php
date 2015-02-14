<?php
require("phpsqlinfo_dbinfo.php");
$connection=mysql_connect ("localhost", $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

mysql_connect("localhost","root","");
mysql_select_db("drasticdata");

?>
