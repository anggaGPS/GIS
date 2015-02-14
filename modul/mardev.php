<?php
/**
 * Telkomsel Web Analyzer for Mobile Advertising Website
 *
 * PHP version 4 and 5
 *
 * LICENSE: This source file is recoded and modified by Firmansyah Wahyudiarto 
 * SOURCE DESIGN : THEME FOREST, SOURCE CODE : manually written (not hard code)
 * THANKS TO PFT ASSISTANT, GOOGLE TECHNOLOGY, LOKOMEDIA TEAM, OPENWEBANALYTICS, ITTELKOM, and much more
 * TECHNOLOGY : XHTML, PHP, JQUERY, CSS, MySQL, AJAX, JavaScript, GOOGLE MAPS JAVASCRIPT API, ANALYTICS API
 *
 * @author     Firmansyah Wahyudiarto - 2011
 * @copyright  FIRCOMLABS IT Solutions - http://firmansyah.web.id
 */
 
//include "../../include/koneksi.php";
 
 
 // =============================== SEMANGAAAAAAAATTTTTTTTTTT FIRMAAAANNNNN!!!!!!! =============================
 
 
// INI UNTUK MENU HELP
if ($_GET[tsel]=='about'){
	include "about.php";
}elseif ($_GET[tsel]=='help'){
	include "help.php";
}
// INI UNTUK MENU TOOLS
elseif ($_GET[tsel]=='import'){
	include "./import/form_import.php";
}
elseif ($_GET[tsel]=='backup'){
	include "../dump.php";
}
elseif ($_GET[tsel]=='restore'){
	include "./restore_db.php";
}
else
echo "<center><h2>WELCOME, MICRO DEMAND WARRIOR<h2></center>";
?>