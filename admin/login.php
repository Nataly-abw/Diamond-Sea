<?php
include "./basics/panel.php";
?>

<!-- Navigation Bar -->
<?php 
include "./basics/admin_navbar.php"; 
?>

<!-- CSS Scripts -->
<link href="./css/login_reg.css" rel="stylesheet">

<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<p class="formHeading">Sign In</p>
			<hr style="border-color: #0077b6;">
			<p class="message"></p>
			<form id="admin-login-form">
				<div class="form-group">
					<label for="email" class="formLabels">Email Address:</label>
					<input type="email" class="form-control formInputs" name="email" id="email">
				</div>
				<div class="form-group">
					<label for="password" class="formLabels">Password:</label>
					<input type="password" class="form-control formInputs" name="password" id="password">
				</div>
				<input type="hidden" name="admin_login" value="1">
				<div class="submitBttnBox">
					<button type="button" class="btn btn-primary login-btn submitBttn">Sign In</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
include "./basics/footer.php"; 
?>

<!-- JS Scripts -->
<script type="text/javascript" src="./js/main.js"></script>