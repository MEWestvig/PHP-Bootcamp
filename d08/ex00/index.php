<?php
include('Dice.class.php');
include('Player.class.php');

if (empty($_POST))
  header('Location: '. "new_game.php");

$name = "Daniel";
$p1 = new Player($_POST['p1'], 0);
$p2 = new Player($_POST['p2'], 1);
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
       <td><?php print($p1->getName()); ?></td>
       <td><?php print($p2->getName()); ?></td>
     </tr>
   </table>
   <table class = "grid">
     <?php
     for ($i=0; $i < 100; $i++) {
       echo '<tr class = "gridtr">';
       for ($j=0; $j < 150; $j++) {
        if ($p1->getY === $i && $p1->getX === $j)
          echo '<td bgcolor="#000000" class = "gridtd">Hello</td>';
        else
          echo '<td class = "gridtd"></td>';
       }
       echo '</tr>';
     }
     print ($p1->getX() . PHP_EOL);
     print ($p1->getY() . PHP_EOL);
     ?>
   </table>
 </body>
</html>
