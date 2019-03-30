<?php

session_start();

$login = isset($_GET["login"]) ? $_POST["login"] : null;
$passwd = isset($_GET["passwd"]) ? $_POST["passwd"] : null;

if ($login == null or $passwd == null)
{
	echo "ERROR\n";
	exit();
}

$accounts = file_get_contents("../private/passwd");
if ($accounts !== false)
{
	$accounts = unserialize($accounts);

	foreach ($accounts as $i => $account)
	{
		if ($account["login"] === $login and $account["passwd"] === hash("whirlpool", $passwd))
		{
			$_SERVER["loggued_on_user"] = $login;
			echo "OK\n";
			exit();
		}
	}
}
$_SERVER["loggued_on_user"] = "";
echo "ERROR\n";

?>
