<?php
	# This getLocations file accepts parameters from an HTTP request and 
	# returns information from the FIN database in JSON array or throws a MYSQL error
	# @param: cat = category which matches a table name in DB
	# @param: lat = latituude around which to search
	# @param: long = longitude around which to search
	# @param(optional): item = required when category is "supplies"
	# author: Jillyn J.
	
    include 'FINsert/config.php';
	include 'FINsert/opendb.php';

    $cat = "";
    $lat = 0;
    $long = 0;

	# retrieve and save parameters sent in HTTP request
	$cat = html_entity_decode($_REQUEST["cat"]);
	$lat = html_entity_decode($_REQUEST["lat"]);
	$long = html_entity_decode($_REQUEST["long"]);

	$output = "";
	
	# For any category other than special-case "supplies"
	if ($cat != "school_supplies") {
	
		#query the database for locations associated with buildings
		$results = mysql_query("SELECT DISTINCT t.latitude, t.longitude, t.id, t.special_info, fnum, f.name as \"floor\"\n"
			    . "FROM $cat t, floors f, regions\n"
			    . "WHERE t.fid = f.fid AND t.rid IN (SELECT rid FROM regions WHERE $lat > regions.latitude - 6020 AND $lat ".
						"< regions.latitude + 6020 AND $long > (regions.longitude - 6020) AND $long < (regions.longitude + 6020))\n"
			    . "ORDER BY fnum DESC, t.special_info;");
		if (!$results) {
		    die("Error, could not query the db! " . mysql_error());
		}
		
		$output = "[";
		$row = mysql_fetch_assoc($results);
		
		$hasEntry = false; #have we encoded a row into output yet? used for commas in output
		$id = "";
		if ($row) {
			if ($hasEntry) {
				$output = $output . ",";
			}
		    $output = $output."{\"lat\":".$row["latitude"].",\"long\":".$row["longitude"].",\"id\":".$row["id"].",\"info\":\"".$row["special_info"]."\",\"floor_names\":[\"".$row["floor"]."\"";
		    $id = $row["id"];
		    $row = mysql_fetch_assoc($results);
			$hasEntry = true;
		
			while ($row) {
		        #if output has already been generated for this location, just add floor
				if ($row["id"] == $id) {
		            $output = $output . ",\"" . $row["floor"] . "\"";
		        } else {
		            $output = $output."]}, {\"lat\":".$row["latitude"].",\"long\":".$row["longitude"].",\"id\":".$row["id"].
		                       ",\"info\":\"".$row["special_info"]."\",\"floor_names\":[\"".$row["floor"]."\"";
		        }
		        $id = $row["id"];
		        $row = mysql_fetch_assoc($results);
			}
		
			$output = $output . "]}";
		}
		
		#query the database for locations not related to buildings
		$results = mysql_query("SELECT DISTINCT t.latitude, t.longitude, t.id, t.special_info\n"
			    . "FROM $cat t, regions\n"
			    . "WHERE t.fid = 0 AND t.rid IN (SELECT rid FROM regions WHERE $lat > regions.latitude - 6020 AND $lat ".
						"< regions.latitude + 6020 AND $long > (regions.longitude - 6020) AND $long < (regions.longitude + 6020))\n"
			    . "ORDER BY t.special_info;");
		if (!$results) {
		    die("Error, could not query the db for objects outside buildings! " . mysql_error());
		}
				
		$row = mysql_fetch_assoc($results);
		if ($row) {
			while ($row) {
		        if ($hasEntry) {
					$output = $output . ",";
				}
		        $output = $output."{\"lat\":".$row["latitude"].",\"long\":".$row["longitude"].",\"id\":".$row["id"].",\"info\":\"".$row["special_info"]."\",\"floor_names\":[]}";
		        $row = mysql_fetch_assoc($results);
		        $hasEntry = true;
			}
		}
		$output = $output . "]";
				
	} else { #must be "suplies" category
	
		$item = html_entity_decode($_REQUEST["item"]);
	
		#query for supplies locations related to buildings
		$results = mysql_query("SELECT DISTINCT t.latitude, t.longitude, t.id ,t.special_info, fnum, f.name as \"floor\"\n"
				    . "FROM school_supplies t, floors f, regions\n"
				    . "WHERE $item > 0 AND t.fid = f.fid AND t.rid IN (SELECT rid FROM regions WHERE $lat > regions.latitude - 6020 AND $lat ".
							"< regions.latitude + 6020 AND $long > (regions.longitude - 6020) AND $long < (regions.longitude + 6020))\n"
				    . "ORDER BY fnum DESC, t.special_info;");
		if (!$results) {
		    die("Error, could not query the db for supplies! " . mysql_error());
		}
			
		$output = "[";
		$row = mysql_fetch_assoc($results);
		$hasEntry = false;
		$id = "";
		
		if ($row) {
			if ($hasEntry) {
				$output = $output . ",";
			}
		    $output = $output."{\"lat\":".$row["latitude"].",\"long\":".$row["longitude"].",\"id\":".$row["id"].",\"info\":\"".$row["special_info"]."\",\"floor_names\":[\"".$row["floor"]."\"";
		    $id = $row["id"];
		    $row = mysql_fetch_assoc($results);
			$hasEntry = true;
		
			while ($row) {
				#if output has already been generated for this location, just add floor
		        if ($row["id"] == $id) {
		            $output = $output . ",\"" . $row["floor"] . "\"";
		        } else {
		            $output = $output."]}, {\"lat\":".$row["latitude"].",\"long\":".$row["longitude"].",\"id\":".$row["id"].
								",\"info\":\"".$row["special_info"]."\",\"floor_names\":[\"".$row["floor"]."\"";
		        }
		        $id = $row["id"];
		        $row = mysql_fetch_assoc($results);
			}
		
			$output = $output . "]}";
		}
		
		#query database for locations not associated with a building
		$results = mysql_query("SELECT DISTINCT t.latitude, t.longitude, t.id ,t.special_info\n"
				    . "FROM school_supplies t, regions\n"
				    . "WHERE $item > 0 AND t.fid = 0\n"
				    . "ORDER BY t.special_info;");

		if (!$results) {
		    die("Error, could not query the db for objects outside buildings! " . mysql_error());
		}
				
		$row = mysql_fetch_assoc($results);
		if ($row) {
			while ($row) {
		        if ($hasEntry) {
					$output = $output . ",";
				}
		        $output = $output."{\"lat\":".$row["latitude"].",\"long\":".$row["longitude"].",\"id\":".$row["id"].",\"info\":\"".$row["special_info"]."\",\"floor_names\":[]}";
		        $row = mysql_fetch_assoc($results);
		        $hasEntry = true;
			}
		}
		$output = $output . "]";
	}

	#set output as response text
    print($output);
	include 'FINsert/closedb.php';
?>
