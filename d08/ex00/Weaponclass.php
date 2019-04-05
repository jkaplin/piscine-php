<?php

require_once("Gameclass.php");
require_once("Playerclass.php");
require_once("Fleetclass.php");
require_once("Spaceshipclass.php");
require_once("Weaponclass.php");

abstract class Weapon
{
  public $name;
  public $width;
  public $length;
  public $x;
  public $y;
  public $direction;
  public $hp;
  public $pp;
  public $speed;
  public $handling;
  public $shield;
  public $weapon;

  public function rotate($rotation)
  {
    if ($rotaion === "left")
    {
      if ($this->direction === "left")
        $this->direction = "down";
      else if ($this->direction === "up")
        $this->direction = "left";
      else if ($this->direction === "right")
        $this->direction = "up";
      else if ($this->direction === "down")
        $this->direction = "right";
    }
    else if ($rotation === "right")
    {
      if ($this->direction === "left")
        $this->direction = "up";
      else if ($this->direction === "up")
        $this->direction = "right";
      else if ($this->direction === "right")
        $this->direction = "down";
      else if ($this->direction === "down")
        $this->direction = "left";
    }
  }

  public function move()
  {
    if ($this->direction === "left")
    {
      $thix->x = $this->x - 1;
    }
    else if ($this->direction === "right")
    {
      $thix->x = $this->x - 1;
    }
    else if ($this->direction === "up")
    {
      $thix->y = $this->y + 1;
    }
    else if ($this->direction === "down")
    {
      $thix->y = $this->y - 1;
    }
  }
}

class Laser extends Weapon
{
  public function __construct()
  {

  }
}

 ?>
