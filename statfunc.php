<?php 

	function writeToSVGFile($camp, $count){
			
		global $startX;
		global $startY;
		
		$x = $startX;
		$y = $startY;
		//convert it to lowercase
		echo "<svg>";
		// Write the stock name
		$string = "<text ";
		$string .= 'x="' . $x .'" ';
		$string .= 'y="' . $y .'" ';
		$string .= ">";
		$string .=  $camp;
		$string .= "</text>";
		$string .= "\n";
		echo "$string";
		
		// Write an SVG rect element to represent the price
		$x += 100;
		$string = "<rect ";
		$string .= 'x="' . $x .'" ';
		$string .= 'y="' . $y .'" ';
		$string .= 'height="' . 50 .'" ';
		$string .= 'width="'. $count * 100 .'" ';
		$string .= "/>";
		$string .= "\n";
		echo "$string";		
		$startY += 100;
		echo "</svg>";
	}
?>