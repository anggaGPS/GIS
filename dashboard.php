<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Bencana </title>
<link href="css.css" rel="stylesheet" type="text/css" />

	<script src="./lib/jquery.min.js"></script>
	<script src="./lib/highcharts.js"></script>
	<script src="./lib/modules/exporting.js"></script>
	
	<link rel="stylesheet" href="style.css" />
	<link rel="shortcut icon" href="google-map.png" type="images/google-map.png">
		
	<?php include "koneksi.php";?>
	
</head>

<body>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="left" valign="top"><table width="780" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="background-image:url(images/index_02a.gif); background-repeat:repeat-x; padding-top:2px;"><table width="780" height="20" border="0" cellspacing="0" cellpadding="0">
          <tr>
            
			<td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=home">Home</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=home"><img src="images/Book.png" width="34" height="30" alt="?page=home" /></td>
              </tr>
            </table>
			</td>

            <td width="2" align="center" valign="top"><img src="images/index_02b.gif" alt="" width="2" height="46" /></td>
            <td width="130" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=data-bencana">Data Bencana</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=data-bencana"><img src="images/Clipboard.png" width="36" height="30" alt="?page=data-bencana" /></td>
              </tr>
            </table>
			</td>

			<td width="2" align="center" valign="top"><img src="images/index_02b.gif" alt="" width="2" height="46" /></td>
            <td width="130" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=data-provinsi">Data Provinsi</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=data-provinsi"><img src="images/Compas.png" width="36" height="30" alt="?page=data-provinsi" /></td>
              </tr>
            </table>
			</td>

						
            <td width="2" align="center" valign="top"><img src="images/index_02b.gif" alt="" width="2" height="46" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=info-bencana">Info Bencana</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=info-bencana"><img src="images/Watches.png" width="36" height="30" alt="?page=info-bencana" /></td>
              </tr>
            </table>
			</td>
			
            
			<td width="2" align="center" valign="top"><img src="images/index_02b.gif" alt="" width="2" height="46" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=statistik">Statistik</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=statistik"><a href="?page=statistik"><img src="images/Infinity-Loop.png" width="36" height="30" alt="?page=statistik" /></td>
              </tr>
            </table>
			</td>
			
			
			<td width="2" align="center" valign="top"><img src="images/index_02b.gif" alt="" width="2" height="46" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=peta26">Peta</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="modul/?page=isi_gmaps"><img src="images/Retina-Ready.png" width="36" height="30" alt="?page=peta26" /></td>
              </tr>
            </table>
			</td>
			<td width="2" align="center" valign="top"><img src="images/index_02b.gif" alt="" width="2" height="46" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="modul/isi_gmaps.php">DSS</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="modul/?page=isi_gmaps"><img src="images/Map.png" width="36" height="30" alt="modul/isi_gmaps.php" /></td>
              </tr>
            </table>
			</td>

			            
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top">
            <div style="float:left; width:780px;">
              <div style="float:left; width:489px;"><img src="images/index_29.png" alt="" width="780" height="100" border="0" usemap="#Map" /></div>
             
            </div>
			
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-top:36px;"><table width="780" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="526" height="160" align="left" valign="top">
		
		<!--content web-->
		<?php error_reporting(E_ALL & ~E_NOTICE);
		$pg = htmlentities($_GET['page']);	
		$file ="$pg.php";
		if (!file_exists($file)) {
			include ("home.php");
		}else if($pg=="" || $pg=="home"){
			include ("home.php");
		}else{
			include ("$pg.php");
		}
		?>
		
		</td>
      </tr>
    </table></td>
  </tr>
  
 
  <tr>
    <td align="left" valign="top" style="padding-top:15px;"><table width="780" border="0" cellspacing="0" cellpadding="0" style="background-image:url(images/index_02b.gif); background-repeat:repeat-x;">
      <tr>
        <td align="center" valign="middle"><pre class="menu"><a href="index.php">Home</a>     |    <a href="content.html"> About us</a>     |     <a href="content.html">Service</a>     |     <a href="content.html">Faq</a>     |     <a href="content.html">Company</a>     |     <a href="contact.html">Contact us</a> </pre></td>
      </tr>
	  <div style="float:left; width:780px;">
              <div style="float:left; width:489px;"><img src="images/footer.png" alt="" width="780" height="5" border="0" usemap="#Map" /></div>
             
            </div>
      <tr>
        <td align="center" valign="middle" class="copyright">enterprise support system </td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">

