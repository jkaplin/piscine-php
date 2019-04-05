<?php

require_once("Gameclass.php");
require_once("Playerclass.php");
require_once("Fleetclass.php");
require_once("Spaceshipclass.php");
require_once("Weaponclass.php");


class Fleet
{
  public $all_spaceships = ["SimpleShip"];
  public $x;
  public $y;
  public $direction;
  public $spaceships = array();

  public function __construct($x, $y, $direction)
  {
    $this->x = $x;
    $this->y = $y;
    $this->direction = $direction;
    foreach ($this->all_spaceships as $ship)
    {
      $this->spaceships[] = new $ship($this->x, $this->y, $this->direction);
    }
  }
}

 ?>
