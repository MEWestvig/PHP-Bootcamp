<?php
?>
<html>
<body>
  <?php
  $names = array("Death of Worlds", "Deathdealer", "Scourge of Malice", "Thunder Child", "Warspite", "Sovereign of Space");
   ?>
  <form action="index.php" method="post">
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
    </fieldset>
  </form>
  <button id="button">Roll Dice</button>
  <script src="dice.js"></script>
</body>
</html>
