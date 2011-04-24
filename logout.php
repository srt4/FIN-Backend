<?php
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	include 'clearCache.php';
	
	$phone = mysql_real_escape_string($_REQUEST["phone_id"]);
	
	$q = mysql_query("DELETE FROM logged_in_cache WHERE phone_id = '$phone'");
	if (!$q) {
		die(mysql_error());
	} else {
		print("Logged out.");
	}
?>
