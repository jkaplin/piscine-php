#!/usr/bin/php
<?php  

class Image
{
	function __construct($main_url, $url, $name)
	{
		if ($url[0] === '/')
			$this->url = $main_url.$url;
		else
			$this->url = $url;
		$this->name = $name;
	}
}

if (!isset($argv[1]))
{
	echo "Please provide a url as an argument\n";
	exit();
}
$main_url = $argv[1];
$ch = curl_init($main_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);
$matches = [];
preg_match_all('/\<\s*img\s+.*src\s*=\s*[",\'](.*\/(.*?))[",\']/', $html, $matches);
if ($matches == null)
	exit();

$urls = [];
$names = [];
for ($i = 0; $i < count($matches[1]); $i++)
{
	$urls[] = $matches[1][$i];
	$names[] = $matches[2][$i];
}

$images = [];

for ($i = 0; $i < count($urls); $i++)
{
	$images[] = new Image($main_url, $urls[$i], $names[$i]);
}

foreach($images as $img)
{
	$fp = fopen($img->name, 'w+');
	if($fp === false)
			throw new Exception('Could not open: ' . $saveTo);
	$ch = curl_init($img->url);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_exec($ch);
	if(curl_errno($ch)){
			throw new Exception(curl_error($ch));
	}
	curl_close($ch);
	fclose($fp);
}
 
?>
