<?php
	class Element
	{
		var $sym;
		var $num;
		var $atom;
		function __construct($sym, $num, $atom)
		{
			$this->sym = $sym;
			$this->num = $num;
			$this->atom = $atom;
		}
	}
	$elements = array_fill(0, 9, array_fill(0, 18, NULL));
	$file = fopen("table.csv", "r");
	$i = 0;
	$j = 1;
	while(!feof($file))
	{
		$row = fgetcsv($file);
		if ($row[7] == 7)
		{
			$i = 0;
			$j++;
		}
		if($row[8] == "")
		{
			$row[7] = 7 + $j;
			$row[8] = $i;
		}
		$elements[$row[7] - 1][$row[8] - 1] = new Element($row[2], $row[0], $row[3]);
		$i++;
	}
	foreach($elements as $row)
	{
		print("\t<tr>\n");
		foreach($row as $ele)
		{
			print("\t\t<td>\n");
			if ($ele != NULL)
			{
				print("\t\t\t<div class=\"atom\">" . $ele->atom . "</div>\n");
				print("\t\t\t<div class=\"sym\">" . $ele->sym . "</div>\n");
				print("\t\t\t<div class=\"num\">" . $ele->num . "</div>\n");
			}
				print("\t\t</td>\n");
		}
		print("\t</tr>\n");
	}
?>
