<?php

require_once("Gameclass.php");
require_once("Playerclass.php");
require_once("Fleetclass.php");
require_once("Spaceshipclass.php");
require_once("Weaponclass.php");

define("COLOR_PLAYER1", "green");
define("COLOR_PLAYER2", "blue");
define("START_X_PLAYER1", 0);
define("START_Y_PLAYER1", 0);
define("START_X_PLAYER2", 140);
define("START_Y_PLAYER2", 90);

abstract class Player
{
  public $turn;
  public $color;
  public $fleet;

  public function __construct()
  {
  }
}

class Player1 extends Player
{
  public function __construct()
  {
    parent::__construct();
    $this->fleet = new Fleet(START_X_PLAYER1, START_Y_PLAYER1, "down");
    $this->turn = true;
    $this->color = COLOR_PLAYER1;
  }
}

class Player2 extends Player
{
  public function __construct()
  {
    parent::__construct();
    $this->fleet = new Fleet(START_X_PLAYER2, START_Y_PLAYER2, "up");
    $this->turn = false;
    $this->color = COLOR_PLAYER2;
  }
}

 ?>
