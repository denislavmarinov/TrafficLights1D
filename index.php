<?php
session_name('traffic_lights');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>TrafficLight1D</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- Form where the user should write how much subarrays he/she will need  -->
	<form action="#" method="post" id="rows_needed">
		How much array elements you want to have:       <input type="text" name="elements">
		<input type="submit" name="row_needed_submit">
	</form>
	<?php
			// Check for empty input and if it is number
		if(!empty($_POST['elements'])){
			// If the input is not empty store the data in variable
			$elements = $_POST['elements'];
			//Hide the first form where the user enter the count of the subarrays
			echo "<style> #rows_needed{display: none;}</style>";
			if(!empty($elements)){
				// Display the form where the user enters the data for the traffic lights
				echo "<style> .hide{display: inline;}</style>";
			}
			?>
			<!-- The form where the user enters the data for the traffic lights -->
			<form class="hide" action="check_input.php" method="post">
				<p>Write your input like that: <span class="bold">24, 7</span></p>
		<?php 
		// Show the input lines for every subarray data
				for ($i=1; $i <= $elements;) {
					// Display the form inputs
					echo "Enter the ". $i ." element of the array    <input type='text' name='roadMap[$i]' placeholder='example   24, 7'><p></p>";
					$i++;
				}
		}
		//Display the error if the input is empty but no display when the page is open (after clicking the submit button only)
		elseif(!empty($_POST['row_needed_submit']) && empty($_POST['elements'])){
			echo "Please enter a valid input";
		}
		
		?>
	
	<input class="hide" type="submit" name="submit">
	</form>
</body>
</html>