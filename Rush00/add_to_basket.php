<?php
session_start();
if ($_GET['item'])
{
  if (!$_SESSION['curr_user'] == ''){
      $url = 'resources/' . $_SESSION['curr_user'];
    }else {
      $url = 'resources/temp';
    }
    $item = $_GET['item'];
    file_put_contents($url, serialize($item));
    header('Refresh: 0; URL=basket.php');
}
?>
