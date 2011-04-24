<?php

echo ("<br />Testing getLocations.php ... <br />");

echo (" ... with 1 iterations: ");
$time_start = microtime(true);
ob_start();
$a = include('getLocations.php');
ob_end_clean();
$time_end = microtime(true);
$time = $time_end - $time_start;

echo "$time seconds";
echo ("<br />Testing getAllLocations.php ...  <br />");

for ($i = 1; $i < 2; $i++) {
    for ($j = 1; $j < 2; $j++) {
        echo "... with " . $i * $j . " iterations: ";
        $time_start = microtime(true); 
        
        ob_start();
        // ?lat=47654799&long=-122307776&cat=restrooms&rad=6020
        $lat = 47654799; $long = -122307776; $cat = "restrooms"; $rad = 6020;
        for ($k = 1; $k < 2; $k++) {
            $a = include('getAllLocations.php');
        }
        ob_end_clean();
        
        $time_end = microtime(true);
        $time = $time_end - $time_start;

        echo "$time seconds";
    }
}




?>
