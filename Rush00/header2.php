<?php
session_start();
echo '
<div id="header">

    <div id="site_title"><h1><a rel="nofollow" href="#">Wethinkcode Store</a></h1></div>

    <div id="twitter"><a href="#"></a></div>

    <div class="cleaner"></div>
  </div>

  <div id="menu">
    <ul>
      <li><a class="left" href="home.php">Home</a></li>
      <li><a class="left" href="products.php">Products</a></li>
      <li><a class="left" href="contact.php">Contact</a></li>';
       if ($_SESSION['curr_user']){
         echo '<li><a class="right" href="logout.php">Logout</a></li>';
        }else {
          echo '<li><a class="right" href="create.php">Register</a></li>
                <li><a class="right" href="login.php">Login</a></li>';
        }
      echo'<li><a class="right" href="basket.php">Basket</a></li>
    </ul>
    <div class="cleaner"></div>
  </div>';
?>
