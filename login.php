<?php
include "db.php";

session_start();

/* If the user inputs matches with the data available in the database, the login in succeeded. 
	Then #login_success string will call the function $("#login").click(). */
if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = md5($_POST["password"]);
	$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);

	/* If the user's data is available in the database then $count will be equal to 1. */
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["name"] = $row["first_name"];
		$ip_add = getenv("REMOTE_ADDR");
		/* There's a cookie in login_form.php, if that cookie is available it means that the user is not logged in. */
			if (isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				/*Here we are converting stored JSON products list cookie into an array. */
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) { 
					/* After getting the user's id from database, we'll check the users shopping cart if there's already product in it or not.. */
					$verify_cart = "SELECT id FROM cart WHERE user_id = $_SESSION[uid] AND p_id = ".$product_list[$i];
					$result  = mysqli_query($con,$verify_cart);
					if(mysqli_num_rows($result) < 1){
						/* If the user is adding a specific item in the cart for the first time then we'll update user_id into database table with valid id. */
						$update_cart = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND user_id = -1";
						mysqli_query($con,$update_cart);
					} else {
						/* If the user is trying to add an existing item to the cart, then the record will get deleted. */
						$delete_existing_product = "DELETE FROM cart WHERE user_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i];
						mysqli_query($con,$delete_existing_product);
					}
				}
				/* Destroying user cookie. */
				setcookie("product_list","",strtotime("-1 day"),"/");
				/* If the user was logging in from the cart page then we'll redicrect him to cart.php after he logged in. */
				echo "cart_login";
				exit();
				
			}
			echo "login_success";
			exit();
		} else {
			echo "<span class='loginMssg'>The Email Address or Password you entered is incorrect.</span>";
			exit();
		}
}

?>