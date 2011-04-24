<?php
/*

Author: Dustin Abramson
Team: FIN

Parameters
Name: "cat" Value: the category you would like to search
Name: "lat" Value: the latitude in the normal integer format (can be the basic UW
I don't care just the general area of where you would like to search).
Name: "long" Value: the longitude in the normal integer format
Name: "sString" Value: The string to search.

Return Values
The way it works is that it will search the database special info column (case insensitively)
to see if any of them contain the substring "sString" if one does and it is in a region that
is close to the latitude and longitude sent.

If there are no entries that match it will return "No entries found matching your search parameters."

Otherwise it will return a string containing all of the id's + their latitude and longitude that
match those set of conditions in ascending order (by id). For Example if the "cat" was "vending" and your
"sString" was snack on the UW campus the return string would be:
"11,47656582,-122309098,12,47654799,-122307776,13,47656629,-122307181,19,47656465,-122310287,... etc
*/

	include 'FINsert/config.php';
	include 'FINsert/opendb.php';

	$cat = html_entity_decode($_REQUEST["cat"]);
	$lat = html_entity_decode($_REQUEST["lat"]);
	$long = html_entity_decode($_REQUEST["long"]);
	$sString = html_entity_decode($_REQUEST["sString"]);
	$cat = mysql_real_escape_string($cat);
	$lat = mysql_real_escape_string($lat);
	$long = mysql_real_escape_string($long);
	$sString = mysql_real_escape_string($sString);
	
	$q = mysql_query("SELECT id, latitude, longitude FROM $cat x, (SELECT rid FROM regions WHERE $lat > regions.latitude - 6020 AND $lat ".
		"< regions.latitude + 6020 AND $long > (regions.longitude - 6020) AND $long < (regions.longitude + 6020)) y ".
		"WHERE x.rid = y.rid AND special_info LIKE '%$sString%' ORDER BY id;");
	if (!q) {
		die("Search Error, could not query the db! " . mysql_error());
	}
	
	$row = mysql_fetch_array($q);
	if($row) {
		print("".$row["id"].",".$row["latitude"].",".$row["longitude"]);
	} else {
		print("No entries found matching your search parameters.");
	}
	
	while($row = mysql_fetch_array($q)) {
		print(",".$row["id"].",".$row["latitude"].",".$row["longitude"]);
	}
	
	
	function determineRegion($lat, $long) {
		//conversion values
		$MILES_PER_DEGREE_LONGITUDE = 46.574;
		$MILES_PER_DEGREE_LATITUDE = 69.04;
		
		//create query
		$setup = sprintf("SELECT * FROM regions WHERE $lat > regions.latitude - 6020 AND $lat ".
		"< regions.latitude + 6020 AND $long > regions.longitude - 6020 AND $long < regions.longitude + 6020;");
		$q = mysql_query($setup);
		if (!$q) {
			die("Error, could not query the db! " . mysql_error());
		}
		
		$row = mysql_fetch_array($q);
		if (!$row) {
			die("The location you are attempting to input is outside the range covered.");
		}
		$minRid = $row["rid"];
		$minDist = 200.0;
		
		//determines nearest region
		while ($row) {
			$latDiff = ((abs($lat - $row["latitude"])) /1000000.0) * $MILES_PER_DEGREE_LATITUDE;
			$longDiff = ((abs($long - $row["longitude"]))/1000000.0) * $MILES_PER_DEGREE_LONGITUDE;
			$distance = sqrt($latDiff * $latDiff + $longDiff * $longDiff);
			if($distance < $minDist) {
				$minRid = $row["rid"];
				$minDist = $distance;
			}
			$row = mysql_fetch_array($q);
		}
		return $minRid;
	}
	
	include 'FINsert/closedb.php';
?>