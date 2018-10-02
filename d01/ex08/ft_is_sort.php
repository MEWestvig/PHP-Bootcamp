<?php
function ft_is_sort($arr)
{
  $new = $arr;
  sort($new);
  return ($new == $arr);
}
?>
