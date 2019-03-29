<?php

$action = (isset($_GET["action"]) ? $_GET["action"] : null;
$name = (isset($_GET["name"]) ? $_GET["name"] : null;
$value = (isset($_GET["value"]) ? $_GET["value"] : null;
if ($action === "set")
	if ($name and $value)
		setcookie($name, $value, time() + 3600);
else if ($action === "get")
	if ($name and isset($_COOKIE[$name]))
		echo $_COOKIE[$name]."\n"
else if ($action === "del")
	if ($name and isset($_COOKIE[$name]))
		setcookie($name, $value, time() - 3600);

?>
