#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$arr = preg_split('/\s+/', trim($str));
		sort($arr);
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
