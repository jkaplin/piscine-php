<?php

class UnholyFactory
{
	private $crew = array();

	public function absorb($type)
	{
		if (get_parent_class($type))
		{
			if (isset($this->crew[$type->name]))
			{
				print("(Factory already absorbed a fighter of type " . $type->name . ")" . PHP_EOL);
			}
			else
			{
				print("(Factory absorbed a fighter of type " . $type->name . ")" . PHP_EOL);
				$this->soldat[$type->name] = $type;
			}
		}
		else
		{
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}
	}

	public function fabricate($type)
	{
		if (array_key_exists($type, $this->crew))
		{
			print("(Factory fabricates a fighter of type " . $type . ")" . PHP_EOL);
			return (clone $this->crew[$type]);
		}
		else
		{
			print("(Factory hasn't absorbed any fighter of type " . $type . ")" . PHP_EOL);
			return null;
		}
	}
}

?>
