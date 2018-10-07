<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<?php
require_once('auth.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	if ($login && $passwd && auth($login, $passwd))
	{
		$_SESSION['curr_user'] = $login;
		echo "Successfully Logged in\n";
		header("Location: index.php");
	}
	else
	{
		$_SESSION['curr_user'] = '';
		echo "ERROR\n";
	}
}
?>
<body>
	<div id="body_wrapper">
		<div id="wrapper">
			<?php include_once('header2.php');
			?>
			<div id="middle_subpage">
				<h2>Login</h2>
			</div>
			<div id="main"><span class="tm_top"></span>

					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
						<div class="mid_box">
							Username : <input type="text" name="login" value="" required/><br />
							Password : <input type="password" name="passwd" value="" required/><br />
							<input type="submit" name="submit" value="OK"/>
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
