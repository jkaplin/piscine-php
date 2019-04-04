<?php

class NightsWatch implements IFighter
{
	private $_crew = array();

	public function recruit($person)
	{
		array_push($this->_crew, $person);
	}

	public function fight()
	{
		foreach ($this->_crew as $person)
		{
			if (method_exists($person, "fight"))
			{
				$person->fight();
			}
		}
	}
}

?>
