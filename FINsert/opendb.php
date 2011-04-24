<?php
	/*
	Team: FIN
	Author: Dustin Abramson
	
	opens a database connection and selects the database specified in config.php
	*/

	$db = mysql_connect($dbhost, $dbuser, $dbpassword);
	if (!$db) {
		die("Error, could not connect to server!" . mysql_error());
	}
		
	if (!mysql_select_db($dbname)) {
		die("Error, could not choose the db! " . mysql_error());
	}
?>