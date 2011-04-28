
<?php

/**
 * getAllLocations.php - Find It Now
 *
 * Created March 17, 2011 by Spencer Thomas <srt4@uw.edu>
 *
 * This file gets all items at a given latitude, longitude,
 * and search radius. This will return JSON strings in plaintext
 * format to the browser/client. 
 */
$time_start = microtime(true); 
 
include "FINsert/config.php"; // get db credentials ...
include "FINsert/opendb.php"; // ... which are used to open the db

$cat; $long; $lat; $rad;

/**
 * $cat should be passed as a name-value pair using GET or POST. 
 * The value should be an array, condensed into the following form:
 * original array: [1,2,3,4,5]
 * $cat array    : "1 2 3 4 5"
 * Essentially, it is storing the array as a string
 */
$cat = html_entity_decode($_REQUEST["cat"]);
$cat_array = explode(" ", $cat);

// Radius isn't a required parameter, so it won't always be passed
if(isset($_REQUEST["rad"])) 
    $rad = html_entity_decode($_REQUEST["rad"]);
else 
    $rad = 0;

$building_id = isset($_REQUEST["building_id"]);

// Assume lat and long were submitted, otherwise this won't work
$lat = html_entity_decode($_REQUEST["lat"]);
$long = html_entity_decode($_REQUEST["long"]);

// Call and print the function if all parameters are passed
if ( isset($_REQUEST["lat"]) && isset($_REQUEST["long"]) 
                             && isset($_REQUEST["cat"]) ) {
    echo (get_object($lat, $long, $cat_array, $rad));
}

/** 
 * get_object function accepts a latitude, longitude, and
 * returns all items at and around that area
 * @lat: latitude in SQL format
 * @long: longitude in SQL format
 * @cat: (optional) item category - an "imploded" array delineated with |s
 * @radius: (optional) search radius (m) 
 * @returns: array, which can be turned into JSON
 */
function get_object($lat, $long, $cat, $rad) {
    // base case: a single element in the array
    if (is_array($cat) && count($cat) > 0) {
		$return_string = "";
		foreach ($cat as $cat_item) {
			$piece = get_single_category($lat, $long, $cat_item, $rad);
			if ($piece != "[]") // hack - don't return empty results
				$return_string .= $piece;
		}
		return $return_string;
    } 
}
function get_single_category($lat, $long, $cat, $rad) {
    $rad = $rad == 0 ? 1 : $rad; // Search the current building with radius = 0 
	switch ($cat) { 
		case "school_supplies": // special case
			$supplies_array = array ( 'blue_book', 'scantron', 'printing' );
			if ( $_REQUEST['item'] != null && $_REQUEST['item'] != "" ) {
				$supplies_array = array ( $_REQUEST['item'] );
			}
			$return_string;    
			foreach ($supplies_array as $supply) {
				$return_string .= get_single_category($lat, $long, $supply, $rad);
			}
			return $return_string;	
			break;
		default: // non-special cases    
			$query = "Select *, i.item_id as id, f.name as floor From testTable2 i "
			       . "Join categories c On i.cat_id = c.cat_id "
 			       . "Join floors f On i.fid = f.fid "
			       . "Where c.name = '$cat' limit 0, 100";	
			$result = mysql_query($query);
			if (!$result) {
				echo mysql_error();
				die ("MySQL encountered an error: " + mysql_error());
			}
			$json_array = array();
			$is_school_supply = ($cat == "blue_book" || $cat == "scantron" || $cat == "printing" );
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$item = $is_school_supply ? $cat : "";
				$cat2 = $is_school_supply ? "school_supplies" : $cat;
				$row_array = array( 'id'   => (int)$row['id'],
						    'lat'  => (int)$row['latitude'],
						    'long' => (int)$row['longitude'],
						    'info' => $row['special_info'],
						    'floor_names' => $row['floor'] == null ? array() : array( $row['floor'] ),
						    'cat' => $cat2,
						    'item' => $item );
				// This is probably a good thing to have with an item.
				if (building_id){
			        	$row_array['bid'] = (int)$row['bid'];
				}
				array_push($json_array, $row_array);    
			}
			return json_encode($json_array); 
			break; // probably unnecessary with return?
	}
}
include "FINsert/closedb.php"; // close the db connection
?>
