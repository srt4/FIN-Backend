<?php
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	include 'clearCache.php';

	$phone = mysql_real_escape_string($_REQUEST["phone_id"]);
	$category = mysql_real_escape_string($_REQUEST["category"]);
	$id = mysql_real_escape_string($_REQUEST["id"]);
	
	$q = mysql_query("SELECT * FROM logged_in_cache WHERE phone_id = '$phone'");
	if (!$q) {
		die(mysql_error());
	}
	if (mysql_num_rows($q) == 1) {
		$row = mysql_fetch_array($q);
		$username = "".$row["username"];
		
		$q = mysql_query("SELECT * FROM $category WHERE id = $id");
		if(!$q) {
			die("select".mysql_error());
		}
		$row = mysql_fetch_array($q);
		if (!$row) {
			die("Item doesn't exist");
		}
		$q = mysql_query("INSERT INTO delete_log (creator, not_found_count, username) VALUES ('".$row["username"]."', ".$row["not_found_count"].", '$username');");
		if(!$q) {
			die("delete log".mysql_error());
		}
		$q = mysql_query("DELETE FROM $category WHERE id = $id");
		if(!$q) {
			die(mysql_error());
		}
		print("Deleted Successfully");
	} else {
		print("Not logged in.");
	}

	include 'FINsert/closedb.php';
?>