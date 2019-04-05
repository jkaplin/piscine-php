<?php

require_once("Gameclass.php");
require_once("Playerclass.php");
require_once("Fleetclass.php");
require_once("Spaceshipclass.php");
require_once("Weaponclass.php");

if (!isset($_SERVER["game"]))
{
  $_SERVER["game"] = new Game();
}
$game = $_SERVER["game"];
$grid = $game->grid;
$player1 = $game->player1;
$player2 = $game->player2;


  foreach($player1->fleet->spaceships as $ship)
  {
    $width = $ship->width;
    $length = $ship->length;
    $x = $ship->x;
    $y = $ship->y;
    for ($i = 0; $i < $length; $i++)
    {
      for ($j = 0; $j < $width; $j++)
      {
        $grid[$x + $j][$y + $i] = "player1";
      }
    }
  }

  foreach($player2->fleet->spaceships as $ship)
  {
    $width = $ship->width;
    $length = $ship->length;
    $x = $ship->x;
    $y = $ship->y;
    for ($i = 0; $i < $length; $i++)
    {
      for ($j = 0; $j < $width; $j++)
      {
        $grid[$y + $j][$x + $i] = "player2";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>4000</title>
    <script type="text/javascript">
      function add_color(player, color)
      {
        var player_boxes = document.getElementsByClassName(player);
        for (var i = 0; i < player_boxes.length; i++) {
          player_boxes[i].style.backgroundColor = color;
        }
      }

      add_color("player1", <?php echo $player1->color; ?>);
      add_color("player2", <?php echo $player2->color; ?>)
    </script>
  </head>
  <body>
    <header>
    </header>
    <main>
      <div id="grid">
        <?php foreach ($grid as $row): ?>
          <div class="row">
          <?php foreach ($row as $status): ?>
            <div class="<?php echo "box " . $status; ?>">
            </div>
          <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
    <footer>
      <?php if ($game->phase === "order") require_once("order_phase.php");
            else if ($game->phase === "movement") require_once("movement_phase.php");
            else if ($game->phase === "shooting") require_once("shooting_phase.php");
      ?>
    </footer>
  </body>
</html>
