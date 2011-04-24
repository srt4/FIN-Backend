<?php
	/*
		Team: FIN
		Author: Dustin Abramson
		
		gets the applicant usernames for a given location.
	*/
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	$location = $_REQUEST["location"];
	
	$q = mysql_query("SELECT * FROM applicants WHERE location = '".$location."';");
	if (!$q) {
		die("Error, could not query the db! " . mysql_error());
	}

	$name = "applicants[]";
	$type = "checkbox";
	while($row = mysql_fetch_array($q)) {
		$username = $row["name"];
		$email = $row["email"];
		print("<input type = '$type' name = '$name' value = $username><strong>Name:</strong> $username <strong>Email: $email</strong><br> ");
	}
	include 'FINsert/closedb.php';
?>