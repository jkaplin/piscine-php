<?php

$submit = isset($_POST["submit"]) ? $_POST["submit"] : null;
$login = isset($_POST["login"]) ? $_POST["login"] : null;
$newpw = isset($_POST["newpw"]) ? $_POST["newpw"] : null;
$oldpw = isset($_POST["oldpw"]) ? $_POST["oldpw"] : null;

if ($submit !== "OK" or $login == null or $newpw == null or $oldpw == null)
{
	echo "ERROR\n";
	exit();
}

if (file_exists("../private/passwd"))
	$accounts = unserialize(file_get_contents("../private/passwd"));
else
	$accounts = array();

foreach ($accounts as $i => $account)
{
	if ($account["login"] === $login and $account["passwd"] === hash("whirlpool", $oldpw))
	{
		$accounts[$i]["passwd"] = hash("whirlpool", $newpw);
		file_put_contents("../private/passwd", serialize($accounts));
		echo "OK\n";
		exit();
	}
}
echo "ERROR\n";

?>
