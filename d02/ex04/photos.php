#!/usr/bin/php
<?php
function download($str)
{
  $c = curl_init($str);
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  $data = curl_exec($c);
  curl_close($c);
  return ($data);
}
if ($argc < 2)
  exit ();
$input = $argv[1];
$input = preg_replace('/^.*:\/\//', '', $input);
$text = download($input);
if (preg_match("/<img src=\"(.+)\" .+/", $text, $matches) > 0)
{
  exec("mkdir $input");
  unset($matches[0]);
  foreach ($matches as $m) {
    $name = explode("/", $m);
    $fd = fopen($input . "/" . end($name), 'w');
    $data = download($m);
    fwrite($fd, $data);
    fclose($fd);
  }
}
?>
