<!DOCTYPE html>
<html>
<head>
	<title>PHP Array Comparing</title>
</head>
<body>

	<?php

    // return a new array containing the common elements of the given two arrays.
	function compareArrays(Array $a1, Array $a2){
		$arr = [];
	    foreach ($a1 as $item)
        {
            $isPublic = false;
            foreach ($a2 as $i)
            {
                if($i == $item)
                {
                  $isPublic = true;
                }

            }

            if($isPublic)
            {
                array_push($arr, $item);
            }
        }

	    return $arr;
	}

	echo print_r(compareArrays(['red', 'green', 'yellow'], ['red', 'green', 'black']));
/*	echo print_r(compareArrays(['a', 'b', 'c', 'd', 'e'], ['a', 'b', 'c', 'd', 'e']));
	echo print_r(compareArrays(['a'], ['a', 'b']));
	echo print_r(compareArrays(['a'], ['a', 'c']));
	echo print_r(compareArrays(['a', 'ac', 'eb'], ['a', 'ca', 'be']));
	echo print_r(compareArrays(['a', 'b', 'c'], ['a', 'b', 'c']));*/

	?>

</body>
</html>
