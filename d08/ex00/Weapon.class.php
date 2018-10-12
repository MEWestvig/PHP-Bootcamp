<?php
Class Weapon extends Player
{
  protected $name = "Nuatical Lance";
  protected $short = array(1, 30);
  protected $mid = array(31, 60);
  protected $long = array(61, 90);

  function dealDamage()
  {
    $player->health -= 1;
  }
}
?>
