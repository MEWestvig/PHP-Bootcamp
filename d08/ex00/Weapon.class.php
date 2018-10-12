<?php
class Weapon extends Player
{
  protected $short = array(1, 30);
  protected $mid = array(31, 60);
  protected $long = array(61, 90);
  protected $dist = 0;

  function __construct()
  {
  }

  function dealDamage($player)
  {
    $player->health -= 1;
  }
  function canAttack($activeP, $otherP)
  {
    if ($activeP->getX() === $otherP->getX())
    {
      $this->dist = abs($otherP->getY() - $activeP->getY());
    }
    else if ($activeP->getY() === $otherP->getY())
    {
      $this->dist = abs($otherP->getX() - $activeP->getX());
    }
    else {
      return (0);
    }
    if ($this->dist >= $this->short[0] && $this->dist <= $this->short[1])
      return (1);
    else if ($this->dist >= $this->mid[0] && $this->dist <= $this->mid[1])
      return (2);
    else if ($this->dist >= $this->long[0] && $this->dist <= $this->long[1])
      return (3);
    else {
      return (0);
    }
    return (0);
  }
  public static function doc() {
   $read = fopen("Weapon.doc.txt", 'r');
   echo "\n";
   while ($read && !feof($read))
     echo fgets($read);
   echo "\n";
  }
}
?>
