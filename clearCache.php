<?php
	
	//clears the update cache
	$sql = "DELETE FROM update_cache WHERE creation_time < DATE_SUB(NOW(), INTERVAL 1 HOUR)";
	$result = mysql_query($sql);
	if (!$result) {
		die("Error, could not query the db! " . mysql_error());
	}
	
	//clears the logged in cache
	$sql = "DELETE FROM logged_in_cache WHERE creation_time < DATE_SUB(NOW(), INTERVAL 6 HOUR)";
	$result = mysql_query($sql);
	if (!$result) {
		die("Error, could not query the db! " . mysql_error());
	}
?>