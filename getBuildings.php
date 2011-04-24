<?php
 	include 'FINsert/config.php';
	include 'FINsert/opendb.php';
	
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      }
    
    // added ternaries for defaulting to UW coordinates if lat/lon isn't passed - useful for outdated clients
	$lat = isset($_REQUEST['lat']) ? $_REQUEST['lat'] : 47654799;
	$long = isset($_REQUEST['lon']) ? $_REQUEST['lon'] : -122307776;
	$rad = 9999; // over 9000?!?!?!
	
	$output = "";
	
	// added lat long filtering for multi-region support - 4/12
	$query=  "SELECT DISTINCT t.latitude, t.longitude, t.bid, t.name, fid, fnum, f.name as floors\n"
		    . "FROM buildings t, floors f\n"
		    . "WHERE t.bid = f.bid\n";
	// Not necessary anymore, if ( isset($_REQUEST['lat']) && isset($_REQUEST['lon']) ) {
	$query .= "AND $lat > (t.latitude - $rad) AND $lat < (t.latitude + $rad) \n"
			. "AND $long > (t.longitude - $rad) AND $long < (t.longitude + $rad) \n";
	//} 
	$query .= "ORDER BY t.bid, fnum DESC;";
	
	$results = mysql_query($query);
	if (!$results) {
		die("Error, could not query the db! " . mysql_error());
	}


	$output = "[";
	$row = mysql_fetch_assoc($results);
	$id = "";
	if ($row) {
		$id = $row["bid"];
		$floors = ",\"floor_names\":[\"".$row["floors"]."\"";
		$floorID = ",\"fid\":[".$row["fid"];
	        $output = $output."{\"bid\":".$row["bid"].",\"lat\":".$row["latitude"].",\"long\":".$row["longitude"].",\"name\":\"".$row["name"]."\"";
	      $row = mysql_fetch_assoc($results);
		
	        while ($row) {
	               # print_r($row);
	            if ($row["bid"] == $id) {
	                 $floorID = $floorID . "," . $row["fid"];
			 $floors = $floors . ", \"" . $row["floors"] . "\"";
	            } else {
	                 $output = $output.$floorID."]".$floors."]}, {\"bid\":".$row["bid"].",\"lat\":".$row["latitude"].",\"long\":".$row["longitude"].",\"name\":\"".$row["name"]."\"";
	                 $floors = ",\"floor_names\":[\"".$row["floors"]."\"";
			 $floorID = ",\"fid\":[".$row["fid"];
		    }
		    $id = $row["bid"];
		    $row = mysql_fetch_assoc($results);
		}
		$output = $output .$floorID."]".$floors."]}]";
	} else {
	        $output = $output . "]";
	}
	
	
        //$jsonString = json_encode($output);
        //print($jsonString);
        
    // fix empty output for Chanel
    $output = $output == "[]" ? "" : $output;
    print($output);
    include 'FINsert/closedb.php';
?>
