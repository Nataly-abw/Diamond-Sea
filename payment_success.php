<?php
session_start();
if (!isset($_SESSION["uid"])) {
	header("location:index.php");
}

if (isset($_GET["st"])) {

	$trx_id = $_GET["tx"];
	$p_st = $_GET["st"];
	$amt = $_GET["amt"];
	$cc = $_GET["cc"];
	$cm_user_id = $_GET["cm"];
	$c_amt = $_COOKIE["ta"];
	if ($p_st == "Completed") {



		include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$cm_user_id'";
		$query = mysqli_query($con, $sql);
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				$product_id[] = $row["p_id"];
				$qty[] = $row["qty"];
			}

			for ($i = 0; $i < count($product_id); $i++) {
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status) VALUES ('$cm_user_id','" . $product_id[$i] . "','" . $qty[$i] . "','$trx_id','$p_st')";
				mysqli_query($con, $sql);
			}

			$sql = "DELETE FROM cart WHERE user_id = '$cm_user_id'";
			if (mysqli_query($con, $sql)) {
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
					<link rel="stylesheet" type="text/css" href="./mainCSS/payment_success.css">
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
										<h1 class="headingTitle">Dear <?php echo "<b>" . $_SESSION["name"] . "</b>"; ?>,</h1>
										<hr class="divider" />
										<p class="successPaymentMssg">Thank you for your order! We hope you enjoyed shopping with us.</b><br />
											Your payment process is completed and your transaction id is: <b><?php echo $trx_id; ?>.</b><br />

											For order information:</p></b>
										<div class="orderInfoBttnBox">
											<a href="customer_order.php" class="btn btn-success btn-lg orderInfoBttn">Order Information</a>
										</div>
										</b><br />
										<div class="continueShopBttnBox">
											<a href="profile.php" class="btn btn-success btn-lg continueShopBttn">Continue Shopping</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</body>

				</html>

<?php
			}
		} else {
			header("location:index.php");
		}
	}
}



?>