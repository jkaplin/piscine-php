#!/usr/bin/php
<?php

if ($argc !== 3 || !file_exists($argv[1]))
	exit();
$file = file($argv[1]);
foreach ($file as $i => $str)
	$file[$i] = explode(';', trim($str));
$key = $argv[2];
if ($key === "last_name")
	$key_idx = 0;
else if ($key === "name")
	$key_idx = 0;
else if ($key === "surname")
	$key_idx = 1;
$key_idx = array_search($key, $file[0]);
if ($key_idx === false)
	exit();

for ($i = 1; $i < count($file); $i++)
{
	$name[$file[$i][$key_idx]] = $file[$i][0];
	$last_name[$file[$i][$key_idx]] = $file[$i][0];
	$nom[$file[$i][$key_idx]] = $file[$i][0];

	$surname[$file[$i][$key_idx]] = $file[$i][1];
	$first_name[$file[$i][$key_idx]] = $file[$i][1];
	$prename[$file[$i][$key_idx]] = $file[$i][1];

	$mail[$file[$i][$key_idx]] = $file[$i][2];
	$email[$file[$i][$key_idx]] = $file[$i][2];

	$IP[$file[$i][$key_idx]] = $file[$i][3];
	$ip[$file[$i][$key_idx]] = $file[$i][3];

	$login[$file[$i][$key_idx]] = $file[$i][4];
	$pseudo[$file[$i][$key_idx]] = $file[$i][4];
}


while (true)
{
	echo "Enter your command: ";
	$command = fgets(STDIN);
	if ($command === false)
	{
		echo "\n";
		break ;
	}
	try
	{
  	eval($command);
	}
	catch (ParseError $e)
	{
		echo "PHP Parse error:\t" .$e->getMessage() ."\n";
	}
}

?>
