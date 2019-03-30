<?php

$submit = isset($_POST["submit"]) ? $_POST["submit"] : null;
$login = isset($_POST["login"]) ? $_POST["login"] : null;
$passwd = isset($_POST["passwd"]) ? $_POST["passwd"] : null;

if ($submit !== "OK" or $login == null or $passwd == null)
{
	echo "ERROR\n";
	exit();
}

if (!file_exists("../private"))
	mkdir("../private");
if (file_exists("../private/passwd"))
	$accounts = unserialize(file_get_contents("../private/passwd"));
else
	$accounts = array();

foreach ($accounts as $account)
{
	if ($account["login"] === $login)
	{
		echo "ERROR\n";
		exit();
	}
}

$hashed = hash("whirlpool", $passwd);
$account = array("login" => $login, "passwd" => $hashed);
$accounts[] = $account;
file_put_contents("../private/passwd", serialize($accounts));
echo "OK\n";

?>
