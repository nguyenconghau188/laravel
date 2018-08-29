<?php 
//some funtion array

//remove space in string
function removeSpaceInString($string)
{
	$doubleSpace = '  ';
	$string = trim($string);
	if (strpos($string, $doubleSpace) !== false)
	{
		echo 'co double space';
		return preg_replace('/\s+/', '', $string);
	}
	return str_replace(' ', '', $string);
}


$str = 'chao cac ban     ';
$str2 = removeSpaceInString($str);
var_dump($str2);
?>