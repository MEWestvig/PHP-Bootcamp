<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="body_wrapper">
		<div id="wrapper">
			<?php include_once('header2.php');?>
			<div id="middle_subpage">
				<h2>Products</h2>
			</div>
			<div id="main"><span class="tm_top"></span>
				<div class="col_w900 col_w900_last">
					<div id="gallery">

					</div>

					<?php
					$stock = unserialize(file_get_contents('resources/stock'));

        	$brand = 'All';
        	if ($_SERVER["REQUEST_METHOD"] == "POST")
            $brand = $_POST['brand'];
					$brands = array();
					$stock = unserialize(file_get_contents('resources/stock'));
					foreach ($stock as $item)
					{
						$itembrand = $item['brand'];
						if (!in_array(ucfirst($itembrand), $brands))
							array_push($brands, ucfirst($itembrand));
					if ($brand == 'All' || $brand == $item['brand'])
					{
						echo '<div style="
						display: inline-block;
						box-shadow: 3px 4px 50px green;
						overflow:hidden;
						margin:10px;
						width:50vw;
						height:80px;
						border-radius: 5px;
						background-color: white;
						">';
						echo "<img align='middle' style='width:80px;height:80px;' src='".$item['path']."' />";
						echo '<div style="display: inline-block; width:50%;">';
						echo $item['brand']."  -  ".$item['model']."  ".$item['size'];
						echo " ("."R".$item['price'].")"."<a href='add_to_basket.php?item=" . $item['price'] . "'>Add to cart</a>"."</div>";
						echo '</div>';
						echo '<br />';
					}
				}

					?>
					<div style="float: right; border-right:1px solid black; padding:10px;">
        <h1>Brand:</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input type="radio" name="brand" <?php if (isset($brand) && $brand=="All") echo "checked";?> value="All">All<br>
        <?php
        foreach ($brands as $curr)
        {
            echo '<input type="radio" name="brand" ';
            if (isset($brand) && $brand==$curr) echo "checked";
            echo ' value="'.$curr.'">'.$curr.'<br>';
        }
        ?>
        <br>
        <input type="submit" name="submit" value="Show">
        </form>
    </div>
					<div class="cleaner"></div>
					<div class="cleaner"></div>
				</div>
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
