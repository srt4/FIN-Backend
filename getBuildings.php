<?php
 	include 'FINsert/config.php';
	include 'FINsert/opendb.php';

    // added ternaries for defaulting to UW coordinates if lat/lon isn't passed - useful for outdated clients
	$lat = isset($_REQUEST['lat']) ? $_REQUEST['lat'] : 47654799;
	$long = isset($_REQUEST['lon']) ? $_REQUEST['lon'] : -122307776;
	$rad = 9999; // over 9000?!?!?!
	
	$query=  "SELECT DISTINCT t.latitude, t.longitude, t.bid, t.name, fid, fnum, f.name as floors\n"
		. "FROM buildings t, floors f\n"
		. "WHERE t.bid = f.bid\n";
		. "AND $lat > (t.latitude - $rad) AND $lat < (t.latitude + $rad) \n"
		. "AND $long > (t.longitude - $rad) AND $long < (t.longitude + $rad) \n";
		. "ORDER BY t.bid, fnum DESC;";
	
	$results = mysql_query($query);
	
	if (!$results) {
		die("Error, could not query the db! " . mysql_error());
	}
	
	$building_json = array(); 
	while ($row = mysql_fetch_assoc($results)) {
		if ($building_json[(string)$row["bid"]] == null) {
			$building_json[(string)$row["bid"]] = array(
	        'bid' => (int) $row["bid"],
			'lat' => (int) $row["latitude"],
			'long' => (int) $row["longitude"],
			'name' => (string) $row["name"],
			'fid' => array((int)$row["fid"]),
			'floor_names' => array($row["floors"]),
			);    
		} else { // just adding floors to the building
			$building_json[(string)$row["bid"]]["fid"][] = (int)$row["fid"];
			$building_json[(string)$row["bid"]]["floor_names"][] = $row["floors"];
		}
	}
	
	$final_json;
	//foreach to get rid of the BID indexes
	foreach ($building_json as $building) {
		$final_json[] = $building;
	}
	$building_json = $final_json;
	
	$output = json_encode($building_json);
	print $output;
    include 'FINsert/closedb.php';
?>
