#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$num1 = intval(trim($argv[1]));
		$op = trim($argv[2]);
		$num2 = intval(trim($argv[3]));
		if ($op == "+")
			$result = $num1 + $num2;
		else if ($op == "-")
			$result = $num1 - $num2;
		else if ($op == "*")
			$result = $num1 * $num2;
		else if ($op == "/" && $num2 != 0)
			$result = $num1 / $num2;
		else if ($op == "%" && $num2 != 0)
			$result = $num1 % $num2;
		else if (($op == "/" || $op == "%") && $num2 == 0)
			return ("ERROR");
		else
			return ("SYNTAX_ERROR");
		echo "$result\n";
	}
	else
		echo "Incorrect Parameters\n"
?>
