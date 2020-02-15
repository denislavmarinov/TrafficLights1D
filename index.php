<?php
//Include the header of the document
include('include/header.php');
?>
	<h1>Traffic Lights 1D</h1>
	<!-- Form where the user should write how much subarrays he/she will need  -->
	<form action="#" method="post" id="rows_needed">
		<p>This is a page in which you may check how much time you will be needed to from point A to point B across traffic lights. </p>
		How much traffic lights do you have on you route:       <input type="text" name="elements">
		<input type="submit" name="row_needed_submit" value="Set">
		<?php
			if(!empty($_SESSION['user_error_name'])){
				echo "<br><br>" . $_SESSION['user_error_name'];
			}
		?>
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
			<a href="index.php"><i class='fas fa-reply'></i>    Back</a>
			<p></p>
			<p>Write your input like that: <span class="bold">24, 7</span> The first number is meters you have to go across. The second number is the seconds that traffic light is green or red.</p>
		<?php 
		// Show the input lines for every subarray data
			for ($i=1; $i <= $elements;) {
				// Display the form inputs
				echo "Enter the ". $i ." element of the array    <input type='text' name='roadMap[$i]' placeholder='example   24,7'><p></p>";
				$i++;
			}
		}
		//Display the error if the input is empty but no display when the page is open (after clicking the submit button only)
		elseif(!empty($_POST['row_needed_submit']) && empty($_POST['elements'])){
			echo "Please enter a valid input";
		}
		
		?>
	
		<input class="hide" type="submit" name="submit" value="Start">
	</form>
</body>
</html>
