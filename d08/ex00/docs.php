<?php
include('Player.class.php');
include('Weapon.class.php');
$p = new Player($_POST['p1'], 0, $board_x, $board_y);
$w = new Weapon();
?>
<html>
<body>
  <div>
    <?php
    $p->doc();
    ?>
  </div>
  <br \>
  <div>
    <?php
    $w->doc();
    ?>
  </div>
</body>
</html>
