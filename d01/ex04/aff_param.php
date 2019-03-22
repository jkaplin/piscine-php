#!/usr/bin/php
<?php
	foreach($argv as $i => $arg)
	{
		if ($i == 0)
			continue ;
		print("$arg\n");
	}
?>
