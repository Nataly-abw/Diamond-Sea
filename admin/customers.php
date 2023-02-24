<?php session_start(); ?>

<?php
include_once("./basics/panel.php");
?>

<!-- Navigation Bar -->
<?php
include_once("./basics/admin_navbar.php");
?>

<!-- CSS Scripts -->
<link href="./css/addPopUp.css" rel="stylesheet">
<link href="./css/tabs.css" rel="stylesheet">

<p><br /></p>

<div class="container-fluid">
	<div class="row">

		<?php include
		"./basics/sidebar.php"; 
		?>

		<div class="row">
			<div class="col-10">
				<h3 class="welcomingAdmin">Customers List</h3>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-striped table-sm">
				<thead class="tableHead">
					<tr>
						<th>Customer Name</th>
						<th>Email Address</th>
						<th>Phone Number</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody id="customer_list">
					<!-- <tr>
              		<td>Diana</td>
              		<td>diana@gmail.com</td>
					<td>1234567</td>
					<td>Batroun</td>
					</tr> -->
				</tbody>
			</table>
		</div>
		</main>
	</div>
</div>

<?php
include_once("./basics/footer.php");
?>

<!-- JS Scripts -->
<script type="text/javascript" src="./js/customers.js"></script>