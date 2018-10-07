<html lang="en">
<?php session_start(); ?>
<head>
	<meta charset="UTF-8">
	<title>Basket</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<?php

?>
<body>
	<div id="body_wrapper">
		<div id="wrapper">
			<?php include_once('header2.php');
			?>
			<div id="middle_subpage">
				<h2>Cart</h2>
			</div>
			<div id="main"><span class="tm_top"></span>

				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
					<div class="mid_box">
						<?php
						$cart = unserialize(file_get_contents('resources/' . $_SESSION['curr_user']));
						$stock = unserialize(file_get_contents('resources/stock'));
						echo '<table>';
						foreach ($stock as $item) {
							if ($item['price'] == $cart){
								echo '<div style="
								box-shadow: 3px 4px 50px green;
								width:700px;
								height:80px;
								border-radius: 5px;
								background-color: white;
								text-align:center;
								position: absolute;
								left: -250px;
								">';
								echo "<img align='middle' style='width:80px;height:80px;' src='".$item['path']."' />";
								echo '<div style="display: inline-block; width:50%;">';
								echo $item['brand']."  -  ".$item['model']."  ".$item['size'];
								echo " ("."R".$item['price'].")</div>";
								echo '</div>';
								echo '<br />';
							}
						}
						?>
					</table>
				</div>
			</form>
			<div class="cleaner"></div>
			<div class="cleaner"></div>

			<div class="cleaner"></div>
		</div>
		<div id="tm_bottom"></div>
		<div id="footer">
			Copyright © 2018 <a href="#">WTC_Students</a>
		</div>
	</div>
	<div class="cleaner"></div>
</div>
</body>
</html>
