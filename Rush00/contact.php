<!DOCTYPE html>
<html>
<head>

	<title>Contact Form</title>

	<link href="style.css" rel="stylesheet" type="text/css" />

</head>
<body>

	<div id="body_wrapper">
		<div id="wrapper">
			<?php include_once('header2.php');?>

			<div id="middle_subpage">
				<h2>Contact Information</h2>
			</div>

			<div id="main"><span class="tm_top"></span>

				<div class="col_w900 col_w900_last">
					<div class="col_w420 float_l">

						<h3>Contact Form</h3>
						<div id="contact_form">

							<form method="post" name="contact" action="#">

								<label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
								<div class="cleaner h10"></div>

								<label for="email">Email:</label> <input type="text" class="validate-email required input_field" name="email" id="email" />
								<div class="cleaner h10"></div>

								<label for="subject">Subject:</label> <input type="text" class="validate-subject required input_field" name="subject" id="subject"/>
								<div class="cleaner h10"></div>

								<label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
								<div class="cleaner h10"></div>

								<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />

								<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />

							</form>
						</div>

					</div>

					<div class="col_w420 float_r" id="map">
						<h3>Our Location</h3>
						<a href="images/map_big.jpg" title="Our Location">
							<img src="images/map_thumb.jpg" alt="Our Location" />
						</a>

						<div class="cleaner h30"></div>

						<h3>Mailing Address</h3>
						<h6>Wethink Code</h6>
						P3 Terrace Level<br/>
						Portswood Square <br/>
						V & A Waterfront<br />
						Cape Town<br />
						8001<br />
						Tel: 021-077-0780<br />
						Fax: 022-055-0660
					</div>

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
