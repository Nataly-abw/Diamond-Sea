$(document).ready(function(){

	getBrands();
	
	function getBrands(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : {GET_BRAND:1},
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);

				var brandHTML = '';

				$.each(resp.message, function(index, value){
					brandHTML += '<tr class="tabData">'+
									'<td>'+ value.brand_title +'</td>'+
									'<td><a class="btn btn-sm btn-info edit-brand tabBttns"><span style="display:none;">'+JSON.stringify(value)+'</span>Edit</a>&nbsp;<a bid="'+value.brand_id+'" class="btn btn-sm btn-danger delete-brand tabBttns">Delete</a></td>'+
								'</tr>';
				});

				$("#brand_list").html(brandHTML);
			}
		})
	}

	$(".add-brand").on("click", function(){

		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : $("#add-brand-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getBrands();
					$("#add_brand_modal").modal('hide');
					alert(resp.message);
				} else if(resp.status == 303) {
					alert(resp.message);
				}
			}
		})
	});

	$(document.body).on('click', '.delete-brand', function(){

		var bid = $(this).attr('bid');

		if (confirm("Are you sure you want to delete this collection?")) {
			$.ajax({
				url : '../admin/classes/Products.php',
				method : 'POST',
				data : {DELETE_BRAND:1, bid:bid},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						alert(resp.message);
						getBrands();
					} else if(resp.status == 303) {
						alert(resp.message);
					}
				}
			});
		} else {
			alert('This process has been cancelled.');
		}
	});

	$(document.body).on("click", ".edit-brand", function(){

		var brand = $.parseJSON($.trim($(this).children("span").html()));
		console.log(brand);
		$("input[name='e_brand_title']").val(brand.brand_title);
		$("input[name='brand_id']").val(brand.brand_id);

		$("#edit_brand_modal").modal('show');
	});

	$(".edit-brand-btn").on("click", function(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : $("#edit-brand-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getBrands();
					$("#edit_brand_modal").modal('hide');
					alert(resp.message);
				} else if(resp.status == 303) {
					alert(resp.message);
				}	
			}
		});
	});
});