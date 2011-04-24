<?php
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	include 'clearCache.php';
	
	$phone = mysql_real_escape_string($_REQUEST["phone_id"]);
	$username = mysql_real_escape_string($_REQUEST["username"]);
	$userpass = mysql_real_escape_string($_REQUEST["userpass"]);
	
	$q = mysql_query("SELECT * FROM logged_in_cache WHERE phone_id = '$phone'");
	if (!$q) {
		die(mysql_error());
	}
	if (mysql_num_rows($q) >= 1) {
		die("Already logged in.");
	}
	
	$pass = md5($userpass);
	$q = mysql_query("SELECT * FROM super_users WHERE name = '$username' AND password = '$pass'");
	
	if (!$q) {
		die(mysql_error());
	}
	
	if (mysql_num_rows($q) != 1) {
		die("log in error, invalid username or password");
	}
	
	$q = mysql_query("INSERT INTO logged_in_cache (phone_id, username) VALUES ('$phone', '$username')");
	
	if (!$q) {
		die(mysql_error());
	}
	print("You have logged in");
	
	include 'FINsert/closedb.php';
?>