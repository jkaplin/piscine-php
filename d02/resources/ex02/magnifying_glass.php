#!/usr/bin/php
<?php

function upcase_arr($arr)
{
	return str_replace($arr[1], strtoupper($arr[1]), $arr[0]);
}

if ($argc > 1)
{
	$str = file_get_contents($argv[1]);
	if ($str === false)
	{
		echo "Error reading from file\n";
		exit();
	}
	
	$matches = [];
	$str = preg_replace_callback('/\<\s*a\s+.*title\s*=\s*[",\'](.*)[",\']/', "upcase_arr", $str);
	echo preg_replace_callback('/\<\s*a.*\>(.*?)\<\/\s*a\s*\>/', "upcase_arr", $str);
}

?>
