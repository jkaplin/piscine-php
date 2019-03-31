<?php

function get_data($file)
{
	$data = file_get_contents("db/".$file);
	return (unserialize($data));
}

function add_data($key, $new_data, $file)
{
	$data = get_data($file);
	if (isset($key))
		$data = $array_merge($data, $new_data);
	else
		$data[$key] = $new_data;
	$total_data = serialize($data);
	$data = file_put_contents("db/".$file);
}

function add_user($user_data)
{
	if (isset($user_data["password"])
	{
		$user_data["password"];
		hash("whirlpool", 
	}
	$key = "username";
	$file = "users";
	add_data($key, $user_data, $file);
}

function add_book($book_data)
{
	$key = "title";
	$file = "books";
	add_data($key, $book_data, $file);
}

?>
