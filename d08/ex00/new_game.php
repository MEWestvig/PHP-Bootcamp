<?php
session_start();
$_SESSION['p1'] = '';
$_SESSION['p2'] = '';
session_destroy();
?>
<html>
<body>
  <?php
  $names = array("Death of Worlds", "Deathdealer", "Scourge of Malice", "Thunder Child", "Warspite", "Sovereign of Space");
   ?>
   <img src="resources/rocket.png" style="display: block; margin-left: auto; margin-right: auto; width: 10%;">
  <form style="margin: 0 auto; width:250px;" action="index.php" method="post">
    <fieldset>
      Player 1 info:<br \>
      Ship name:<br>
      <?php
      echo '<input type="text" name="p1" value="'.$names[rand(0,5)].'"><br>';
      ?>
      Player 2 info:<br \>
      Ship name:<br>
      <?php
      echo '<input type="text" name="p2" value="'.$names[rand(0,5)].'"><br>';
      ?>
      <input type="submit" value="Submit">
      <a href="docs.php">Documents</a>
    </fieldset>
  </form>
</body>
</html>
