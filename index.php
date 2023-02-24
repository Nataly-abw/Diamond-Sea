<?php
require "config/constants.php";
session_start();
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
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
	<link rel="stylesheet" type="text/css" href="./mainCSS/cart_dropdown.css">
	<link rel="stylesheet" type="text/css" href="./mainCSS/loading.css">
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
	<div class="navbarStyle navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed burgerMenuBttn" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">
					<img src="./images/logoW.png" class="logoStyling">
				</a>
			</div>
			<div class="collapse navbar-collapse blueBorder" id="collapse">
				<form class="navbar-form navbar-left blueBorder">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="What are you looking for" id="search" style="box-shadow: unset !important; text-decoration: none !important;">
					</div>
					<div class="searchBoxBttn">
						<button type="submit" class="btn btn-primary searchbttn" id="search_btn">Search</button>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li class="liIconStyling"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<area title="Account" class="iconStyling glyphicon glyphicon-user"></a>

						<ul class="dropdown-menu">
							<div style="width:300px;">
								<div class="panel panel-primary primaryPanel">
									<div class="panel-heading headingPanel">Sign In</div>
									<div class="panel-heading bodyPanel">
										<form onsubmit="return false" id="login">
											<label for="email" class="formLabels">Email Address:</label>
											<input type="email" class="form-control" name="email" id="email" required />
											<label for="email" class="formLabels">Password:</label>
											<input type="password" class="form-control" name="password" id="password" required />
											<p><br /></p>
											<div class="signInBttnBox">
												<input type="submit" class="btn btn-success signInBttn" value="Sign In">
											</div>
											<div>
												<a href="#" class="formLinks">Forgot your password?</a>
											</div>
											<div>
												<a href="customer_registration.php?register=1" class="formLinks">Create new account.</a>
											</div>
										</form>
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
							</div>
						</ul>
					</li>

					<li class="liIconStyling"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Cart<area title="Cart" class="iconStyling glyphicon glyphicon-shopping-cart"><span class="badge cartBadge">0</span></a>
						<div class="dropdown-menu">
							<div class="panel panel-success cartPrimaryPanel">
								<div class="panel-heading cartHeadingPanel">
									<div class="row">
										<div class="col-md-3">Item N°</div>
										<div class="col-md-3">Item</div>
										<div class="col-md-3"></div>
										<div class="col-md-3">Total in <?php echo CURRENCY; ?></div>
									</div>
								</div>
								<div class="panel-body cartBodyPanel">
									<div id="cart_product">
										<!-- <div class="row">
											<div class="col-md-3">Item N°</div>
											<div class="col-md-3">Item</div>
											<div class="col-md-3"></div>
											<div class="col-md-3">Total in $.</div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Image Slider -->
	<?php
	include("imageSlider.php");
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_category">
				</div>
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a class="menuStyling" href="#"><h4>Categories</h4></a></li>
					<li class="categoryItemsStyling focuslia"><a href="#">Categories</a></li>
					<li class="categoryItemsStyling focuslia"><a href="#">Categories</a></li>
					<li class="categoryItemsStyling focuslia"><a href="#">Categories</a></li>
					<li class="categoryItemsStyling focuslia"><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
				</div>
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a class="menuStyling" href="#"><h4>Collections</h4></a></li>
					<li class="categoryItemsStyling focuslia"><a href="#">Collections</a></li>
					<li class="categoryItemsStyling focuslia"><a href="#">Collections</a></li>
					<li class="categoryItemsStyling focuslia"><a href="#">Collections</a></li>
					<li class="categoryItemsStyling focuslia"><a href="#">Collections</a></li>
				</div> -->
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info panell">
					<div class="panel-heading productsPanelTitle">Items</div>
					<div class="panel-body">
						<div id="get_product">
							<!-- Here we get item jquery Ajax Request -->
						</div>

						<!--<div class="col-md-4">
							<div class="panel panel-info productPanelstyling">
								<div class="panel-body">
									<img src="product_images/blueneck.jpg" class= "productImgStyling"/>
								</div>
								<div class="panel-heading productPanelStylingUpper">Sapphire Necklace</div>
								<div class="panel-heading productPanelStylingLower">$500
									<button style="float:right;" class="btn btn-danger btn-xs addToCartBttn">AddToCart</button>
								</div>
							</div>
						</div>-->

					</div>
					<div class="col-md-1"></div>
				</div>
			</div>

			<!-- Footer -->
			<?php
			include("footer.php");
			?>
</body>

</html>