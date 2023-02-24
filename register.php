<?php
session_start();
include "db.php";
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$nameValidation = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$phonenumberValidation = "/^[0-9]+$/";

if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
	empty($mobile) || empty($address1) || empty($address2)) {
		
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Fill all the fields.
			</div>
		";
		exit();
	} else {
		if(!preg_match($nameValidation,$f_name)) {
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				The name you entered: <b>'$f_name'</b> is not valid.
			</div>
		";
		exit();
	}
	if(!preg_match($nameValidation,$l_name)) {
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				The last name you entered: <b>'$l_name'</b> is not valid.
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)) {
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				The Email Address you entered: <b>'$email'</b> is not valid.
			</div>
		";
		exit();
	}
	if(strlen($password) < 9 ) {
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Password must be at least 8 characters long.
			</div>
		";
		exit();
	}
	if(strlen($repassword) < 9 ) {
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Password must be at least 8 characters long.
			</div>
		";
		exit();
	}
	if($password != $repassword) {
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Password doesn't match.
			</div>
		";
		exit();
	}
	if(!preg_match($phonenumberValidation,$mobile)) {
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				The phone number you entered: <b>'$mobile'</b> is not valid.
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 8)) {
		echo "
			<div class='alert alert-warning failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				Phone number must be 8 digit.
			</div>
		";
		exit();
	}
	/* To check if the email address doesn't exist in the database. */
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger failAlert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				The Email Address you entered is already exist.
			</div>
		";
		exit();
	} else {
		$password = md5($password);
		$sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`, `address2`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$password', '$mobile', '$address1', '$address2')";
		$run_query = mysqli_query($con,$sql);
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["name"] = $f_name;
		$ip_add = getenv("REMOTE_ADDR");
		$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
		if(mysqli_query($con,$sql)){
			echo "register_success";
			exit();
		}
	}
	}
	
}

?>