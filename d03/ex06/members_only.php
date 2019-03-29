<?php

$user = (isset($_SERVER["PHP_AUTH_USER"]) ? $_SERVER["PHP_AUTH_USER"] : "guest");
$pw = (isset($_SERVER["PHP_AUTH_PW"]) ? $_SERVER["PHP_AUTH_PW"] : null);

if ($user === "zaz" and $pw === "jaimelespetitsponeys")
{
	$file = file_get_contents("../img/42.png");
	echo "<html><body>\n";
	echo "Hello Zaz<br />\n";
	echo "<img src='data:image/png;base64,".base64_encode($file)."'>\n";
	echo "</body></html>\n";
}
else
{
	header("HTTP/1.0 401 Unauthorized");
	header("WWW-Authenticate: Basic realm=''Member area''");
	echo "<html><body>That area is accessible for members only</body></html>\n";
}

?>
