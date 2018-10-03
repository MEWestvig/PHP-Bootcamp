#!/usr/bin/php
<?php
function ft_split($str)
{
	$arr = explode(" ", $str);
	sort($arr);
	$ret = array();
	foreach($arr as $key)
	{
	  if (!empty($key))
 	   $ret[] = $key;
	}
	unset($arr);
	return ($ret);
}
?>
