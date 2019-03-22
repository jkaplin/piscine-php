#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$arr = preg_split('/\s+/', trim($str));
		sort($arr);
		return ($arr);
	}
?>
