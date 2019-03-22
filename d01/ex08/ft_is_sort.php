#!/usr/bin/php
<?php
	function ft_is_sort($arr)
	{
		if ($arr === sort($arr))
			return (true);
		else
			return (false);
	}
?>
