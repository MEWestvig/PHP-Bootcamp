<?php
if ($argc > 1)
{
  $arg = trim($argv[1]);
  $str = preg_replace('/ +/', ' ', $arg);
  print($str);
  print("\n");
}
?>
