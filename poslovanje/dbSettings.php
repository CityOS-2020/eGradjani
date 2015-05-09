<?php
	$username='klikinfo_klik';
	$password='kenshin';
	//db connection string
	$con = mysql_connect('localhost', $username, $password);
	if (!$con) { die('Could not connect: ' . mysql_error()); }
	//db select
	mysql_select_db("klikinfo_hacatron", $con);

?>