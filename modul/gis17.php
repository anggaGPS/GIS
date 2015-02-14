<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Tutorial Google Maps</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAnQj3JDCP4-qaVgBxRQArsBR9aFbyYpVuqRQYnlY47zK0tc3FFRQ95vTz-BUqgUNXL8tynFfQwmDhgw" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
var map;
var geocoder;
var address;


function load() {
	if (GBrowserIsCompatible()) {
		map = new GMap2(document.getElementById("map"));
  		map.setCenter(new GLatLng(-6.886791,107.615238), 15);
  		map.addControl(new GLargeMapControl);
  		GEvent.addListener(map, "click", getAddress);
  		geocoder = new GClientGeocoder();
  }
}

function getAddress(overlay, latlng) {
  if (latlng != null) {
    address = latlng;
    geocoder.getLocations(latlng, showAddress);
  }
}

function showAddress(response) {
  map.clearOverlays();
  if (!response || response.Status.code != 200) {
    alert("Status Code:" + response.Status.code);
  } else {
    place = response.Placemark[0];
    point = new GLatLng(place.Point.coordinates[1],
                        place.Point.coordinates[0]);
    marker = new GMarker(point);
    map.addOverlay(marker);
    marker.openInfoWindowHtml(
    '<b>Koordinat yang diklik:</b>' + response.name + '<br/>' +
    '<b>Koordinat terdekat:</b>' + place.Point.coordinates[1] + "," + place.Point.coordinates[0] + '<br>' +
    '<b>Alamat:</b>' + place.address + '<br>' +
    '<b>Akurasi:</b>' + place.AddressDetails.Accuracy + '<br>' +
    '<b>Kode Negara:</b> ' + place.AddressDetails.Country.CountryNameCode);
  }
}

//]]>
</script>
</head>
<body onload="load()" onunload="GUnload()">
<h2>Menampilkan Informasi Sesuai Lokasi yang Dipilih</h2>
<div id="map" style="width: 500px; height: 500px"></div>
<div>Klik di dalam peta untuk melihat informasi lokasi berdasarkan GeoCoder.</div>
</body>
</html>