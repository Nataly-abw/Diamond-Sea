$(document).ready(function(){

	/* REGISTARTION */
	$(".register-btn").on("click", function(){

		$.ajax({
			url : '../admin/classes/Credentials.php',
			method : "POST",
			data : $("#admin-register-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					$(".message").html('<span class="text-success alertSuccMssg">'+resp.message+'</span>');
				}else if(resp.status == 303){
					$(".message").html('<span class="text-danger alertFailMssg">'+resp.message+'</span>');
				}
			}
		});
	});

	/* LOGIN */
	$(".login-btn").on("click", function(){

		$.ajax({
			url : '../admin/classes/Credentials.php',
			method : "POST",
			data : $("#admin-login-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					//$(".message").html('<span class="text-success">'+resp.message+'</span>');
					window.location.href = window.origin+"./Diamond_Sea_Project/admin/index.php";
				} else if(resp.status == 303){
					$(".message").html('<span class="text-danger alertFailMssg">'+resp.message+'</span>');
				}
			}
		});
	});
});