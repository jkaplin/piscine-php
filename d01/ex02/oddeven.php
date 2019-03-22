#!/usr/bin/php
<?php
	while (($line = readline("Enter a number: ")) != NULL)
	{
		if (is_numeric($line))
		{
			print("The number " . $line . " is ");
			if (intval($line) % 2 == 0)
				echo "even\n";
			else
				echo "odd\n";
		}
		else
			print("'" . $line . "'" . " is not a number\n");
	}
	echo "\n";
?>
