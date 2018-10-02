<?php
$arr1 = explode(" ", $argv[1]);
for ($i=2; $i < $argc; $i++) {
  $arr = array_merge($arr1, explode(" ", $argv[i]));
}
sort($arr);
$ret = array();
foreach($arr as $key)
{
  if (!empty($key))
    $ret[] = $key;
}
unset($arr);
for ($j=0; $j < count($ret) ; $j++) {
  print($ret[i] . "\n");
}
?>
