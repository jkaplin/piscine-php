<?php

require_once("Gameclass.php");
require_once("Playerclass.php");
require_once("Fleetclass.php");
require_once("Spaceshipclass.php");
require_once("Weaponclass.php");

define("GRID_WIDTH", 150);
define("GRID_HEIGHT", 100);

class Game
{
  public $grid;
  public $player1;
  public $player2;
  public $turn;
  public $phase;

  public function __construct()
  {
    $this->grid = array_fill(0, GRID_HEIGHT, array_fill(0, GRID_WIDTH, null));
    $this->player1 = new Player1();
    $this->player2 = new Player2();
    $this->turn = "player1";
    $this->phase = "order";
  }
}

 ?>
