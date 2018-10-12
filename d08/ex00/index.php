<?php
include('Player.class.php');
include('Weapon.class.php');
session_start();

if (empty($_POST) && empty($_GET))
header('Location: '. "new_game.php");

$board_y = 100;
$board_x = 150;

if (empty($_SESSION['pl']))
$_SESSION['pl'] = rand(1,2);

if (!empty($_SESSION['p1']))
{
  $p1 = $_SESSION['p1'];
  $p2 = $_SESSION['p2'];
  $w1 = $_SESSION['w1'];
} else {
  $_SESSION['p1'] = new Player($_POST['p1'], 0, $board_x, $board_y);
  $_SESSION['p2'] = new Player($_POST['p2'], 1, $board_x, $board_y);
  $_SESSION['w1'] = new Weapon();
  $p1 = $_SESSION['p1'];
  $p2 = $_SESSION['p2'];
  $w1 = $_SESSION['w1'];
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

if (!empty($_GET['end']))
{
  $_SESSION['pl'] = ($_SESSION['pl'] % 2 + 1);
  $p1->reset(1);
  $p2->reset(1);
}

if (!empty($_GET['shoot']))
{
    $p1->setRoll(rand(1, 6));
    $p2->setRoll($p1->getRoll());
    if (($_GET['shoot'] === "s" && $p1->getRoll() >= 4) || ($_GET['shoot'] === "m" && $p1->getRoll() >= 5) || ($_GET['shoot'] === "l" && $p1->getRoll() == 6)){
    if ($_SESSION['pl'] === 2)
    $w1->dealDamage($p1);
    else
    $w1->dealDamage($p2);
  }
  $_SESSION['pl'] = ($_SESSION['pl'] % 2 + 1);
  $p1->reset(0);
  $p2->reset(0);
}

if ($p1->getHealth() === 0)
{
  header('Location: '. "game_over.php?winner=" .$p2->getName());
}
else if ($p2->getHealth() === 0)
{
  header('Location: '. "game_over.php?winner=" .$p1->getName());
}

if ($p1->getMove() === 0 || $p2->getMove() === 0)
{
  $_SESSION['pl'] = ($_SESSION['pl'] % 2 + 1);
  $p1->reset(1);
  $p2->reset(1);
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
      <td style="text-align: center" bgcolor="GREEN"><?php print($p1->getName()); ?></td>
      <td style="text-align: center" bgcolor="RED"><?php print($p2->getName()); ?></td>
    </tr>
    <tr>
      <td style="text-align: center"><?php print("Health: " . $p1->getHealth() . " / 5"); ?></td>
      <td style="text-align: center"><?php print("Health: " . $p2->getHealth() . " / 5"); ?></td>
    </tr>
    <tr>
      <?php
      if ($_SESSION['pl'] === 1){
        echo '<td style="text-align: center"><a href="index.php?end=y">END TURN</a></td>';
        if ($p1->getRoll() != 0)
          echo '<td style="text-align: center">You rolled a '.$p1->getRoll().'</td>';
        else
          echo '<td></td>';
      }
      else {
        if ($p2->getRoll() != 0)
          echo '<td style="text-align: center">You rolled a '.$p2->getRoll().'</td>';
        else
          echo '<td></td>';
        echo '<td style="text-align: center"><a href="index.php?end=y">END TURN</a></td>';
      }
      ?>

    </tr>
  </table>
  <form action="index.php" method="post">
    <table class = "grid">
      <?php
      for ($i=0; $i < $board_y; $i++) {
        echo '<tr class = "gridtr">';
        for ($j=0; $j < $board_x; $j++) {
          if ($p1->getY() === $i && $p1->getX() === $j)
          {
            if ($w1->canAttack($p1, $p2) === 1 && $_SESSION['pl'] === 2)
            echo '<td bgcolor="BLUE" class = "gridtd"><a href="index.php?shoot=s"></a></td>';
            else if ($w1->canAttack($p1, $p2) === 2 && $_SESSION['pl'] === 2)
            echo '<td bgcolor="BLUE" class = "gridtd"><a href="index.php?shoot=m"></a></td>';
            else if ($w1->canAttack($p1, $p2) === 3 && $_SESSION['pl'] === 2)
            echo '<td bgcolor="BLUE" class = "gridtd"><a href="index.php?shoot=l"></a></td>';
            else
            echo '<td bgcolor="GREEN" class = "gridtd"></td>';
          }
          else if ($p2->getY() === $i && $p2->getX() === $j){
            if ($w1->canAttack($p2, $p1) === 1 && $_SESSION['pl'] === 1)
            echo '<td bgcolor="BLUE" class = "gridtd"><a href="index.php?shoot=s"></a></td>';
            else if ($w1->canAttack($p2, $p1) === 2 && $_SESSION['pl'] === 1)
            echo '<td bgcolor="BLUE" class = "gridtd"><a href="index.php?shoot=m"></a></td>';
            else if ($w1->canAttack($p2, $p1) === 3 && $_SESSION['pl'] === 1)
            echo '<td bgcolor="BLUE" class = "gridtd"><a href="index.php?shoot=l"></a></td>';
            else
            echo '<td bgcolor="RED" class = "gridtd"></td>';
          }
          else
          {
            if (((($j <= $p1->getX() + $p1->getMove() && $j >= $p1->getX() - $p1->getMove()) && $i === $p1->getY()) ||
            (($i <= $p1->getY() + $p1->getMove() && $i >= $p1->getY() - $p1->getMove()) && $j === $p1->getX())) &&
            $_SESSION['pl'] === 1)
            {
              if (($j + $p1->getMove()) >= $p2->getX() && $i == $p2->getY() && $j > $p1->getX() && $p1->getX() < $p2->getX())
              {
                if ($j < $p2->getX())
                echo '<td bgcolor="orange" class = "gridtd"><a href="index.php?x='.$j.'&y='.$i.'"></a></td>';
                else
                echo '<td bgcolor="white" class = "gridtd"></td>';
              } else if (($i + $p1->getMove()) >= $p2->getY() && $j == $p2->getX() && $i > $p1->getY() && $p1->getY() < $p2->getY())
              {
                if ($i < $p2->getY())
                echo '<td bgcolor="orange" class = "gridtd"><a href="index.php?x='.$j.'&y='.$i.'"></a></td>';
                else
                echo '<td bgcolor="white" class = "gridtd"></td>';
              }else if ($j < $p2->getX() && $i == $p2->getY() && $p2->getY() == $p1->getY() && $p2->getX() < $p1->getX()) {
                echo '<td bgcolor="white" class = "gridtd"></td>';
              }else if ($i < $p2->getY() && $j == $p2->getX() && $p2->getX() == $p1->getX() && $p2->getY() < $p1->getY()) {
                echo '<td bgcolor="white" class = "gridtd"></td>';
              }
              else
              {
                echo '<td bgcolor="orange" class = "gridtd"><a href="index.php?x='.$j.'&y='.$i.'"></a></td>';
              }
            }
            else if (((($j <= $p2->getX() + $p2->getMove() && $j >= $p2->getX() - $p2->getMove()) && $i === $p2->getY()) ||
            (($i <= $p2->getY() + $p2->getMove() && $i >= $p2->getY() - $p2->getMove()) && $j === $p2->getX())) &&
            $_SESSION['pl'] === 2)
            {
              if (($j + $p2->getMove()) >= $p1->getX() && $i == $p1->getY() && $j > $p2->getX() && $p2->getX() < $p1->getX())
              {
                if ($j < $p1->getX())
                echo '<td bgcolor="orange" class = "gridtd"><a href="index.php?x='.$j.'&y='.$i.'"></a></td>';
                else
                echo '<td bgcolor="white" class = "gridtd"></td>';
              } else if (($i + $p2->getMove()) >= $p1->getY() && $j == $p1->getX() && $i > $p2->getY() && $p2->getY() < $p1->getY())
              {
                if ($i < $p1->getY())
                echo '<td bgcolor="orange" class = "gridtd"><a href="index.php?x='.$j.'&y='.$i.'"></a></td>';
                else
                echo '<td bgcolor="white" class = "gridtd"></td>';
              }else if ($j < $p1->getX() && $i == $p1->getY() && $p1->getY() == $p2->getY() && $p1->getX() < $p2->getX()) {
                echo '<td bgcolor="white" class = "gridtd"></td>';
              }else if ($i < $p1->getY() && $j == $p1->getX() && $p1->getX() == $p2->getX() && $p1->getY() < $p2->getY()) {
                echo '<td bgcolor="white" class = "gridtd"></td>';
              }
              else
              {
                echo '<td bgcolor="orange" class = "gridtd"><a href="index.php?x='.$j.'&y='.$i.'"></a></td>';
              }
            }
            else
            echo '<td bgcolor="white" class = "gridtd"></td>';
          }
        }
        echo '</tr>';
      }
      ?>
    </table>
  </form>
</body>
</html>
