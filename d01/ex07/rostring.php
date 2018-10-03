#!/usr/bin/php
<?php
function epur($str1)
{
  $str = trim($str1);
  $out = preg_replace('/ +/', ' ', $str);
  return ($out);
}
function ft_split($str)
{
$arr = explode(" ", $str);
$ret = array();
foreach($arr as $key)
{
  if (!empty($key))
    $ret[] = $key;
}
unset($arr);
return ($ret);
}
if ($argc > 1)
{
  $str = epur($argv[1]);
  $arr = ft_split($str);
  $temp_val = $arr[0];
  $out = array_slice($arr, 1);
  array_push($out, $temp_val);
  $final = implode(" ", $out);
  echo $final . "\n";
}
?>
