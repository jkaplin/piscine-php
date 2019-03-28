#!/usr/bin/php
<?php

class Message
{
	var $line;
	var $time;
	var $value;
	function __construct($line, $matches)
	{
		$this->line = $line;
		$this->time = $matches[0];
		$this->value = $matches[1].$matches[2].$matches[3].$matches[4];
	}
}

function value_cmp($msg_a, $msg_b)
{
    return strcmp($msg_a->value, $msg_b->value);
}

if (!isset($argv[1]))
	exit();
$file = file($argv[1]);
$matches = [];
$messages = [];
for ($i = 0; $i < count($file); $i++)
{
	if (preg_match('/(\d\d):(\d\d):(\d\d),(\d\d\d) --> (\d\d):(\d\d):(\d\d),(\d\d\d)/', trim($file[$i]), $matches))
		$messages[] = new Message($file[$i + 1], $matches);
}
usort($messages, "value_cmp");
foreach ($messages as $i => $msg)
{
	print(strval($i + 1)."\n");
	print("$msg->time\n");
	print("$msg->line");
	if ($i != count($messages) - 1)
		echo "\n";
}

?>
