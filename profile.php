<?php
require "config/constants.php";
session_start();
if (!isset($_SESSION["uid"])) {
	header("location:index.php");
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
	<link rel="stylesheet" type="text/css" href="./mainCSS/cart_dropdown.css">
	<link rel="stylesheet" type="text/css" href="./mainCSS/loading.css">
	<link rel="stylesheet" type="text/css" href="./mainCSS/webLoader.css">
	<link rel="stylesheet" type="text/css" href="./mainCSS/font.css">

	<style>
		@media screen and (max-width:480px) {
			#search {
				width: 80%;
			}

			#search_btn {
				width: 30%;
				float: right;
				margin-top: -32px;
				margin-right: 10px;
			}
		}
	</style>
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
						<input type="text" class="form-control" placeholder="What are you looking for" id="search">
					</div>
					<div class="searchBoxBttn">
						<button type="submit" class="btn btn-primary searchbttn" id="search_btn">Search</button>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li class="liIconStyling">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user iconStyling"></span><?php echo "Hi," . $_SESSION["name"]; ?></a>
						<ul class="dropdown-menu">
							<li><a href="cart.php" class="accountDropdownItems">Cart</a></li>
							<li class="divider"></li>
							<li><a href="customer_order.php" class="accountDropdownItems">Orders</a></li>
							<li class="divider"></li>
							<li><a href="logout.php" class="accountDropdownItems">Logout</a></li>
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
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg"></div>
				</div>
				<div class="panel panel-info panell" id="scroll">
					<div class="panel-heading productsPanelTitle">Items</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get item jquery Ajax Request-->
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
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#">1</a></li>
					</ul>
				</center>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php
		include("footer.php");
	?>
</body>

</html>