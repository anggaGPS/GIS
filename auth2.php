<?php
	include('koneksi.php');
	//session_start();
	//tangkap data dari form login
	$NIP = $_POST['NIP'];
	$password = $_POST['password'];
	

	

	
	echo " NIP = ".$NIP." dan Password = ".$password;
	$q = mysql_query("SELECT * FROM user WHERE NIP='$NIP' AND password='$password' "); 
	if (mysql_num_rows($q) == 1) {
		//kalau username dan password sudah terdaftar di database
		header('location:dashboard2.php');
	}else{
		header('location:user.php');
	}
?>

