<?php
//require "config/constants.php";

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
	<link rel="stylesheet" type="text/css" href="./mainCSS/customer_order.css">
	<link rel="stylesheet" type="text/css" href="./mainCSS/webLoader.css">
	<link rel="stylesheet" type="text/css" href="./mainCSS/font.css">

	<style>
		table tr td {
			padding: 10px;
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
	<?php
		include("navigation_bar.php");
	?>
	
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default mainPanel">
					<div class="panel-body">
						<h1 class="headingTitle">Order details</h1>
						<hr class="divider"/>
						<?php
						include_once("db.php");
						$user_id = $_SESSION["uid"];
						$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,p.product_title,p.product_price,p.product_image FROM orders o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
						$query = mysqli_query($con, $orders_list);
						if (mysqli_num_rows($query) > 0) {
							while ($row = mysqli_fetch_array($query)) {
						?>
								<div class="row">
									<div class="col-md-6">
										<img class="itemImg" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail" />
									</div>
									<div class="col-md-6">
										<table>
											<tr>
												<td class="item">Item Name:</td>
												<td class="itemDesc"><?php echo $row["product_title"]; ?></td>
											</tr>
											<tr>
												<td class="item">Item Price:</td>
												<td class="itemDesc"><?php echo  CURRENCY . " " . $row["product_price"]; ?></td>
											</tr>
											<tr>
												<td class="item">Quantity:</td>
												<td class="itemDesc"><?php echo $row["qty"]; ?></td>
											</tr>
											<tr>
												<td class="item">Transaction Id:</td>
												<td class="itemDesc"><?php echo $row["trx_id"]; ?></td>
											</tr>
										</table>
									</div>
								</div>
						<?php
							}
						}
						?>

					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>

</html>