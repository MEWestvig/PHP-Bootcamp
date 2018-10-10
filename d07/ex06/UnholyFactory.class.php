<?php
class UnholyFactory
{
  private $army = array();

  public function absorb($p)
  {
    if (get_parent_class($p) === 'Fighter')
    {
      if (isset($this->army[$p->getType()]))
      {
        print("(Factory already absorbed a fighter of type " . $p->getType() . ")" . PHP_EOL);
      }
      else {
        print("(Factory absorbed a fighter of type ". $p->getType() . ")" . PHP_EOL);
        $this->army[$p->getType()] = $p;
      }
    }
    else {
      print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
    }
  }
  public function fabricate($i)
  {
    if (array_key_exists($i, $this->army))
    {
      print("(Factory fabricates a fighter of type " . $i . ")" . PHP_EOL);
      return (clone $this->army[$i]);
    }
    else {
      print("(Factory hasn't absorbed any fighter of type " . $i . ")" . PHP_EOL);
      return null;
    }
  }
}
?>
