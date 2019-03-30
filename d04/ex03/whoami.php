<?php

session_start();
$login = isset($_SERVER["loggued_on_user"]) ? $_SERVER["loggued_on_user"] : ""
if ($login == null)
	echo "ERROR\n";
else
	echo "$login\n";

?>
