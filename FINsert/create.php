<?php
/*
	Team: FIN
	Author: Dustin Abramson

  create.php creates an entry in the database given the information passed in.
  
  For every object you are creating you will need the parameter category
  @param category : the category of the object you would like to create
  Individual types of objects, however, will require additional parameters as
  dictated below.
  
  If creating a region you'll pass in the parameters:
  @param latitude : The latitude of the geographic point you would like the region to be placed at.
  @param longitude : The longitude of the geographic point you would like the region to be placed at.
  The format for both latitude and longitude is the standard dictation of degrees latitude in decimal form *
  10 ^ 6 and as an int. It's the same standard google uses for storing their geopoints.
  
  If creating a building pass in
  @param name : The name of the building you would like to create
  @param latitude : same as region
  @param longitude : same as region
  
  If creating a floor pass in
  @param bid : The Building ID of the building you want to add the floor to.
  @param name : The name desired for the floor
  @param fnum : A floor number that dictates where the building is in relation to other floors in the building
  in order to order floors correctly it would be best if the floor number for floor 1 is less than the floor
  number for floor 2 etc...
  
  If createing a school supplies location pass in
  @param special_info: Can be the name of the location or what it containts, can also be left blank
  @param bb : you should pass "bb" in for this parameter if the location contains a blue book, the empty string otherwise
  @param sc : you should pass "sc" in for this parameter if the location contains a scantron, the empty string otherwise
  @param print : you should pass "print" in for this parameter if this location allows printing, the empty string otherwise
  If inside of a building you must also pass
  @param fid : The floor id of the floor where you would like to place the school supply location
  If outside of a building
  @param latitude : same as region
  @param longitude : same as region
  
  If creating a standard categorical item (currently coffee, dining, restrooms, vending... etc) pass in
  @param special_info: Could be the name of a coffee place or dining place, or special information about it
  being a male or female only bathroom. Whatever it is this string must at max be 255 characters. If greater
  create.php will fail.
  If adding inside a building you must also pass
  @param fid : The floor id of the floor where you would like to place the object.
  If outside of a building
  @param latitude : same as region
  @param longitude : same as region
*/
  
	include 'config.php';
	include 'opendb.php';

	$category = mysql_real_escape_string($_REQUEST["category"]);
	$phone = mysql_real_escape_string($_REQUEST["phone_id"]);
	$finsert = "".$_REQUEST["finsert"];
	$username = "finsert";
	
	if ($finsert != "finsert") {
		$q = mysql_query("SELECT * FROM logged_in_cache WHERE phone_id = '$phone'");
		if (!$q) {
			die(mysql_error());
		}
		if (mysql_num_rows($q) != 1) {
			die("Not logged in.");
		}
		$row = mysql_fetch_array($q);
		$username = "".$row["username"];
	}
	
	//inserting regions
	if ($category == "regions") {
		$latitude = mysql_real_escape_string($_REQUEST["latitude"]);
		$longitude = mysql_real_escape_string($_REQUEST["longitude"]);
		$theQuery = mysql_query("INSERT INTO regions (latitude, longitude) VALUES ($latitude, $longitude);");
		if (!$theQuery) {
			die("Error, could not query the db! " . mysql_error());
		}
		print("New Region added to database successfully with values: Latitude = $latitude ".
			"and Longitude = $longitude");
	//inserting buildings
	} else if ($category == "buildings") {
		$name = mysql_real_escape_string($_REQUEST["name"]);
		$latitude = mysql_real_escape_string($_REQUEST["latitude"]);
		$longitude = mysql_real_escape_string($_REQUEST["longitude"]);
		$bid = generateIdCode($latitude, $longitude);
		$rid = determineRegion($latitude, $longitude);
		//submit database entry
		$theQuery = mysql_query("INSERT INTO buildings VALUES ($bid, $rid, '$name', $latitude, $longitude);");
		if (!$theQuery) {
			die("Error, could not query the db! " . mysql_error());
		}
		
		print("$name added to database successfully with values: Latitude = $latitude ".
			"Longitude = $longitude");
		
	//inserting floors
	} else if ($category == "floors") {
		$bid = mysql_real_escape_string($_REQUEST["bid"]);
		$name = mysql_real_escape_string($_REQUEST["name"]);
		$number = mysql_real_escape_string($_REQUEST["number"]);
		//$fid = (31 * $bid + $number) % 100000000;
		$theQuery = mysql_query("INSERT INTO floors (bid, fnum, name) VALUES ($bid, $number, '$name');");
		if (!$theQuery) {
			die("Error, could not query the db! " . mysql_error());
		}
		print("You've successfully inserted $name floor into the building of choice as well as these values".
		" Floor Name = $name Floor Number = $number");

	//inserting school supplies
	} else if ($category == "school_supplies") {
		$fid = mysql_real_escape_string($_REQUEST["fid"]);
		$special_info = mysql_real_escape_string($_REQUEST["special_info"]);
		$bb = 0;
		$sc = 0;
		$print = 0;
		if ($_REQUEST["bb"] == "bb") {
				$bb = 1;
		}

		if ($_REQUEST["sc"] == "sc") {
			$sc = 1;
		}
		
		if ($_REQUEST["print"] == "print") {
			$print = 1;
		}
		//inside of a building
		if($fid != 0) {
			$theQuery = mysql_query("SELECT * FROM buildings, floors WHERE floors.bid = buildings.bid AND floors.fid = $fid;");
			if (!$theQuery) {
				die("Error, could not query the db! " . mysql_error());
			}
			$row = mysql_fetch_array($theQuery);
			$q = mysql_query("INSERT INTO $category (rid, latitude, longitude, special_info, fid, not_found_count, blue_book, scantron, printing, username)".
				"VALUES (".$row["rid"].", ".$row["latitude"].", ".$row["longitude"].", '$special_info', $fid, 0, $bb, $sc, $print, '$username');");
			if (!$q) {
				die("Error, could not query the db! " . mysql_error());
			}
			print("You've successfully inserted an item in ".$category.".");
		//outside of a building
		} else {
			$latitude = mysql_real_escape_string($_REQUEST["latitude"]);
			$longitude = mysql_real_escape_string($_REQUEST["longitude"]);
			$rid = determineRegion($latitude, $longitude);
			$q = mysql_query("INSERT INTO $category (rid, latitude, longitude, special_info, fid, not_found_count, blue_book, scantron, printing, username)".
				"VALUES ($rid, $latitude, $longitude, '$special_info', 0, 0, $bb, $sc, $print, '$username');");
			if (!$q) {
				die("Error, could not query the db! " . mysql_error());
			}
			print("You've successfully created a $category type outside of a building.");
		}
		
	//Add any other of the categorical items.
	} else {
		$special_info = mysql_real_escape_string($_REQUEST["special_info"]);
		
		$fid = mysql_real_escape_string($_REQUEST["fid"]);
		//inside of a building
		if($fid != 0) {
			$theQuery = mysql_query("SELECT * FROM buildings, floors WHERE floors.bid = buildings.bid AND floors.fid = $fid;");
			if (!$theQuery) {
				die("Error, could not query the db! " . mysql_error());
			}
			$row = mysql_fetch_array($theQuery);
			$q = mysql_query("INSERT INTO $category (rid, latitude, longitude, special_info, fid, not_found_count, username)".
				" VALUES (".$row["rid"].", ".$row["latitude"].", ".$row["longitude"].", '$special_info', $fid, 0, '$username');");
			if (!$q) {
				die("Error, could not query the db! " . mysql_error());
			}
			print("You've successfully inserted an item in ".$category.".");
		//outside of a building
		} else {
			$latitude = mysql_real_escape_string($_REQUEST["latitude"]);
			$longitude = mysql_real_escape_string($_REQUEST["longitude"]);
			$rid = determineRegion($latitude, $longitude);
			$q = mysql_query("INSERT INTO $category (rid, latitude, longitude, special_info, fid, not_found_count, username)".
				"VALUES ($rid, $latitude, $longitude, '$special_info', 0, 0, '$username');");
			if (!$q) {
				die("Error, could not query the db! " . mysql_error());
			}
			print("You've successfully created a $category type outside of a building.");
		}
	}
	
	
	//Given the latitude and longitude it will return the region id nearest that position.
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
	
	//returns the id code for a latitude and longitude point
	function generateIdCode($lat, $long) {
		$prime = 31;
		$result = 1;
		$result = $prime * $result + $lat;
		$result = $prime * $result + $long;
		return $result;
	}
/*
	//returns the id code for a latitude, longitude, and floor point
	function generateIdCodeWithFloor($lat, $long, $theFloor) {
		$prime = 31;
		$result = 1;
		$result = $prime * $result + $lat;
		$result = $prime * $result + $long;
		$result = $prime * $result + $theFloor;
		return $result;
	}
	
	function generateIdCodeWithFloorAndName($lat, $long, $theFloor, $theName) {
		$prime = 31;
		$result = 1;
		$result = $prime * $result + $lat;
		$result = $prime * $result + $long;
		$result = $prime * $result + $theFloor;
		$result = $prime * $result + $theName;
		return $result;
	}
*/
	
	include 'closedb.php';
?>
