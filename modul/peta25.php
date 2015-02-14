<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <title>Sistem Informasi Geografis Persebaran Warnet dan Foto Kopi Sekitar Kaliurang</title>
        <link rel="stylesheet" media="screen" href="css/style.css" type="text/css"/>
    </head>
    <body>
        <div id="container">

            <h3 align="center">Sistem Informasi Geografis Persebaran Warnet dan Foto Kopi Sekitar Kaliurang</h3>
            <div id="menu">
                <a href="index.php">Tambah Lokasi</a> - <a href="index.php?page=data">Data Lokasi</a> - <a href="index.php?page=peta">Lihat Peta</a>
            </div><br/>
            <?php
            if (empty($_GET['page'])) {
                echo '
                    <script src="js/jquery-1.7.2.min.js"></script>
                    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
                    <link rel="stylesheet" type="text/css" href="css/jquery-gmaps-latlon-picker.css"/>
                    <script src="js/jquery-gmaps-latlon-picker.js"></script>
                    <h4>Tambah Lokasi</h4>
                    <form method="post">
                          Nama Lokasi <input style="width:70%" type="text" name="namalokasi"/><br/><br/>
                          Kategori  
                          <input type="radio" name="kategori" value="1"/>Warnet 
                          <input type="radio" name="kategori" value="2"/>Foto Kopi<br/><br/>
                          Peta Lokasi <br/><br/>
                          <fieldset class="gllpLatlonPicker">
                            <div class="gllpMap">Google Maps</div>
                            <input name="lat" type="hidden" class="gllpLatitude" value="-7.755043459630856"/>
                            <input name="long" type="hidden" class="gllpLongitude" value="110.38321655566403"/>
                            <input type="hidden" class="gllpZoom" value="17"/>
                          </fieldset><br/>
                          <center><input style="width:200px;height:80px;font-size:20pt" type="submit" name="klik" value="Simpan"/></center>
                    </form>
                    ';
                if (isset($_POST['klik'])) {
                    mysql_query("insert into data_lokasi (penyebab,id_bencana,lat,lng) values ('$_POST[namalokasi]','$_POST[kategori]','$_POST[lat]','$_POST[long]')");
                    echo '
                        <script>alert("Data Berhasil Ditambahkan")</script>
                        <meta HTTP-EQUIV="REFRESH" content="0; url=index.php?page=data">
                        ';
                }
            } else {
                if ($_GET['page'] == "data") {
                    $queryLokasi = mysql_query("select * from data_lokasi natural join kategori");
                    $ceklokasi = mysql_num_rows($queryLokasi);
                    if ($ceklokasi != 0) {
                        echo '
                        <h4>Tambah Lokasi</h4>
                        <table border="1">
                          <tr>
                            <td>No</td>
                            <td>Nama Lokasi</td>
                            <td>Kategori</td>
                            <td>Latitude</td>
                            <td>Longitude</td>
                            <td>Hapus</td>
                          </tr>';
                        $NO = 1;
                        while ($dataLokasi = mysql_fetch_array($queryLokasi)) {
                            echo '
                          <tr>
                            <td align="center">' . $NO . '</td>
                            <td>' . $dataLokasi['penyebab'] . '</td>
                            <td>' . $dataLokasi['nama_kategori'] . '</td>
                            <td>' . $dataLokasi['lat'] . '</td>
                            <td>' . $dataLokasi['lng'] . '</td>
                            <td align="center"><a onclick="return confirm(\'Hapus ?\')" style="color:red;text-decoration:none" href="index.php?page=data&hapus=' . $dataLokasi['id_lokasi'] . '">x</a></td>
                          </tr>
                          ';
                            $NO++;
                        }
                        echo '
                            </table>
                        ';
                        if (!empty($_GET['hapus'])) {
                            mysql_query("delete from data_lokasi where id_lokasi=$_GET[hapus]");
                            echo '
                        <script>alert("Data Berhasil Dihapus")</script>
                        <meta HTTP-EQUIV="REFRESH" content="0; url=index.php?page=data">
                        ';
                        }
                    } else {
                        echo 'data kosong';
                    }
                } else if ($_GET['page'] == "peta") {
                    echo 'Kategori : <a href="index.php?page=peta">Semua</a> - <a href="index.php?page=peta&cat=warnet">Warnet</a> - <a href="index.php?page=peta&cat=fotocopi">Foto Kopi</a><br/>';
                    ?>
                    <br/>
                    <?php
                    if (empty($_GET['cat'])) {
                        echo '<h4>Semua Peta</h4>';
                        $queryPeta = mysql_query("select * from data_lokasi");
                    } else {
                        if ($_GET['cat'] == "warnet") {
                            echo '<h4>Peta Warnet</h4>';
                            $queryPeta = mysql_query("select * from data_lokasi where id_bencana=1");
                        } else if ($_GET['cat'] == "fotocopi") {
                            echo '<h4>Peta Foto Kopi</h4>';
                            $queryPeta = mysql_query("select * from data_lokasi where id_bencana=2");
                        }
                    }
                    $cekData = mysql_num_rows($queryPeta);
                    if ($cekData != 0) {
                        ?>
                        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
                        <div id="map_canvas" style="width:100%;height:800px;border:1px solid green">Google Map</div> 
                        <script type="text/javascript">
                            function initialize() {
                                var map_options = {
                                    center: new google.maps.LatLng(-7.755043459630856,110.38321655566403),
                                    zoom: 15,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };

                                var google_map = new google.maps.Map(document.getElementById("map_canvas"), map_options);

                                var info_window = new google.maps.InfoWindow({
                                    content: 'loading'
                                });

                                var t = [];
                                var x = [];
                                var y = [];
                                var h = [];
            <?php
            while ($dataPeta = mysql_fetch_array($queryPeta)) {
                echo "
t.push('$dataPeta[penyebab]');
x.push($dataPeta[lat]);
y.push($dataPeta[lng]);
h.push('<p><strong>$dataPeta[penyebab]</p>');
";
            }
            ?>
                    var i = 0;
                    for ( item in t ) {
                        var m = new google.maps.Marker({
                            map:       google_map,
                            animation: google.maps.Animation.DROP,
                            title:     t[i],
                            position:  new google.maps.LatLng(x[i],y[i]),
                            html:      h[i]
                        });

                        google.maps.event.addListener(m, 'click', function() {
                            info_window.setContent(this.html);
                            info_window.open(google_map, this);
                        });
                        i++;
                    }
                }

                initialize();
                        </script>
                        <?php
                    } else {
                        echo 'Data Kosong';
                    }
                }
            }
            ?>
        </div>
    </body>
</html>