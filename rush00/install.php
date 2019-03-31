#!/usr/bin/php
<?php

define("ADMIN_USERNAME", "eval");
define("ADMIN_PASSWORD", "evil");

require_once("db/db.php");

function create_initial_users()
{
	$admin = ["username" => ADMIN_USERNAME, "password" => ADMIN_PASSWORD, "admin" => true];
	$rtsaturi = ["username" => "rtsaturi", "password" => "1234"];
	$jkaplin = ["username" => "jkaplin", "password" => "1234");
}

function create_initial_books()
{
	$book = array();
	$rows = file("db/initial_books.csv");
	foreach($rows as $row)
	{
		$row_data = explode(";", $row);
		$book["title"] = $row_data[0];
		$book["author"] = $row_data[1];
		$book["year_str"] = $row_data[2];
		$book["year_num"] = $row_data[3];
		$book["country"] = $row_data[4];
		$book["language"] = $row_data[5];
		$book["length"] = $row_data[6];
		$book["img_src"] = $row_data[7];
		$book["wikipedia"] = $row_data[8];

		$book["price"] = 20;
		$book["categories"] = ["cg1", "cg2", "cg3"];

		add_book($book);
	}
}

create_initial_users();
create_initial_books();

?>
