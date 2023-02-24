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
		<p class="formHeading">Registration Form</p>
		<hr style="border-color: #0077b6;">
			<p class="message"></p>
			<form id="admin-register-form">
			  <div class="form-group">
			    <label for="name" class="formLabels">First Name:</label>
			    <input type="text" class="form-control formInputs" name="name" id="name">
			  </div>
			  <div class="form-group">
			    <label for="email" class="formLabels">Email Address:</label>
			    <input type="email" class="form-control formInputs" name="email" id="email">
			  </div>
			  <div class="form-group">
			    <label for="password" class="formLabels">Password:</label>
			    <input type="password" class="form-control formInputs" name="password" id="password">
			  </div>
			  <div class="form-group">
			    <label for="cpassword" class="formLabels">Confirm Password:</label>
			    <input type="password" class="form-control formInputs" name="cpassword" id="cpassword">
			  </div>
			  <input type="hidden" name="admin_register" value="1">
			  <div class="submitBttnBox">
			  	<button type="button" class="btn btn-primary register-btn submitBttn">REGISTER</button>
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
