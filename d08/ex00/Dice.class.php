<?php
Class Dice
{
  function rollDice($numDice)
  {
    $out = 0;
    for ($i=0; $i < $numDice; $i++) {
      $roll = rand(1, 6);
      $out += $roll;
    }
    return ($out);
  }
}
?>
