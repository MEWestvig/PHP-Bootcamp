<?php
session_start();
$_SESSION['p1'] = '';
$_SESSION['p2'] = '';
session_destroy();
sleep(1);
header('Location: '. "new_game.php");
?>
