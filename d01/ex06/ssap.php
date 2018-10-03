#!/usr/bin/php
<?php
function epur($str1)
{
  $str = trim($str1);
  $out = preg_replace('/ +/', ' ', $str);
  return ($out);
}
$final = array();
foreach (array_slice($argv, 1) as $arg) {
  $pur = explode(" ", epur($arg));
  $final = array_merge($final, $pur);
}
sort($final);
foreach($final as $word)
{
  echo $word . "\n";
}
?>
