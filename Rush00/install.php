#!/usr/bin/php
<?php
$stockpath = 'resources/stock';
if (!file_exists('resources/init.csv'))
{
	echo "Error: No init file found in resources/";
	exit();
}
$file = file('resources/init.csv');
$stock = array();
$id = 0;
foreach ($file as $line)
{
	$values = explode(';', $line);
	$stock[$id]['brand'] = $values[0];
	$stock[$id]['model'] = $values[1];
	$stock[$id]['size'] = $values[2];
	$stock[$id]['price'] = $values[3];
	$stock[$id]['path'] = $values[4];
	$stock[$id]['id_num'] = $value[5];
	$id++;
}
file_put_contents($stockpath, serialize($stock));
?>
