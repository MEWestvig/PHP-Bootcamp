<?php
echo "Enter a number: ";
$f = '';
while(fscanf(STDIN, "%s\n", $f))
{
  if (is_numeric($f))
  {
    if ($f % 2 == 0)
      echo "The number " . $f . " is even\n";
    else
      echo "The number " . $f . " is odd\n";
  }
  else {
    echo "'" . $f . "' is not a number\n";
  }
  echo "Enter a number: ";
}
echo "\n";
?>
