<?php

// SQL connection stuff
include 'FINsert/config.php';
include 'FINsert/opendb.php';

// return an ordered list of universities based on proximity? 
// or one alphabetically, independent of of lat/lon
if (isset($_REQUEST["lat"])) $lat = $_REQUEST["lat"];
if (isset($_REQUEST["lon"])) $lon = $_REQUEST["lon"];

// select all fields from all universities on campus
$query = "SELECT * " .
	 "FROM universities u ORDER BY u.name ASC " .
	 "LIMIT 0, 100 ";

$result = mysql_query($query);

// Check for errors
if (!$result) die("Mysql encountered an error: " . mysql_error());

// Instantiate the JSON  which will soon get outputted
$university_json; 

// Go through every row and add it to the json
while ($row = mysql_fetch_assoc($result)) {
	$university_json[] = array (
		'uni_id' => (int) $row['uni_id'],
		'name' => (string) $row['name'],
		'lat' => (int) $row['latitude'],
		'lon' => (int) $row['longitude'],
	);
}

// x = change(x) ... 
$university_json = json_encode($university_json);

// and then print it
print $university_json;

?>
