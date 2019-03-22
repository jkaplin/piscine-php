#!/usr/bin/php
<?php
	function ft_compare($a, $b)
	{
		if (ctype_alpha($a) && ctype_alpha($b))
		{
			if ($a == strtolower($a) && $b == strtoupper($b))
				return (-1);
			if ($a == strtoupper($a) && $b == strtolower($b))
				return (1);
		}
		if (ctype_alpha($a) && !ctype_alpha($b))
			return (-1);
		if (!ctype_alpha($a) && ctype_alpha($b))
			return (1);
		if (is_numeric($a) && !is_numeric($b))
			return (-1);
		if (!is_numeric($a) && is_numeric($b))
			return (1);
		if ($a < $b)
			return (-1);
		else
			return (1);
	}
	function ft_split($str)
	{
		$arr = preg_split('/\s+/', trim($str));
		usort($arr, "ft_compare");
		return ($arr);
	}
	if ($argc > 1)
	{
		$long_str = "";
		foreach ($argv as $i => $str)
		{
			if ($i == 0)
				continue ;
			$long_str = $long_str." ".$str;
		}
		$arr = ft_split($long_str);
		foreach ($arr as $word)
		{
			echo "$word\n";
		}
	}
?>
