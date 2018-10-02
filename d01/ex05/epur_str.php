<?php
if ($argc == 2)
{
  $arg = trim($argv[1]);
  $str = preg_replace('/ +/', ' ', $arg);
  print($str);
  print("\n");
}
?>
