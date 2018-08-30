<?php 
if (!defined('PATH_SYSTEM')) {
	die('Bad requested');
}

function string_to_int($value)
{
	return sprintf("%u", crc32($value));
}


 ?>