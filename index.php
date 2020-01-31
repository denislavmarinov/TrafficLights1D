<!DOCTYPE html>
<html>
<head>
	<title>TrafficLight1D</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<form action="#" method="post" id="rows_needed">
		How much array elements you want to have:       <input type="text" name="elements">
		<input type="submit" name="row_needed_submit">
	</form>
	<?php 
		if(!empty($_POST['elements'])){
			$elements = $_POST['elements'];
			echo "<style> #rows_needed{display: none;}</style>";
			if(!empty($elements)){
				echo "<style> .hide{display: inline;}</style>";
			}
			?>
			<form class="hide" action="check_input.php" method="post">
				<p>Write your input like that: <span class="bold">24, 7</span></p>
		<?php 
				for ($i=1; $i <= $elements ;) {
					echo "Enter the ". $i ." element of the array    <input type='text' name='roadMap[$i]' placeholder='example   24, 7'><p></p>";
					$i++;
				}
		}
		elseif(!empty($_POST['row_needed_submit']) && empty($_POST['elements'])){
			echo "Please enter a valid input";
		}
		?>
	
	<input class="hide" type="submit" name="submit">
	</form>
</body>
</html>