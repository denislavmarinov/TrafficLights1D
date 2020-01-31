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
if($user_errors == FALSE){
	$_SESSION['roadMap'] = $roadMap;
	header("Location: road_map.php");
}