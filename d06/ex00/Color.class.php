<?php

class Color
{
	static $verbose;

	public $red;
	public $green;
	public $blue;

	private function spaces($color_val)
	{
		$spaces ="";
		for ($i = 0; $i < (3 - strlen(strval($color_val))); $i++)
		{
			$spaces = $spaces . " ";
		}
		return ($spaces);
	}

	private function color_info($red, $green, $blue)
	{
		return ("Color( red: " . self::spaces($red) . $red . ", green: " . self::spaces($green) . $green . ", blue: " . self::spaces($blue) . $blue . " )");
	}

	public function __construct(array $kwargs)
	{
		if(isset($kwargs["rgb"]))
		{
			$rgb_val = intval($kwargs["rgb"]);
			$this->red = $rgb_val / 256 / 256 % 256;
			$this->green = $rgb_val / 256 % 256;
			$this->blue = $rgb_val % 256;
		}
		else if(isset($kwargs["red"]) and isset($kwargs["green"]) and isset($kwargs["blue"]))
		{
			$this->red = intval($kwargs["red"]);
			$this->green = intval($kwargs["green"]);
			$this->blue = intval($kwargs["blue"]);
		}
		if (isset(self::$verbose) and self::$verbose === true)
		{
			echo self::color_info($this->red, $this->green, $this->blue) . " constructed." . PHP_EOL;
		}
	}

	public function __destruct()
	{
		if (isset(self::$verbose) and self::$verbose === true)
		{
			echo self::color_info($this->red, $this->green, $this->blue) . " destructed." . PHP_EOL;
		}
	}

	public function __toString()
	{
		return(self::color_info($this->red, $this->green, $this->blue));
	}

	public static function doc()
	{
		echo file_get_contents("Color.doc.txt");
	}

	public function add($color)
	{
		$new_color = new Color(array("red" => ($this->red + $color->red) % 256, "green" => ($this->green + $color->green) % 256, "blue" => ($this->blue + $color->blue) % 256));
		return ($new_color);
	}

	public function sub($color)
	{
		$new_color = new Color(array("red" => ($this->red - $color->red) % 256, "green" => ($this->green - $color->green) % 256, "blue" => ($this->blue - $color->blue) % 256));
		return ($new_color);
	}

	public function mult($num)
	{
		$new_color = new Color(array("red" => ($this->red * $num) % 256, "green" => ($this->green * $num) % 256, "blue" => ($this->blue * $num) % 256));
		return ($new_color);
	}
}

?>
