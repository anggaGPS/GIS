<!DOCTYPE html >
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Kustomisasi Marker Icons pada Beberapa Lokasi</title>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
 
<style>
          html, body {
               font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
               font-size: medium;
               }
          #map {
               width: 500px;
               height: 400px;
               border: 1px solid black;
          }
</style>
 
<script type="text/javascript">
 
     //Mendefinisikan alamat icons yang akan digunakan
    var customIcons = {
      stasiun: {
        icon: 'icons/kebakaran.png'
      },
      monumen: {
        icon: 'icons/gempa.png'
      },
       benteng: {
        icon: 'icons/gunung.png'
      },
      stadion: {
        icon: 'icons/banjir.png'
      },
       alun: {
        icon: 'icons/topan.png'
      }
    };
 
    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-7.789550, 110.364250),
        zoom: 14,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;
 
      // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam dataLokasi.php
      downloadUrl("echo.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var id_bencana = markers[i].getAttribute("id_bencana");
		  var tgl = markers[i].getAttribute("tgl");
           var penyebab = markers[i].getAttribute("penyebab");
		var kerusakan = markers[i].getAttribute("kerusakan");
		var bantuan = markers[i].getAttribute("bantuan");
            var jenis = markers[i].getAttribute("jenis");
            var korban = markers[i].getAttribute("korban");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + id_bencana + "</b><br/>" + jenis;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
 
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }
 
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }
 
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
 
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };
 
      request.open('GET', url, true);
      request.send(null);
    }
 
    function doNothing() {}
 
</script>
 
</head>
 
<body onload="load()">
 
<center>
 
<h4>Kustomisasi Marker Icons pada Beberapa Lokasi</h4>
<div id="map"></div>
 
</center>
</body>
 
</html>