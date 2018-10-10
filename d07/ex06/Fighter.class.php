<?php
class Fighter
{
  private $type;
  function __construct($type)
  {
    $this->type = $type;
  }
  function getType()
  {
    return $this->type;
  }
}
?>
