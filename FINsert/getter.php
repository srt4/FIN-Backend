<?php
	/*
	Team: FIN
	Author: Dustin Abramson
	
	Returns html information containing the floor names for all of the floors associated
	with the building that is specified with the unique @param building id.
	*/
	include 'config.php';
	include 'opendb.php';
	$bid = $_REQUEST["bid"];
	
	$q = mysql_query("SELECT * FROM floors WHERE floors.bid = ".$bid.";");
	if (!$q) {
		die("Error, could not query the db! " . mysql_error());
	}
	$row = mysql_fetch_array($q);

	while($row) {
		$fid = $row["fid"];
		$name = $row["name"];
		print("<option value = $fid>$name</option> ");
		$row = mysql_fetch_array($q);
	}
	include 'closedb.php';
?>