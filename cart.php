<?php
require "config/constants.php";
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
	<link rel="stylesheet" type="text/css" href="./mainCSS/cart.css">
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
			<div class="col-md-8" id="cart_msg">
				<!--Alert Messages-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary primaryPanel">
					<div class="panel-heading headingPanel">Shopping Bag</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2 cartCols"><b>Item</b></div>
							<div class="col-md-2 col-xs-2 cartCols"><b>Item Name</b></div>
							<div class="col-md-2 col-xs-2 cartCols"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2 cartCols"><b>Item Price</b></div>
							<div class="col-md-2 col-xs-2 cartCols"><b>Total in <?php echo CURRENCY; ?></b></div>
							<div class="col-md-2 col-xs-2 cartCols"><b></b></div>
						</div>
						<div id="cart_checkout"></div>
						<!--<div class="row">
							<div class="col-md-2"><img src='product_images/imges.jpg'></div>
							<div class="col-md-2">Item Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='200' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='200' disabled></div>
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
						</div> -->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total $400</b>
						</div> -->
					</div>
				</div>
				<!-- <div class="panel-footer"></div> -->
			</div>
		</div>
		<div class="col-md-2"></div>

	</div>

	<script>
		var CURRENCY = '<?php echo CURRENCY; ?>';
	</script>
</body>

</html>