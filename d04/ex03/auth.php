<?php

function auth($login, $passwd)
{
	$accounts = file_get_contents("../private/passwd");
	if ($accounts === false)
		return (false);
	$accounts = unserialize($accounts);
	foreach($accounts as $account)
	{
		if ($account["login"] === $login and $account["passwd"] === hash("whirlpool", $passwd))
			return (true);
	}
	return (false);
}
var_dump(auth("b", "b"));
