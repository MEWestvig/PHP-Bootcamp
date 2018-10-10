<?php
class Targaryen
{
  function getBurned()
  {
    if ($this->resistsFire())
      return ("emerges naked but unharmed");
    return ("burns alive");
  }
  public function resistsFire() {
		return false;
  }
}

?>
