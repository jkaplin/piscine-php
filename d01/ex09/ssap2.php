#!/usr/bin/php
<?php
	function ft_compare($str1, $str2)
	{
		if ($str1 == null)
			return (-1);
		else if ($str2 == null)
			return (1);
		$a = $str1[0];
		$b = $str2[0];
		if (ctype_alpha($a) and ctype_alpha($b))
		{
			if ($a == strtolower($a) and $b == strtoupper($b))
				return (-1);
			if ($a == strtoupper($a) and $b == strtolower($b))
				return (1);
		}
		if (is_numeric($a) and is_numeric($b))
		{
			if (intval($a) < intval($b))
				return (-1);
			if (intval($a) < intval($b))
				return (1);
		}
		if (ctype_alpha($a) and !ctype_alpha($b))
			return (-1);
		if (!ctype_alpha($a) and ctype_alpha($b))
			return (1);
		if (is_numeric($a) and !is_numeric($b))
			return (-1);
		if (!is_numeric($a) and is_numeric($b))
			return (1);
		if ($a < $b)
			return (-1);
		else if ($a > $b)
			return (1);
		return (ft_compare(substr($str1, 1), substr($str2, 1)));
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
