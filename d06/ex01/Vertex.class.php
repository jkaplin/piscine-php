<?php

require_once("../ex00/Color.class.php");

class Vertex
{
	public static $verbose;

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;

	public function __get($name)
	{
		if ($name === "x")
			return ($this->_x);
		else if ($name === "y")
			return ($this->_y);
		else if ($name === "z")
			return ($this->_z);
		else if ($name === "w")
			return ($this->_w);
		else if ($name === "color")
			return ($this->_color);
	}

	public function __set($name, $value)
	{
		if ($name === "x")
			$this->_x = $value;
		else if ($name === "y")
			$this->_y = $value;
		else if ($name === "z")
			$this->_z = $value;
		else if ($name === "w")
			$this->_w = $value;
		else if ($name === "color")
			$this->_color = $value;
	}

	private function _vertex_info()
	{
		if (isset(self::$verbose) and self::$verbose === true)
		{
			return vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array ($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue));
		}
		else
		{
			return vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array ($this->_x, $this->_y, $this->_z, $this->_w));
		}
	}

	public function __construct(array $kwargs)
	{
		$this->_x = $kwargs["x"];
		$this->_y = $kwargs["y"];
		$this->_z = $kwargs["z"];
		if(isset($kwargs["w"]))
		{
			$this->_w = $kwargs["w"];
		}
		else
		{
			$this->_w = 1.0;
		}
		if(isset($kwargs["color"]))
		{
			$this->_color = $kwargs["color"];
		}
		else
		{
			$this->_color = new Color( array("rgb" => 0xffffff) );
		}
		if (isset(self::$verbose) and self::$verbose === true)
		{
			echo self::_vertex_info() . " constructed" . PHP_EOL;
		}
	}

	public function __destruct()
	{
		if (isset(self::$verbose) and self::$verbose === true)
		{
			echo self::_vertex_info() . " destructed" . PHP_EOL;
		}
	}

	public function __toString()
	{
		return (self::_vertex_info());
	}

	public static function doc()
	{
		echo file_get_contents("Vertex.doc.txt");
	}
}

?>
