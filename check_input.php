<?php
session_name('traffic_lights');
session_start();

if(!empty($_POST['roadMap'])){
	$roadMap = $_POST['roadMap'];
}
else{
	header("Location: index.php");
}
$imploded_roadMap = NULL;
$exploded_roadMap = [];
$user_errors = NULL;

$imploded_roadMap = implode(', ', $roadMap);
$exploded_roadMap = explode(', ', $imploded_roadMap);
for ($j=1; $j < count($exploded_roadMap);) { 
		if(!is_numeric($exploded_roadMap[$j])){
			echo "Invalid input!!!<p></p><a href='index.php'>Go back</a>";
			$user_errors = TRUE;
			break;
		}
		else{
			$user_errors = FALSE;
		}
	$j++;
}
$lenght = count($roadMap);
$road_Map = [];
for ($h=1; $h <= $lenght; $h++) { 
	$road_Map[$h] = explode(", ", $roadMap[$h]);
}
if($user_errors == FALSE){
	$_SESSION['roadMap'] = $road_Map;
	header("Location: road_map.php");
}