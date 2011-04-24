<?php
	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	
	/*
		Delete not found deletes all entries in the database with a not found count of 15 or greater.
		If you would like to change this value please change the value for the variable maxNotFoundBelow.
		
		If deleteNotFound.php was successful it should return Getting table names successful!
		Deletion of not Found elemets successful.
	*/
	
	$maxNotFound = 15; //Change this to change the setting for what the not found count has to be
					   //before deleting from the database.
					   
	$sql = "SHOW TABLES FROM $dbname";
	
	//get database tablenames
	$result = mysql_query($sql);	
	if (!$result) {
		echo "DB Error, could not list tables\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
	}
	$tables = array();
	$row = mysql_fetch_row($result);
	$name = "{$row[0]}";
	if ($name != "buildings" && $name != "regions" && $name != "floors") {
		$tables[] = "{$row[0]}";
	}

	while ($row = mysql_fetch_row($result)) {
		$name = "{$row[0]}";
		if ($name != "buildings" && $name != "regions" && $name != "floors") {
			$tables[] = "{$row[0]}";
		}
	}
	print("<p>Getting table names successful!</p>");
	mysql_free_result($result);
	
	$i = 0;
	$size = count($tables);
	for($i = 0; $i < $size; $i++) {
		$q = mysql_query("DELETE FROM ".$tables[$i]." WHERE not_found_count > $maxNotFound;");
		if (!$q) {
		die("Error, could not query the db! " . mysql_error());
		}
	}
	print("<p>Deletion of not found elements successful!</p>");
	
	include 'FINsert/closedb.php';
?>