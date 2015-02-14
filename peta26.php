
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <center><head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Angga Hidayah Ramadhan </title>

<center><script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAA8G9ZUehlmgHFYSk0eHkvMxSMGSzrQzuxP9i0yI8OwKXwu_vyNhQuc40vTW0co5ModYSrK6lCkwof0Q" type="text/javascript">
</script></center>



    <center><script type="text/javascript">
    //<![CDATA[

var iconBlue = new GIcon();
iconBlue.image = 'icon/gempa.png';
iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
iconBlue.iconSize = new GSize(20, 24);
iconBlue.shadowSize = new GSize(22, 20);
iconBlue.iconAnchor = new GPoint(6, 20);
iconBlue.infoWindowAnchor = new GPoint(5, 1);
 
var iconRed = new GIcon();
iconRed.image = 'icon/gunung.png';
iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
iconRed.iconSize = new GSize(20, 24);
iconRed.shadowSize = new GSize(22, 20);
iconRed.iconAnchor = new GPoint(6, 20);
iconRed.infoWindowAnchor = new GPoint(5, 1);
 
var iconGreen = new GIcon();
iconGreen.image = 'icon/banjir.png';
iconGreen.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
iconGreen.iconSize = new GSize(20, 24);
iconGreen.shadowSize = new GSize(22, 20);
iconGreen.iconAnchor = new GPoint(6, 20);
iconGreen.infoWindowAnchor = new GPoint(5, 1);
 
var iconYellow = new GIcon();
iconYellow.image = 'icon/kekeringan.png';
iconYellow.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
iconYellow.iconSize = new GSize(20, 24);
iconYellow.shadowSize = new GSize(22, 20);
iconYellow.iconAnchor = new GPoint(6, 20);
iconYellow.infoWindowAnchor = new GPoint(5, 1);

var iconBrown = new GIcon();
iconBrown.image = 'icon/tsunami.png';
iconBrown.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
iconBrown.iconSize = new GSize(20, 24);
iconBrown.shadowSize = new GSize(22, 20);
iconBrown.iconAnchor = new GPoint(6, 20);
iconBrown.infoWindowAnchor = new GPoint(5, 1);

var iconKebakaran = new GIcon(); 
iconKebakaran.image = 'icon/kebakaran.png';
iconKebakaran.iconSize = new GSize(20, 24);
iconKebakaran.shadowSize = new GSize(22, 20);
iconKebakaran.iconAnchor = new GPoint(6, 20);
iconKebakaran.iconAnchor = new GPoint(6, 20);
iconKebakaran.infoWindowAnchor = new GPoint(5, 1);

var iconTopan = new GIcon(); 
iconTopan.image = 'icon/topan.png';
iconTopan.iconSize = new GSize(20, 24);
iconTopan.shadowSize = new GSize(22, 20);
iconTopan.iconAnchor = new GPoint(6, 20);
iconTopan.iconAnchor = new GPoint(6, 20);
iconTopan.infoWindowAnchor = new GPoint(5, 1);
	
	
	
	

    var customIcons = [];
    customIcons["gempa"] = iconBlue;
    customIcons["gunung"] = iconRed;
	customIcons["banjir"] = iconGreen;
	customIcons["kekeringan"] = iconYellow;
	customIcons["tsunami"] = iconBrown;
	customIcons["kebakaran"] = iconKebakaran;
	customIcons["topan"] = iconTopan;
	
	

    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(-6.9171563, 107.6036539), 5);

        GDownloadUrl("echo.php", function(data) {
          var xml = GXml.parse(data);
          var markers = xml.documentElement.getElementsByTagName("tbl_informasi");
          for (var i = 0; i < markers.length; i++) {
		  var id_bencana = markers[i].getAttribute("id_bencana");
		  var tgl = markers[i].getAttribute("tgl");
            var penyebab = markers[i].getAttribute("penyebab");
			var kerusakan = markers[i].getAttribute("kerusakan");
			var bantuan = markers[i].getAttribute("bantuan");
            var jenis = markers[i].getAttribute("jenis");
            var korban = markers[i].getAttribute("korban");
            var point = new GLatLng(parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
            var marker = createMarker(point, id_bencana, tgl, penyebab, kerusakan,bantuan, korban, jenis);
            map.addOverlay(marker);
          }
        });
      }
    }

    function createMarker(point, id_bencana, tgl, penyebab, kerusakan, bantuan, korban, jenis) {
      var marker = new GMarker(point, customIcons[jenis]);
      var html = "<b>" + "Penyebab :" + penyebab + "</b> <br>" + " Kerusakan :" + kerusakan + "</br>"+ "Bantuan Yang dibutuhkan : "+bantuan+"<br>"+"Korban :" + korban + " <br/> " + "id bencana :"+ id_bencana + "</br>" +"tanggal : " + tgl;
      GEvent.addListener(marker, 'click', function() {
        marker.openInfoWindowHtml(html);
      });
      return marker;
    }
    //]]>
  </script></center>

  </head></center>

  <body onload="load()" onunload="GUnload()">
    <div id="map" style="width: 800px; height: 500px"></div>
  </body>
</html>
