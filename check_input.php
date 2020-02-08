<?php
session_name('traffic_lights');
session_start();

//Check if the data entered by the user is empty
if(!empty($_POST['roadMap'])){
	$roadMap = $_POST['roadMap'];
}
else{
	header("Location: index.php");
}
//Define variables
$imploded_roadMap = NULL;
$exploded_roadMap = [];
$user_errors = FALSE;

// Implode the data
$imploded_roadMap = implode(', ', $roadMap);

// Explode the data
$exploded_roadMap = explode(', ', $imploded_roadMap);

//Check if have a non numeric values entered
for ($j=1; $j < count($exploded_roadMap);) { 
		if(!is_numeric($exploded_roadMap[$j])){
			//If is found a non numeric value set the error variable TRUE
			$user_errors = TRUE;
			break;
		}
	$j++;
}
// Define the lenght of the data array and define a variable for array that can be used for data threatment 
$lenght = count($roadMap);
$road_Map = [];

for ($h=1; $h <= $lenght; $h++) { 
	// Explode the data array so that it could be useful
	$road_Map[$h] = explode(", ", $roadMap[$h]);
}

for ($e=1; $e < count($road_Map); $e++) { 
	for ($f=0; $f < count($road_Map[$e]); $f++) { 
		// Check if string with no number is entered
		if(count($road_Map[$e]) != 2 && is_numeric($road_Map[$e][$f])){
			// Set the error variable TRUE if no number string is entered 
			$user_errors = TRUE; 
			break;
		}
		else{
			$next_element = 1;
			for ($s=0; $s < count($road_Map[$e]); $s++) {
				// Check if the distance of the traffic lights are not growing or if they are the same
				if($road_Map[$next_element][0]>$road_Map[$next_element+1][0]){

					// Set the error variable TRUE if distance is not growing 
					$user_errors = TRUE;
					break;
				}
				//If the next element index is bigger than the last index in the array break the code
				if($next_element >= count($road_Map[$e])){
					break;
				}
				else{
					$next_element++;
				}
			}
		}
	}
}
//If there are no errors make the user go to the next page where he/she may see the solution
if($user_errors == FALSE){
	// Send the road map array to the next page where data will be used
	$_SESSION['roadMap'] = $road_Map;
	// Send the user to the next page (road_map.php) 
	header("Location: road_map.php");
}
// If there are one or more errors send the user back to previous page
else{
	header("Location: index.php");
}