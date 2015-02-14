<?php
//koneksinya cuy
include ("drastic-config5.php");
include ("drasticSrcMySQL.class.php");
//fungsi untuk cloud
$options = array(
    "delete_allowed" => false,
    "add_allowed" => false,
    "editablecols" => array ()
);
//fungsi untuk nampilin maps-nya dari db
class mysrc extends drasticsrcmysql {
	protected function select(){
		$res = mysql_query("SELECT * FROM $this->table WHERE daerah='Bogor'" . $this->orderbystr, $this->conn) or die(mysql_error());
		return ($res);
	}
}
//buat obj baru dr parameter mysrc
$src = new mysrc($server, $user, $pw, $db, "sto");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<!-- Yaa Allah, Sesungguhnya Hanya Engkau-Lah Penolongku. Berikanlah hamba kemudahan Yaa Allah -->
<head>
<link rel="stylesheet" type="text/css" href="css/cloud_default.css"/>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<link rel="stylesheet" type="text/css" href="css/map_default.css"/>
<title>Firmansyah Wahyudiarto & Lida Pratiwi Puteri - Telkom GIS</title>
</head><body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticCloud.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=<?php echo $GApiKey ?>"></script>
<script type="text/javascript" src="js/markermanager.js"></script>
<script type="text/javascript" src="js/drasticMap.js"></script>
<div>
<div id="map1" style="position: absolute; width: 500px; height: 410px; left: 0; top: 0;" title="Peta Calon Pelanggan Telkom Kota Bogor">Peta Calon Pelanggan Telkom Kota Bogor</div>
<div id="grid1" style="position: absolute; left: 515px; top: 0;"></div>
<div id="cloud1" style="position: absolute; left: 0; top: 420px"></div>
<div id="hehe" style="position: relative; left: 300; top: 650px">Copyright &copy; 2011 by Lida Pratiwi, Google Technology, and DrasticData NL</div>
</div>
<script type="text/javascript">
var themap = new drasticMap('map1', {
	pathimg: "img/",
	displaycol: "nama_sto",
	onClick: function(id){themap.DefaultOnClick(id); thegrid.DefaultOnClick(id)}
});
var thegrid = new drasticGrid('grid1', {
	pathimg: "img/",
	pagelength: 25,
	onClick: function(id){themap.DefaultOnClick(id); thegrid.DefaultOnClick(id)}
});
var thecloud = new drasticCloud('cloud1', {
    showmenu: false,
    namecol: "nama_sto",
	sizecol: "nama_sto",
    sortcol: "nama_sto",
    sort: "d",
    onClick: function(id){thecloud.DefaultOnClick(id); thegrid.DefaultOnClick(id); themap.DefaultOnClick(id)}
});
</script>

</body></html>