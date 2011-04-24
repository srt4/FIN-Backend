<?php
include "FINsert/config.php"; // get db credentials ...
include "FINsert/opendb.php"; // ... which are then used to open the db
$lat = 47659000;
$long = -122309000;
$query = 
"SELECT DISTINCT t.latitude, t.longitude, t.id, t.special_info, fnum, f.name as floor\n"
. "\n"
. "FROM restrooms t, floors f, regions\n"
. "\n"
. "WHERE t.fid = f.fid \n"
. "\n"
. "AND t.rid IN (SELECT rid FROM regions \n"
. "WHERE $lat  > regions.latitude - 6020 \n"
. "AND $lat < regions.latitude + 6020 \n"
. "AND $long > (regions.longitude - 6020) \n"
. "AND $long < (regions.longitude + 6020)) \n"
. "ORDER BY special_info LIMIT 0, 100" ;

$result = mysql_query($query);

if (!$result)
    die ("MySQL encountered an error: " 
         + mysql_error());		

$json_array = array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    //echo ++$i;
    //echo "<br />";
    $row_array = array( 'id'   => 
                                $row['id'],
                         'lat'  => 
                                $row['latitude'],
                         'long' => 
                                $row['longitude'],
                         'info' => 
                                $row['special_info'],
                         'floor' => 
                                array( $row['floor'] )
                 );
   array_push($json_array, $row_array);    
}
echo json_encode($json_array); 
include "FINsert/closedb.php"; // close the db connection
?>

