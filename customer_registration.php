<?php
if (isset($_GET["register"])) {

?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<title>Diamond Sea</title>
		<link rel="icon" href="./images/logoIcon.png" type="image/x-icon">

		<!-- Js Scripts -->
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>

		<!-- CSS Scripts -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="./mainCSS/indexStyle.css">
		<link rel="stylesheet" type="text/css" href="./mainCSS/customer_registration.css">
		<link rel="stylesheet" type="text/css" href="./mainCSS/webLoader.css">
		<link rel="stylesheet" type="text/css" href="./mainCSS/font.css">
	</head>

	<body>
		<!-- Web Loader -->
		<div class="wait overlay">
			<main class="loading-container">
				<p class="spinner-text"></p>
				<div class="spinner"></div>
			</main>
		</div>

		<!-- Navigation Bar -->
		<?php
			include("navigation_bar.php");
		?>
		
		<p><br /></p>
		<p><br /></p>
		<p><br /></p>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="signup_msg">
					<!--Alert Messages-->
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-primary primaryRegPanel">
						<div class="panel-heading headingPanel">Registration Form</div>
						<div class="panel-body">
							<form id="signup_form" onsubmit="return false">
								<div class="row">
									<div class="col-md-6">
										<label class="bodyLabels" for="f_name">First Name:</label>
										<input type="text" id="f_name" name="f_name" class="form-control">
									</div>
									<div class="col-md-6">
										<label class="bodyLabels" for="f_name">Last Name:</label>
										<input type="text" id="l_name" name="l_name" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="bodyLabels" for="email">Email Address:</label>
										<input type="text" id="email" name="email" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="bodyLabels" for="password">Password:</label>
										<input type="password" id="password" name="password" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="bodyLabels" for="repassword">Confirm Password:</label>
										<input type="password" id="repassword" name="repassword" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="bodyLabels" for="mobile">Phone Number:</label>
										<input type="text" id="mobile" name="mobile" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="bodyLabels" for="address1">Address:</label>
										<input type="text" id="address1" name="address1" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label class="bodyLabels" for="address2">City:</label>
										<input type="text" id="address2" name="address2" class="form-control">
									</div>
								</div>
								<p><br /></p>
								<div class="row">
									<div class="col-md-12 regBttnBox">
										<input value="REGISTER" type="submit" name="signup_button" class="btn btn-success btn-lg regBttn">
									</div>
								</div>
						</div>
						</form>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>

	</html>
<?php
}
?>