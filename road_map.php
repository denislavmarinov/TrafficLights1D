<?php 

if(!empty($_POST['road_map'])){
	$not_exploded_input = $_POST['road_map'];
	if(strpos($not_exploded_input, ':')){
		$input = explode(':', $_POST['road_map']);
		$roadMap[] = $input[1];
	}
	else{
		$roadMap[] = $not_exploded_input;
	}
	var_dump($roadMap);
}
else{
	echo "Please enter a valid input!!!";
}