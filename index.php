<?php
	/**
	* Code that helped me determine the right answer to Hacker Underground's puzzle
	* On your way to SXSW, you pass five signs that tell you their distances from Austin. 
	* The distance between each sign is fixed. No sign is within 10 miles of Austin. Together, 
	* the signs include each of the integers 0-9 only once.
	*
	* Here’s one example of how this could happen - signs positioned at 54 miles, 63 miles, 72 miles, 
	* 81 miles, and 90 miles from Austin. The solution would be http://hackerunderground/solution/5463728190
	*
	* Now consider the case with a sign as close as it can be to Austin where the distance between signs is the smallest it can be.
	* 
	*/
	
	$in_use_array = array();
	
	for($miles = 1; $miles < 100; $miles++){
		for($a = 1; $a < 100; $a++){
			$in_use_array['a'] = sp($a);
			$in_use_array['b'] = sp($in_use_array['a'] + $miles);
			$in_use_array['c'] = sp($in_use_array['b'] + $miles);
			$in_use_array['d'] = sp($in_use_array['c'] + $miles);
			$in_use_array['e'] = sp($in_use_array['d'] + $miles);
			if(isInUse($in_use_array)){
				continue;
			}
			print_r($in_use_array);
			echo implode('',$in_use_array);
			echo "\n";
			echo $miles;
		}
		
	}

	function isInUse($in_use_array){
		$inuse = implode('',$in_use_array);
		foreach(array('a', 'b', 'c', 'd', 'e') as $letter){
			if(substr_count($inuse, $in_use_array[$letter][0]) > 1){
				return true;
			}
			if(substr_count($inuse, $in_use_array[$letter][1]) > 1){
				return true;
			}
		}
		return false;
	}
	
	function sp($str){
		return str_pad($str, 2, "0", STR_PAD_LEFT);
	}
?>