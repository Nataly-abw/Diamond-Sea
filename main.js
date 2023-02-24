$(document).ready(function () {
	cat();
	brand();
	product();
	
	/* cat() function role is to fetch the category data from database when the page is loaded. */
	function cat() {
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { category: 1 },
			success: function (data) {
				$("#get_category").html(data);
			}
		})
	}

	/* brand() function role is to fetch the collection data from database when the page is loaded. */
	function brand() {
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { brand: 1 },
			success: function (data) {
				$("#get_brand").html(data);
			}
		})
	}

	/* product() function role is to fetch the product data from database when the page is loaded. */
	function product() {
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { getProduct: 1 },
			success: function (data) {
				$("#get_product").html(data);
			}
		})
	}

	/* When the page is loaded and the user wants to click on a certain category(eg: necklaces, rings...), we get the category Id
		and show the items of the chosen category. */
	$("body").delegate(".category", "click", function (event) {
		$("#get_product").html("<div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
		event.preventDefault();
		var cid = $(this).attr('cid');

		$.ajax({
			url: "action.php",
			method: "POST",
			data: { get_seleted_Category: 1, cat_id: cid },
			success: function (data) {
				$("#get_product").html(data);
				if ($("body").width() < 480) {
					$("body").scrollTop(683);
				}
			}
		})
	})

	/* When the page is loaded and the user wants to click on a certain collection(eg: wedding collection, summer collection...), 
		we get the collection Id and show the items of the chosen collection. */
	$("body").delegate(".selectBrand", "click", function (event) {
		event.preventDefault();
		$("#get_product").html("<div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
		var bid = $(this).attr('bid');

		$.ajax({
			url: "action.php",
			method: "POST",
			data: { selectBrand: 1, brand_id: bid },
			success: function (data) {
				$("#get_product").html(data);
				if ($("body").width() < 480) {
					$("body").scrollTop(683);
				}
			}
		})
	})

	/* Search bar: when the user type a product name, we'll take the user input and match it to our database keywords column with the 
		help of SQL query and show the matched product. */
	$("#search_btn").click(function () {
		$("#get_product").html("<div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");
		var keyword = $("#search").val();
		if (keyword != "") {
			$.ajax({
				url: "action.php",
				method: "POST",
				data: { search: 1, keyword: keyword },
				success: function (data) {
					$("#get_product").html(data);
					if ($("body").width() < 480) {
						$("body").scrollTop(683);
					}
				}
			})
		}
	})
	/**/


	/* #login is the id of the login form (index.php).
		The entered data by the user will be sent to the login.php, if login => login_success, it means that 
		the user is now logged in and will be redirected from index.php or login.php to profile.php(window.location.href == profile.php). */
	$("#login").on("submit", function (event) {
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url: "login.php",
			method: "POST",
			data: $("#login").serialize(),
			success: function (data) {
				if (data == "login_success") {
					window.location.href = "profile.php";
				} else if (data == "cart_login") {
					window.location.href = "cart.php";
				} else {
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
	/**/

	/* Getting user information before checkout. */
	$("#signup_form").on("submit", function (event) {
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url: "register.php",
			method: "POST",
			data: $("#signup_form").serialize(),
			success: function (data) {
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "cart.php";
				} else {
					$("#signup_msg").html(data);
				}
			}
		})
	})
	/**/

	/* Adding product into the shopping cart. */
	$("body").delegate("#product", "click", function (event) {
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { addToCart: 1, proId: pid },
			success: function (data) {
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})
	/**/

	/* A function to count user's cart items. */
	count_item();
	function count_item() {
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { count_item: 1 },
			success: function (data) {
				$(".badge").html(data);
			}
		})
	}
	/**/

	/* A function to fetch shopping cart items from the database and drop them in the cart dropdown menu. */
	getCartItem();
	function getCartItem() {
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { Common: 1, getCartItem: 1 },
			success: function (data) {
				$("#cart_product").html(data);
			}
		})
	}
	/**/

	/*
		When the user changes the quantity of an item the total price changes automatically by using the keyup function.
		PS: When the user put somthing other than a number or number 0, then we'll make quantity = 1 always. */

	/*	('.total').each() is a loop funtion repeated for class .total, so that whenever the user changes the quatity
		we'll preform sum operation of the class .total and show the result in the class .net_total. */
	$("body").delegate(".qty", "keyup", function (event) {
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total = 0;
		$('.total').each(function () {
			net_total += ($(this).val() - 0);
		})
		$('.net_total').html("Total : $ " + net_total);
	})
	/**/

	/*	When the user click on .remove class, we'll take the product id of that row
		and send it to "action.php" to apply the removal process. */
	$("body").delegate(".remove", "click", function (event) {
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(".remove").attr("remove_id");
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { removeItemFromCart: 1, rid: remove_id },
			success: function (data) {
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})
	/**/

	/*	When the user click on .update class, we'll take the product id of that row
		and send it to "action.php" to apply the changes made by the user. */
	$("body").delegate(".update", "click", function (event) {
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { updateCartItem: 1, update_id: update_id, qty: qty },
			success: function (data) {
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})
	/**/
	
	checkOutDetails();
	net_total();

	/*	checkOutDetails() function work for two purposes:
		It will enable php isset($_POST["Common"]) in action.php,
		and inside the action.php page there are 2 isset function (isset($_POST["getCartItem"] AND isset($_POST["checkOutDetials"]):
		getCartItem is used to show shopping cart items in the cart dropdown menu
		checkOutDetails is used to show shopping cart items in "cart.php". */
	function checkOutDetails() {
		$('.overlay').show();
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { Common: 1, checkOutDetails: 1 },
			success: function (data) {
				$('.overlay').hide();
				$("#cart_checkout").html(data);
				net_total();
			}
		})
	}
	/**/

	/* net_total function role is to calculate the total of all the items in the shopping cart. */
	function net_total() {
		var net_total = 0;
		$('.qty').each(function () {
			var row = $(this).parent().parent();
			var price = row.find('.price').val();
			var total = price * $(this).val() - 0;
			row.find('.total').val(total);
		})
		$('.total').each(function () {
			net_total += ($(this).val() - 0);
		})
		$('.net_total').html("Total : " + CURRENCY + " " + net_total);
	}
	/**/

	/* Removing an item from shopping cart. */
	page();
	function page() {
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { page: 1 },
			success: function (data) {
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page", "click", function () {
		var pn = $(this).attr("page");
		$.ajax({
			url: "action.php",
			method: "POST",
			data: { getProduct: 1, setPage: 1, pageNumber: pn },
			success: function (data) {
				$("#get_product").html(data);
			}
		})
	})
})