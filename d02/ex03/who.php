#!/usr/bin/php
<?php
function compare($a, $b)
{
  return (strcmp($a['tty'], $b['tty']));
}
date_default_timezone_set('Africa/Johannesburg');
$tab = array();
$fd = fopen("/var/run/utmpx", "r");
$format = "a256usr/a4id/a32tty/ipid/itype/Ltvsec/Itvusec/a256host/i16pad";
while ($bytes = fread($fd, 628))
{
  $unpacked = unpack($format, $bytes);
  $tab[] = $unpacked;
}
usort($tab, "compare");
foreach ($tab as $elem)
{
	$format = "%b %e %H:%M";
	if ($elem['type'] === 7)
	{
		echo preg_replace('/[\x00]/', '', $elem['usr']);
    echo " ";
    echo preg_replace('/[\x00]/', '', $elem['tty']);
    echo "  ";
    echo strftime($format, $elem['tvsec']);
    echo " \n";
	}
}
?>
