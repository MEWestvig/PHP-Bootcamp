<?php
if ($argc > 1)
{
  $arr = explode($argv[1]);
  $days = array(
    1 => "monday",
    2 => "tuesday",
    3 => "wednesday",
    4 => "thursday",
    5 => "friday",
    6 => "saturday",
    7 => "sunday",
    8 => "lundi",
    9 => "mardi",
    10 => "mercredi",
    11 => "jeudi",
    12 => "vendredi",
    13 => "samedi",
    14 => "dimanche");
  $months = array(
    1 => "january",
    2 => "february",
    3 => "march",
    4 => "april",
    5 => "may",
    6 => "june",
    7 => "july",
    8 => "august",
    9 => "september",
    10 => "october",
    11 => "november",
    12 => "december",
    13 => "janvier",
    14 => "fevrier",
    15 => "mars",
    16 => "avril",
    17 => "mai",
    18 => "juin",
    19 => "juillet",
    20 => "aout",
    21 => "septembre",
    22 => "octobre",
    23 => "novembre",
    24 => "decembre");
  if (count($arr) != 5)
  {
    print("Wrong format!");
    exit(1);
  }

}
?>
