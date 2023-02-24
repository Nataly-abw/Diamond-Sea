<?php
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}
//in action.php page if user click on "ready to checkout" button that time we will pass data in a form from action.php page
if (isset($_POST["login_user_with_product"])) {
	//this is product list array
	$product_list = $_POST["product_id"];
	//here we are converting array into json format because array cannot be stored in cookie
	$json_e = json_encode($product_list);
	//here we are creating cookie and name of cookie is product_list
	setcookie("product_list", $json_e, strtotime("+1 day"), "/", "", "", TRUE);
}
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
	<link rel="stylesheet" type="text/css" href="./mainCSS/account_dropdown.css">
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
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary primaryPanel">
					<div class="panel-heading headingPanel" style="font-size: x-large;">Sign In</div>
					<div class="panel-body bodyPanel">
						<!--User Login Form-->
						<form onsubmit="return false" id="login">
							<label for="email" class="formLabels">Email Address:</label>
							<input type="email" class="form-control" name="email" id="email" required />
							<label for="email" class="formLabels">Password:</label>
							<input type="password" class="form-control" name="password" id="password" required />
							<p><br /></p>
							<div class="signInBttnBox">
								<input type="submit" class="btn btn-success signInBttn" value="Sign In">
							</div>
							<div class="formLinksdiv">
								<a href="#" class="formLinks">Forgot your password?</a>
							</div>
							<div class="formLinksdiv">
								<a href="customer_registration.php?register=1" class="formLinks">Create new account.</a>
							</div>
						</form>
					</div>
					<div class="panel-footer">
						<div id="e_msg"></div>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>

</html>