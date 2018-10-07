<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if ($_POST['login'] && $_POST['passwd'])
	{
		$url = '../private/passwd';
		if (!file_exists('../private'))
		mkdir("../private");
		if (!file_exists($url))
		file_put_contents($url, null);
		$accounts = unserialize(file_get_contents($url));
		if ($accounts){
			$bool = 0;
			foreach ($accounts as $key => $val) {
				if ($val['login'] === $_POST['login'])
				$bool = 1;
			}
		}
		if ($bool)
		echo "ERROR\n";
		else {
			$tmp['login'] = $_POST['login'];
			$tmp['passwd'] = hash('whirlpool', $_POST['passwd']);
			$accounts[] = $tmp;
			file_put_contents($url, serialize($accounts));
			echo "OK\n";
			header('Refresh: 0; URL=login.php');
		}
	} else {
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
						<h1>Register</h1><br>
						<label for="login"><b>Username</b></label>
						<input type="text" placeholder="Enter Username" name="login" required>
						<br />
						<label for="passwd"><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="passwd" required>
						<br />
						<label for="cpasswd"><b>Confirm</b></label>
						<input type="password" placeholder="Confirm Password" name="cpasswd" required>
						<?php echo "<b style='color:red;'>".$message."</b><br>"; ?>
						<button type="submit">Register</button>
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
