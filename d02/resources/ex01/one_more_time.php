#!/usr/bin/php
<?php
	define("SECOND", 1);
	define("MINUTE", 60 * SECOND);
	define("HOUR", 60 * MINUTE);
	define("DAY", 24 * HOUR);

	function is_leap_year($year)
	{
		if($year % 4 == 0)
			return (true);
		else
			return (false);
	}

	if ($argc == 2)
	{
		$days_in_months = array("janvier" => 31, "fevrier" => 28, "mars" => 31, "avril" => 30, "mai" => 31, "juin" => 30, "juillet" => 31, "aout" => 31, "septembre" => 30, "octobre" => 31, "novembre" => 30, "decembre" => 31);
		$days = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");

		$matches = [];
		preg_match('/^(\w+) (\d{1,2}) (\w+) (\d{4}) (\d{2}):(\d{2}):(\d{2})$/', $argv[1], $matches);
		print_r($matches);

		$day = $matches[1];
		$days = $matches[2];
		$month = $matches[3];
		$year = $matches[4];
		$hours = $matches[5];
		$minutes = $matches[6];
		$seconds = $matches[7];

		$total_days = 0;
		for ($i = 1970; $i < $year; $i++)
		{
			if(is_leap_year($i))
				$days_in_year = 366;
			else
				$days_in_year = 365;
			$total_days += $days_in_year;
		}

		$days_in_year = 0;
		foreach ($days_in_months as $month_name => $days_in_month)
		{
			if (strncasecmp($month_name, $month, 1) == 0 && substr($month_name, 1) === substr($month, 1))
			{
				$days_in_year += ($days - 1);
				break ;
			}
			else
				$days_in_year += $days_in_month;
		}
		$total_days += $days_in_year;
		$total_seconds = $total_days * DAY + $hours * HOUR + $minutes * MINUTE + $seconds;
		print("$total_seconds\n");
	}
?>
