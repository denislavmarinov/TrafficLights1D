<?php 
session_name('traffic_lights');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TrafficLights1D</title>
</head>
<body>
<?php
// Get the data enterted by the user from the session
$roadMap = $_SESSION['roadMap'];
// Define the variables
$seconds = 0;
$stoplight_flash = 0;
$distance = 0;

for ($i=1; $i <= count($roadMap); $i++) { 
	// The seconds (meters) that is sure it will be needed for driving to the last stoplight and going through it 
	$seconds = $seconds + $roadMap[$i][0] - $distance;

	// Get (from the array) the distance from the beggining of the road to the point where the stoplight is
	$distance = (int)$roadMap[$i][0];

	// Get (from the array) the frequence of green and red lights
	$stoplight_flash = (int)$roadMap[$i][1];

	// The stoplight flash is turning from green to red. Every green flash is between 2 red flashes and the same for the red flashes.  

	// Check if the seconnds divided to frequence of color changing is odd
	if(($seconds / $stoplight_flash) % 2 != 0){
		// Add the seconds where the passengers have to stay on red light
		$seconds = (int)($seconds / $stoplight_flash + 1) * $stoplight_flash;
	}
	else{
		// Making no change if the passengers are entering the green light
		$seconds = (int)$seconds;
	}
}
echo "The seconds that you will need to pass all traffic lights is:   <b>" . $seconds . "</b>";
echo "<a href='index.php'>Go back</a>";
?>
</body>
</html>