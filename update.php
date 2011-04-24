<?php
/*
	Team: FIN
	Author: Dustin Abramson
	
	update.php modifies the database by incrementing the not found count of the object passed in specified by
	@param category : The category of the item you want to update
	@param id : The unique id of the item you want to update
*/

	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	include 'clearCache.php';
	
	$phone = mysql_real_escape_string($_REQUEST["phone_id"]);
	$category = mysql_real_escape_string($_REQUEST["category"]);
	$id = mysql_real_escape_string($_REQUEST["id"]);
	
	$q = mysql_query("SELECT * FROM update_cache WHERE phone_id = '$phone' AND category = '$category' AND id = $id;");
	if (!q) {
		die("Lookup Error, could not query the db! " . mysql_error());
	}
	
	$row = mysql_fetch_row($q);
	if (!$row) {
		$q = mysql_query("INSERT INTO update_cache (phone_id, category, id) VALUES ('$phone', '$category', $id);");
		if(!$q) {
			die("Insertion Error, could not query the db! " . mysql_error());
		}
		
		$q = mysql_query("UPDATE $category SET not_found_count = not_found_count + 1 WHERE id = $id;");
		if(!$q) {
			die("Increment Error, could not query the db! " . mysql_error());
		}

		print("We've entered your input in our database.");
	} else {
		die("You have already entered this information within the last hour.");
	}
	include 'FINsert/closedb.php';
?>