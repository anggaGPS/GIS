<?php
include ("drastic-config.php");
include ("drasticSrcMySQL.class.php");
class mysrc extends drasticsrcmysql {
	protected function select(){
		$res = mysql_query("SELECT * FROM $this->table WHERE daerah='bogor'" . $this->orderbystr, $this->conn) or die(mysql_error());
		return ($res);
	}
}
$src = new mysrc($server, $user, $pw, $db, "country_map");
?>
<html>
<link rel="stylesheet" type="text/css" href="css/grid_default.css"/>
<link rel="stylesheet" type="text/css" href="css/map_default.css"/>
<body>
<script type="text/javascript" src="js/mootools-1.2-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
<script type="text/javascript" src="js/drasticGrid.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=<?php echo $GApiKey ?>"></script>
<script type="text/javascript" src="js/markermanager.js"></script>
<script type="text/javascript" src="js/drasticMap.js"></script>
<div id="map1" style="width: 740px; height: 500px;"></div>
<div id="grid1"></div>
<script type="text/javascript">
var themap = new drasticMap('map1', {
	pathimg: "img/",
	displaycol: "nama_kec",
	onClick: function(id){themap.DefaultOnClick(id); thegrid.DefaultOnClick(id)}
});
var thegrid = new drasticGrid('grid1', {
	pathimg: "img/",
	pagelength: 10,
	onClick: function(id){themap.DefaultOnClick(id); thegrid.DefaultOnClick(id)}
});
</script>
</body>
</html>