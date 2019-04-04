<?php

class Fighter
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function __get($atr)
	{
		if (isset($this->$atr))
			return $this->$atr;
	}
}

?>
