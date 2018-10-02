<?PHP
include("ft_is_sort.php");
$tab = array("Test", "42", "Hello World", "hi", "zZzZzZz", "quit");
if (ft_is_sort($tab))
  echo "The array is sorted\n";
else
  echo "The array is not sorted\n";
?>
