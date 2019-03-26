#!/usr/bin/php
<?php
	while (true)
	{
		print("Enter a number: ");
		$line = fgets(STDIN);
		if ($line == null)
			break;
		$line = str_replace("\n", "", $line);
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
