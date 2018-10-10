<?php
class NightsWatch implements IFighter
{
  private $watch = array();

  public function recruit($p)
  {
    if ($p instanceof IFighter)
      $this->watch[] = $p;
  }
  function fight()
  {
    foreach ($this->watch as $key => $value) {
      $value->fight();
    }
  }
}

?>
