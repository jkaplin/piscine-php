#!/usr/bin/php
<?php
	function find_op($str)
	{
		for($i = 0; $i < strlen($str); $i++)
		{
			if ($i != 0 and (($str[$i] == '+' and $str[$i - 1] == '-') or ($str[$i] == '-' and $str[$i - 1] == '+')))
				return (str[$i]);
			if ($i != 0 and !is_numeric($str[$i]) and is_numeric($str[$i - 1]))
			{
				if (strpos($str, '+') !== false)
					return '+';
				if (strpos($str, '-') !== false)
					return '-';
				if (strpos($str, '*') !== false)
					return '*';
				if (strpos($str, '/') !== false)
					return '/';
				if (strpos($str, '%') !== false)
					return '%';
			}
		}
		return (false);
	}

	function ft_split($str, $op)
	{
		if (is_numeric($op))
		{
			$arr = [];
			array_push($arr, substr($str, 0, $op));
			array_push($arr, substr($str, $op + 1));
		}
		else
			$arr = explode($op, $str);
		return ($arr);
	}

	function only_nums($arr)
	{
		if (is_numeric($arr[0]) and is_numeric($arr[1]))
			return (true);
		else
			return (false);
	}

	function is_valid($arr)
	{
		if (sizeof($arr) == 2 && only_nums($arr))
			return (true);
		else
			return (false);
	}

	function do_op($arr, $op)
	{
		$result = null;
		$num1 = intval(trim($arr[0]));
		$num2 = intval(trim($arr[1]));
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
		$str = preg_replace('/\s+/', '', trim($argv[1]));
		$op = find_op($str);
		if ($op !== false)
			$arr = ft_split($str, $op);
		if ($op !== false and is_valid($arr))
		{
			$result = do_op($arr, $op);
			echo "$result\n";
		}
		else
			echo "Syntax Error\n";
	}
	else
		echo "Incorrect Parameters\n";
?>
