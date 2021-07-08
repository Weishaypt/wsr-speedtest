<?php
$arr = [1, 1, 2, 3, 5, 6, 6];
$array = removeDuplicate($arr);
function removeDuplicate($arr)
{
    return array_unique($arr);
}
echo print_r($array);
