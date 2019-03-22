#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$arr = preg_split('/\s+/', trim($str));
		return ($arr);
	}
	if ($argc == 1)
	{
		$str = $argv[1];
		$arr = ft_split($str);
		foreach($arr as $i => $word)
		{
			if ($i != 0)
				echo " ";
			echo "$word";
		}
		echo "\n";
	}
?>
