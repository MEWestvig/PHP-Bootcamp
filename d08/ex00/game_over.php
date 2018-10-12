<?php
  $winner = $_GET['winner'];
?>
<html>
<body>
  <h1 style='text-align: center'>Congratulations <?php echo $winner?>! You have won!</h1>
</body>
</html>
<?php
  header( "refresh:5;url=destroy.php");
?>
