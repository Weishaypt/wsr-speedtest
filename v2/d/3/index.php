<!DOCTYPE html>
<html>
<head>
	<title>PHP Array Comparing</title>
</head>
<body>

	<?php

    // return a new array containing the common elements of the given two arrays.
	function compareArrays($a1, $a2){
		//put your code here
        $a = [];
        foreach ($a1 as $item) {
            $find = false;
            foreach ($a2 as $item2) {
                if($item == $item2) {
                    $find = true;
                    break;
                }
            }
            if($find) {
                array_push($a, $item);
            }
        }

        return json_encode($a);
	}

	echo(compareArrays(['red', 'green', 'yellow'], ['red', 'green', 'black']));
	echo(compareArrays(['a', 'b', 'c', 'd', 'e'], ['a', 'b', 'c', 'd', 'e']));
	echo(compareArrays(['a'], ['a', 'b']));
	echo(compareArrays(['a'], ['a', 'c']));
	echo(compareArrays(['a', 'ac', 'eb'], ['a', 'ca', 'be']));
	echo(compareArrays(['a', 'b', 'c'], ['a', 'b', 'c']));

	?>

</body>
</html>
