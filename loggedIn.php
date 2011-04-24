<?php
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	include 'clearCache.php';
	
	$phone = mysql_real_escape_string($_REQUEST["phone_id"]);
	$q = mysql_query("SELECT * FROM logged_in_cache WHERE phone_id = '$phone'");
	if (!$q) {
		die(mysql_error());
	}
	if (mysql_num_rows($q) == 1) {
		$row = mysql_fetch_array($q);
		print("Already logged in as ".$row["username"].".");
	} else {
		print("Not logged in.");
	}
	
	include 'FINsert/closedb.php';
?>
