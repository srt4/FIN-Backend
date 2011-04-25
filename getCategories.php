<?php

// SQL connection stuff
include 'FINsert/config.php';
include 'FINsert/opendb.php';

// select all fields from all universities on campus
$query = "SELECT name FROM categories";

$result = mysql_query($query);

// Check for errors
if (!$result) die("Mysql encountered an error: " . mysql_error());

// Instantiate the JSON  which will soon get outputted
$category_json; 

// Go through every row and add it to the json
while ($row = mysql_fetch_assoc($result)) {
	$category_json[] = $row['name'];
}
// x = change(x) ... 
$category_json = json_encode($category_json);

// and then print it
print $category_json;

?>
