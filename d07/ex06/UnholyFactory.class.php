<?php

class UnholyFactory
{
	private $_crew = array();

	public function absorb($fighter)
	{
		if ($fighter instanceof Fighter)
		{
			if (in_array($fighter, $this->_crew))
			{
				print("(Factory already absorbed a fighter of type " . $fighter->type . ")" . PHP_EOL);
			}
			else
			{
				print("(Factory absorbed a fighter of type " . $fighter->type . ")" . PHP_EOL);
				$this->_crew[$fighter->type] = $fighter;
			}
		}
		else
		{
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}
	}

	public function fabricate($fighter_name)
	{
		if (array_key_exists($fighter_name, $this->_crew))
		{
			print("(Factory fabricates a fighter of type " . $fighter_name . ")" . PHP_EOL);
			return (clone $this->_crew[$fighter_name]);
		}
		else
		{
			print("(Factory hasn't absorbed any fighter of type " . $fighter_name . ")" . PHP_EOL);
			return null;
		}
	}
}

?>
