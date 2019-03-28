#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');
	if ($argc == 2)
	{
		$all_months = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
		$all_days = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");

		$matches = [];
		preg_match('/^(\w+) (\d{1,2}) (\w+) (\d{4}) (\d{2}):(\d{2}):(\d{2})$/', $argv[1], $matches);
		if ($matches == null)
		{
			echo "Wrong Format\n";
			exit();
		}
		$day = $matches[1];
		$days = intval($matches[2]);
		$month = $matches[3];
		$year = intval($matches[4]);
		$hours = intval($matches[5]);
		$minutes = intval($matches[6]);
		$seconds = intval($matches[7]);


		$all_months = array_merge($all_months, array_map("ucfirst", $all_months));
		$month_num = array_search($month, $all_months);
		$all_days = array_merge($all_days, array_map("ucfirst", $all_days));
		$valid = array_search($day, $all_days);
		if ($month_num === false or $valid === false)
		{
			echo "Wrong Format\n";
			exit();
		}
		else
		{
			$total_seconds = mktime($hours, $minutes, $seconds, $month_num % 12 + 1, $days, $year);
			print("$total_seconds\n");
		}
	}
?>
