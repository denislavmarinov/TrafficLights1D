<?php 
session_name('traffic_lights');
session_start();

$roadMap = $_SESSION['roadMap'];
$seconds = 0;
$stoplight_flash = 0;
$distance = 0;

for ($i=1; $i <= count($roadMap); $i++) { 

	$seconds = $seconds + $roadMap[$i][0] - $distance;

	$distance = (int)$roadMap[$i][0];

	$stoplight_flash = (int)$roadMap[$i][1];

	if(($seconds / $stoplight_flash) % 2 != 0){
		$seconds = (int)($seconds / $stoplight_flash + 1) * $stoplight_flash;
	}
	else{
		$seconds = (int)$seconds;
	}
}
echo "The seconds that you will need to pass all traffic lights is:   <b>" . $seconds . "</b>";