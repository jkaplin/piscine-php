<?php

require_once("../ex01/Vertex.class.php");

class Vector
{
	public static $verbose;

	private $_x;
	private $_y;
	private $_z;
	private $_w;

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
	}

	private function _vector_info()
	{
			return vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w));

	}

	public function __construct(array $kwargs)
	{
		if(isset($kwargs["dest"]))
		{
			$dest = $kwargs["dest"];
			if(isset($kwargs["orig"]))
			{
				$orig = $kwargs["orig"];
			}
			else
			{
				$orig = new Vertex(array("x" => 0, "y" => 0, "z" => 0));
			}
			$this->_x = $dest->x - $orig->x;
			$this->_y = $dest->y - $orig->y;
			$this->_z = $dest->z - $orig->z;
			$this->_w = 0;
		}
		if (isset(self::$verbose) and self::$verbose === true)
		{
			echo self::_vector_info() . " constructed" . PHP_EOL;
		}
	}


	public function magnitude()
	{
			return (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
	}

	public function normalize()
	{
			$mag = $this->magnitude();
			if ($mag === 1)
				return (clone $this);
			else
				return new Vector(array("dest" => new Vertex(array("x" => $this->_x / $mag, "y" => $this->_y / $mag, "z" => $this->_z / $mag))));
	}

	public function add(Vector $v)
	{
			return new Vector(array("dest" => new Vertex(array("x" => $this->_x + $v->x, "y" => $this->_y + $v->y, "z" => $this->_z + $v->z))));
	}

	public function sub(Vector $v)
	{
			return new Vector(array("dest" => new Vertex(array("x" => $this->_x - $v->x, "y" => $this->_y - $v->y, "z" => $this->_z - $v->z))));
	}

	public function opposite()
	{
			return self::scalarProduct(-1);
	}

	public function scalarProduct($k)
	{
			return new Vector(array("dest" => new Vertex(array("x" => $this->_x * $k, "y" => $this->_y * $k, "z" => $this->_z * $k))));
	}

	public function dotProduct(Vector $v)
	{
			return (float)(($this->_x * $v->x) + ($this->_y * $v->y) + ($this->_z * $v->z));
	}

	public function crossProduct(Vector $v)
	{
			return new Vector(array("dest" => new Vertex(array(
					"x" => $this->_y * $v->z - $this->_z * $v->y,
					"y" => $this->_z * $v->x - $this->_x * $v->z,
					"z" => $this->_x * $v->y - $this->_y * $v->x
			))));
	}

	public function cos(Vector $v)
	{
		return (self::dotProduct($v) / sqrt( ( ($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z) ) * ( ($v->x * $v->x) + ($v->y * $v->y) + ($v->z * $v->z) )));
	}

	public function __destruct()
	{
		if (isset(self::$verbose) and self::$verbose === true)
		{
			echo self::_vector_info() . " destructed" . PHP_EOL;
		}
	}

	public function __toString()
	{
		return (self::_vector_info());
	}

	public static function doc()
	{
		echo file_get_contents("Vector.doc.txt");
	}
}

?>
