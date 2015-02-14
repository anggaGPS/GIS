<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Consumer Service Mapping Solution Dashboard</title>
<head>
<title>Consumer Service Mapping Solution Dashboard</title>
<!-- by Firmansyah Wahyudiarto & Lida Pratiwi Puteri -->
<link rel="stylesheet" href="styles/reset.css" />
<link rel="stylesheet" href="styles/text.css" />
<link rel="stylesheet" href="styles/960_fluid.css" />
<link rel="stylesheet" href="styles/main.css" />
<link rel="stylesheet" href="styles/bar_nav.css" />
<link rel="stylesheet" href="styles/side_nav.css" />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css" />

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>

<script type="text/javascript" src="scripts/sherpa_ui.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">

      function initialize() {
        var mapDiv = document.getElementById('map-canvas');
        var map = new google.maps.Map(mapDiv, {
          center: new google.maps.LatLng(-6.5878, 106.7928),
          zoom: 4,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
<style type="text/css">
<!--
#bawah {
	position:absolute;
	left:168px;
	top:648px;
	width:939px;
	height:35px;
	z-index:1;
	background-color: #6FD601;
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 11px;
	color: #000;
}
-->
</style>
</head>
<body>
	<div id="bawah">Copyright &copy; 2011 by &laquo;<span class="lida"> Firmansyah Wahyudiarto & Lida Pratiwi Puteri</span> &raquo; <br>
 <span class="telkom">PT. Telkom Indonesia</span> Divisi Consumer Service</div>
	<div id="wrapper" class="container_16">
		<div id="top_nav" class="nav_down bar_nav grid_16 round_all">
<a href="#" class="minimize round_bottom"><span>minimize</span></a><img src="images/header-jadi.jpg" width="936" height="256"></div>
			
		<div id="side_nav" class="side_nav grid_3 push_down">
		  <ul class="clearfix">
				<li><a class="round_left" href="./halaman_utama.php">
					<img src="images/icons/grey/admin_user.png">
					<span>Dashboard</span></a>
				</li> 
				<li><a class="round_left" href="#">
					<img src="images/icons/grey/settings_2.png"><span>Utilities</span>
					<span class="icon">&nbsp;</span>
					</a>
					<ul>
						<li><a href="#"><img src="images/icons/grey/sign_post.png">Import Data</a>
                        <span class="icon">&nbsp;</span>
                        	<ul>
                        		<li><a href="./modul/form_import_perum.php" target="_blank"><img src="images/icons/grey/sport_shirt.png">Import Perumahan</a></li>
								<li><a href="./modul/form_import_rk.php" target="_blank"><img src="images/icons/grey/trashcan_2.png">Import RK</a></li>
                        		<li><a href="./modul/form_import_dp.php" target="_blank"><img src="images/icons/grey/winner_podium.png">Import DP</a></li>
                        	</ul>
                        </li>
                        <li><a href="#"><img src="images/icons/grey/refresh_2.png">Excel Report</a>
                        <span class="icon">&nbsp;</span>
                        <ul>
                        		<li><a href="./modul/report_perum.php"><img src="images/icons/grey/sport_shirt.png">Report Perumahan</a></li>
								<li><a href="./modul/report_rk.php"><img src="images/icons/grey/trashcan_2.png">Report RK</a></li>
                        		<li><a href="./modul/report_dp.php"><img src="images/icons/grey/winner_podium.png">Report DP</a></li>
                                <li><a href="./modul/report_sto.php"><img src="images/icons/grey/winner_podium.png">Report STO</a></li>
                        	</ul>
                        </li>					
					</ul>
				</li>				
				<li><a href="./modul/isi_gmaps.php" target="_blank">
					<img src="images/icons/grey/battery.png">
					<span>View Kecamatan</span>																	
	</li>	
                <li><a href="./modul/view_perum.php" target="_blank">
					<img src="images/icons/grey/running_man.png">
					<span>View Perumahan</span>																	
</li>	
                <li><a class="round_left" href="#">
					<img src="images/icons/grey/settings_2.png"><span>Pilih Kecamatan</span>
					<span class="icon">&nbsp;</span>
					</a>
					<ul>
						<li><a href="./modul/view_perum_barat.php" target="_blank"><img src="images/icons/grey/sport_shirt.png">Kec. Bogor Barat</a></li>
						<li><a href="./modul/view_perum_selatan.php" target="_blank"><img src="images/icons/grey/trashcan_2.png">Kec. Bogor Selatan</a></li>
                        <li><a href="./modul/view_perum_tengah.php" target="_blank"><img src="images/icons/grey/winner_podium.png">Kec. Bogor Tengah</a></li>
                        <li><a href="./modul/view_perum_timur.php" target="_blank"><img src="images/icons/grey/sign_post.png">Kec. Bogor Timur</a></li>
						<li><a href="./modul/view_perum_utara.php" target="_blank"><img src="images/icons/grey/strategy_2.png">Kec. Bogor Utara</a></li>
                        <li><a href="./modul/view_perum_tanah.php" target="_blank"><img src="images/icons/grey/refresh_2.png">Kec. Tanah Sareal</a></li>
                       
					</ul>
				</li>				
				<li><a href="#">
					<img src="images/icons/grey/trashcan_2.png">
					<span>Tambah Manual</span>	
                    <span class="icon">&nbsp;</span>
              <ul>
                    	<li><a href="./modul/tambahperum.php" target="_blank"><img src="images/icons/grey/sport_shirt.png">Tambah Perumahan</a></li>
						<li><a href="./modul/tambahsto.php" target="_blank"><img src="images/icons/grey/trashcan_2.png">Tambah STO</a></li>
                        <li><a href="./modul/tambahrk.php" target="_blank"><img src="images/icons/grey/winner_podium.png">Tambah RK</a></li>
                        <li><a href="./modul/tambahdp.php" target="_blank"><img src="images/icons/grey/sign_post.png">Tambah DP</a></li>
                    </ul>
			</li>	
		    <li><a href="#">
					<img src="images/icons/grey/price_tag.png">
					<span>Manage Data</span>
                    <span class="icon">&nbsp;</span></a>
                    <ul>
						<li><a href="./modul/edituser.php" target="_blank"><img src="images/icons/grey/winner_podium.png">Manage User</a></li>
						<li><a href="./modul/edit_dp.php" target="_blank"><img src="images/icons/grey/sign_post.png">Manage DP</a></li>
						<li><a href="./modul/editperum.php" target="_blank"><img src="images/icons/grey/running_man.png">Manage Perum</a></li>
                        <li><a href="./modul/editrk.php" target="_blank"><img src="images/icons/grey/battery.png">Manage RK</a></li>
                        <li><a href="./modul/editsto.php" target="_blank"><img src="images/icons/grey/sign_post.png">Manage STO</a></li>
					</ul>
	</li>	
				<li><a href="#">
					<img src="images/icons/grey/chart_6.png">
					<span>Help</span>
					<span class="icon">&nbsp;</span></a>
					<ul>
						<li><a href="./modul/GUIDE.docx" target="_blank">Penggunaan Aplikasi</li>
						<li><a href="./modul/privacy_policy.php" target="_blank">Ketentuan dan Kebijakan</li>
						<li><a href="./modul/fitur.php" target="_blank">Fitur-Fitur</a></li>
                        <li><a href="./modul/about.php" target="_blank">About</a></li>
					</ul>
				</li>
                <!--
				<li><a href="#">
					<img src="images/icons/grey/book.png">
					<span>Link</span></a>
				</li>				
				<li><a href="#">
					<img src="images/icons/grey/magnifying_glass.png">
					<span>Search</span>
					<span class="icon">&nbsp;</span></a>
					<div class="drop_box round_all">
						<form style="width:210px">
							<input class="round_all" value="Search...">
							<button class="send_right">Go</button>
						</form>
					</div>
				</li>			
                -->	
				<li><a href="logout.php">
					<img src="images/icons/grey/key.png">
					<span>Log Out</span>
                    <!--
					<span class="icon">&nbsp;</span></a>
					<div class="drop_box round_all">
						<form style="width:160px">
							<fieldset class="grid_8">
								<label>Email</label><input class="round_all" value="name@example.com">
							</fieldset>
							<fieldset class="grid_8">
								<label>Password</label><input class="round_all" type="password" value="password">
							</fieldset>
							<button class="send_right">Login</button>
						</form>
					</div> -->
				</li>				
			</ul>
			<a href="#" class="minimize round_bottom"><span>minimize</span></a>
		</div>
		
		<div id="main" class="grid_13 omega">
		  <div class="content round_all clearfix">
    		<div id="map-canvas" style="width: auto; height: 300px"></div>
			<!--
            <div class=""></div>
		    <p>hehe</p>
			</div> -->
		</div>
 </body>
</html>
