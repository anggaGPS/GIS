<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Tutorial Google Maps</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAnQj3JDCP4-qaVgBxRQArsBR9aFbyYpVuqRQYnlY47zK0tc3FFRQ95vTz-BUqgUNXL8tynFfQwmDhgw" type="text/javascript"></script>
<script src="data_universitas_db.php" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
var map;


function BuatMarker(lintang, bujur, keterangan) {
  	var marker = new GMarker(new GLatLng(lintang, bujur));
	GEvent.addListener(marker, 'click',
						function() {
							marker.openInfoWindowHtml(keterangan);
						}
					   );
	
	map.addOverlay(marker);
}

function load() {
	if (GBrowserIsCompatible()) {
		map = new GMap2(document.getElementById("map"));
		map.enableContinuousZoom();
		map.addControl(new GSmallMapControl());

		var batas_kiri,batas_kanan,batas_atas,batas_bawah;
		batas_atas=universitas[0].lintang;
		batas_bawah=universitas[0].lintang;
		batas_kiri=universitas[0].bujur;
		batas_kanan=universitas[0].bujur;
		for(i=0;i<universitas.length;i++){
			BuatMarker(universitas[i].lintang,universitas[i].bujur,universitas[i].nama);	
			if(universitas[i].lintang<batas_atas) batas_atas=universitas[i].lintang;
			if(universitas[i].lintang>batas_bawah) batas_bawah=universitas[i].lintang;
			if(universitas[i].bujur<batas_kiri) batas_kiri=universitas[i].bujur;
			if(universitas[i].bujur>batas_kanan) batas_kanan=universitas[i].bujur;
		}
		
		var location = new GLatLng((batas_atas+batas_bawah)/2 , (batas_kiri+batas_kanan)/2);
		map.setCenter(location, 15);
	}
}
//]]>
</script>
</head>
<body onload="load()" onunload="GUnload()">
<h2>Menampilkan Marker sesuai data di Array. <br />
Data Array dibuat secara dinamis dari database dengan PHP (data_universitas_db.php)</h2>
<div id="map" style="width: 500px; height: 300px"></div>
</body>
</html>