#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$search = $argv[1];
		for ($i = 2; $i < $argc; $i++)
		{
			$arr = explode(':', $argv[$i]);
			if (sizeof($arr) != 2)
				continue ;
			$key = $arr[0];
			$value = $arr[1];
			if ($key == $search)
			{
				echo "$value\n";
				break ;
			}
		}
	}
?>
