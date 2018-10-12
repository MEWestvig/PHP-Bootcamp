<?php
include('Player.class.php');
session_start();

if (empty($_POST) && empty($_GET))
header('Location: '. "new_game.php");

$board_y = 10;
$board_x = 10;

if (empty($_SESSION['pl']))
  $_SESSION['pl'] = rand(1,2);



if (!empty($_SESSION['p1']))
{
  $p1 = $_SESSION['p1'];
  $p2 = $_SESSION['p2'];
  print("p1 pos: ".$p1->getX()." ".$p1->getY());
  print("p2 pos: ".$p2->getX()." ".$p2->getY());
} else {
  $_SESSION['p1'] = new Player($_POST['p1'], 0, $board_x, $board_y);
  $_SESSION['p2'] = new Player($_POST['p2'], 1, $board_x, $board_y);
  $p1 = $_SESSION['p1'];
  $p2 = $_SESSION['p2'];
  print("p2 pos: ".$p2->getX()." ".$p2->getY());
}

if (!empty($_GET['x']))
{
  if ($_SESSION['pl'] === 1){
    $p1->updateX($_GET['x']);
    $p1->updateY($_GET['y']);
  }
  if ($_SESSION['pl'] === 2){
    $p2->updateX($_GET['x']);
    $p2->updateY($_GET['y']);
  }
}

if ($p1->getMove() === 0 || $p2->getMove() === 0)
{
$_SESSION['pl'] = ($_SESSION['pl'] % 2 + 1);
  $p1->reset();
  $p2->reset();
}

$_SESSION['p1'] = $p1;
$_SESSION['p2'] = $p2;
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Game</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>
  <form action="destroy.php" id ="reset">
    <button type="submit" form = "reset">Reset</button>
  </form>
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
  <form action="index.php" method="post">
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
            if (((($j <= $p1->getX() + $p1->getMove() && $j >= $p1->getX() - $p1->getMove()) && $i === $p1->getY()) ||
            (($i <= $p1->getY() + $p1->getMove() && $i >= $p1->getY() - $p1->getMove()) && $j === $p1->getX())) &&
            $_SESSION['pl'] === 1)
            {
              $done = 0;
              for ($c=0; $c < $p1->getMove(); $c++) {
                print($j + $c . " = " . $p1->getY() . "    -    ");
                if ($j + $c === $p2->getY())
                {
                  $done = 1;
                }
              }
              if ($done == 0)
                echo '<td bgcolor="orange" class = "gridtd"><a href="index.php?x='.$j.'&y='.$i.'"></a></td>';
                else {
                  echo '<td bgcolor="white" class = "gridtd"></td>';
                }
            }
            else if (((($j <= $p2->getX() + $p2->getMove() && $j >= $p2->getX() - $p2->getMove()) && $i === $p2->getY()) ||
            (($i <= $p2->getY() + $p2->getMove() && $i >= $p2->getY() - $p2->getMove()) && $j === $p2->getX())) &&
            $_SESSION['pl'] === 2)
            {
              echo '<td bgcolor="orange" class = "gridtd"><a href="index.php?x='.$j.'&y='.$i.'"></a></td>';
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
  </form>
</body>
</html>
