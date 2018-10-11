<?php
include('Dice.class.php');
include('Player.class.php');

if (empty($_POST))
  header('Location: '. "new_game.php");

$name = "Daniel";
$board_y = 10;
$board_x = 10;
$p1 = new Player($_POST['p1'], 0, $board_x, $board_y);
$p2 = new Player($_POST['p2'], 1, $board_x, $board_y);
$d6 = new Dice();

?>
<html>
<head>
  <meta charset="UTF-8">
	<title>Game</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
  <?php
    print ($p1->getName() . PHP_EOL);
    print ($p2->getName() . PHP_EOL);
    print ($d6->rollDice(2) . PHP_EOL);
   ?>
   <table style="width:100%">
     <tr>
       <th>Player 1</th>
       <th>Player 2</th>
     </tr>
     <tr>
       <td style="text-align: center"><?php print($p1->getName()); ?></td>
       <td style="text-align: center"><?php print($p2->getName()); ?></td>
     </tr>
   </table>
   <table class = "grid">
     <?php
     for ($i=0; $i < $board_y; $i++) {
       echo '<tr class = "gridtr">';
       for ($j=0; $j < $board_x; $j++) {
        if ($p1->getY() === $i && $p1->getX() === $j)
          echo '<td bgcolor="GREEN" class = "gridtd"></td>';
        else if ($p2->getY() === $i && $p2->getX() === $j)
          echo '<td bgcolor="RED" class = "gridtd"></td>';
        else
        {
          if ((($j <= $p1->getX() + $p1->getMove() && $j >= $p1->getX() - $p1->getMove()) && $i === $p1->getY()) ||
          (($i <= $p1->getY() + $p1->getMove() && $i >= $p1->getY() - $p1->getMove()) && $j === $p1->getX()))
          {
            print($i ." ". $j . " \n");
            echo '<td bgcolor="orange" class = "gridtd"><a href="#child4" class="parent" style="display: block;width = calc(100% / 150);height: calc(100vw / 150);"></a></td>';
          }
          else
            echo '<td bgcolor="white" class = "gridtd"></td>';
        }
       }
       echo '</tr>';
     }
     print ("Player x: " . $p1->getX() . "\n");
     print ("Player Y: " . $p1->getY() . "\n");
     print ("Player x: " . $p2->getX() . "\n");
     print ("Player Y: " . $p2->getY() . "\n");
     ?>
   </table>
 </body>
</html>
