#!/usr/bin/php
<?php

	function ft_split($str)
	{
		$arr = preg_split('/\s+/', trim($str));
		return ($arr);
	}

	function is_valid($arr)
	{
		if (sizeof($arr) == 3)
			return (true);
		else
			return (false);
	}

	function do_op($arr)
	{
	$result = NULL;
		$num1 = intval(trim($arr[0]));
		$op = trim($arr[1]);
		$num2 = intval(trim($arr[2]));
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
		return ($result);
	}
	if ($argc == 2)
	{
		$arr = ft_split($argv[1]);
		if (is_valid($arr))
		{
			$result = do_op($arr);
			echo "$result\n";
		}
		else
			echo "Syntax Error\n";
	}
	else
		echo "Incorrect Parameters\n";
?>
