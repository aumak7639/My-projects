/**
 * @author Praveen Murali
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});



	$('#payout-status-update').submit(function(e){ 
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/payout_status_update",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(this_id + ' input[type=submit]').attr('disabled', 'true');
				},
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						$(this_id)[0].reset();
						toastr.success('Status has been updated!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Please check the required fields!');
		}
	});
	function statusChange(obj,row_id,status,field,table) {
		alert("hi");
		Swal.fire({
			title: 'Are you sure?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Update it!'
		  }).then((result) => {
			if (result.value) {


				$.ajax({
					type: 'POST',
					url: baseURL + "admin/status-update",
					data: 'table=' + table + '&row_id=' + row_id + '&status='+status+'&field='+field,
					dataType: "json",
					success: function(response){
						if(response.result == 1)
						{
						
							setTimeout(function () {
							location.reload(1);
							},2000);

							document.getElementsByClassName(row_id).style.display = "none";
						
							
							
							//$(this).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");
							

							
						}
						else
						{
							toastr.error('Something went wrong! Please try again later!');
						}
					}
				});
		
	
			  Swal.fire(
				'Updated!',
				'Your Record  has been Updated.',
				'success'
			  )



			}
		  })
	
	}

	$('.new_page').submit(function(e){
		e.preventDefault();
		
		$('input[name=content]').val($('.new_page .ck-content').html());
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/insert",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(this_id + ' input[type=submit]').attr('disabled', 'true');
				},
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						$(this_id)[0].reset();
						toastr.success('Success!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Please check the required fields!');
		}
	});

	$('.update_page').submit(function(e){
		e.preventDefault();
		
		$('input[name=content]').val($('.update_page .ck-content').html());
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(this_id + ' input[type=submit]').attr('disabled', 'true');
				},
				success: function(response){
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Please check the required fields!');
		}
	});
	
	$('.insert_coupon_data').submit(function(e){
		e.preventDefault();
		
		$('.insert_coupon_data input[name=child_category]').val($('#child_category').val());
		$('.insert_coupon_data input[name=product_id]').val($('#product_id').val());
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		$.ajax({
			type: 'POST',
			url: baseURL + "admin/insert_coupon_data",
			data: new FormData(this),
			dataType: "json",
			contentType: false,
			processData: false,
			beforeSend: function() {
				$(this_id + ' input[type=submit]').attr('disabled', 'true');
			},
			success: function(response){
				console.log(response)
				if(response.result == 1)
				{
					$(this_id)[0].reset();
					toastr.success('Success!');
					$(this_id + ' input[type=submit]').removeAttr('disabled');
					
					if($(this_id).attr('reload-action') === 'true')
					{
						setTimeout(function(){ location.reload(); }, 1000);
					}
				}
				else if(response.result == 2)
				{
					toastr.error('Coupon code already exists!');
					$(this_id + ' input[type=submit]').removeAttr('disabled');
				}
				else
				{
					toastr.error('Something went wrong! Please try again later!');
					$(this_id + ' input[type=submit]').removeAttr('disabled');
				}
			}
		});
	});
	
	$('.update_coupon_data').submit(function(e){
		e.preventDefault();
		
		$('.update_coupon_data input[name=child_category]').val($('#child_category_1').val());
		$('.update_coupon_data input[name=product_id]').val($('#product_id_1').val());
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		$.ajax({
			type: 'POST',
			url: baseURL + "admin/update_data",
			data: new FormData(this),
			dataType: "json",
			contentType: false,
			processData: false,
			beforeSend: function() {
				$(this_id + ' input[type=submit]').attr('disabled', 'true');
			},
			success: function(response){
				console.log(response)
				if(response.result == 1)
				{
					$(this_id)[0].reset();
					toastr.success('Success!');
					$(this_id + ' input[type=submit]').removeAttr('disabled');
					
					if($(this_id).attr('reload-action') === 'true')
					{
						setTimeout(function(){ location.reload(); }, 1000);
					}
				}
				else if(response.result == 2)
				{
					toastr.error('Coupon code already exists!');
					$(this_id + ' input[type=submit]').removeAttr('disabled');
				}
				else
				{
					toastr.error('Something went wrong! Please try again later!');
					$(this_id + ' input[type=submit]').removeAttr('disabled');
				}
			}
		});
	});
	
	$('.insert_data').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/insert",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(this_id + ' input[type=submit]').attr('disabled', 'true');
				},
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						$(this_id)[0].reset();
						toastr.success('Success!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
						
						if($(this_id).attr('row-data') === 'yes')
						{
							update_table_data(this_id);
						}
						
						if($(this_id).attr('reload-action') === 'true')
						{
							setTimeout(function(){ location.reload(); }, 1000);
						}
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Please check the required fields!');
		}
	});
	
	$('.from-new-pincodes').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/from-new-pincodes-post",
				data: $(this).serialize(),
				dataType: "json",
				beforeSend: function() {
					$(this_id + ' input[type=submit]').attr('disabled', 'true');
				},
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
						setTimeout(function(){ location.reload(); }, 1000);
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Please check the required fields!');
		}
	});
	
	$('.add_new_color_variant').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/add_new_color_variant",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(this_id + ' input[type=submit]').attr('disabled', 'true');
				},
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
						setTimeout(function(){ location.reload(); }, 1000);
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Please check the required fields!');
		}
	});
	
	$('.update_data').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(this_id + ' input[type=submit]').attr('disabled', 'true');
				},
				success: function(response){
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
						
						if($(this_id).attr('reload-action') === 'true')
						{
							setTimeout(function(){ location.reload(); }, 1000);
						}
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Please check the required fields!');
		}
	});
	
	$('.update_product_properties_data').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update_product_properties_data",
				data: $(this).serialize(),
				dataType: "json",
				beforeSend: function() {
					$(this_id + ' input[type=submit]').attr('disabled', 'true');
				},
				success: function(response){
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Please check the required fields!');
		}
	});
	
	$('.deletebtn').click(function(e){
		e.preventDefault();
		
		if(confirm("Are you sure?") === true)
		{
			var table = $(this).attr('data-table');
			var row_id = $(this).attr('data-id');
			var tis = this;
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update",
				data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
				dataType: "json",
				success: function(response){
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(tis).hide();
						$(tis).next('.activebtn').show();
						$(tis).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
					}
				}
			});
		}
	});
	
	$('.deletecats').click(function(e){
		e.preventDefault();
		
		if(confirm("Are you sure?") === true)
		{
			var table = $(this).attr('data-table');
			var row_id = $(this).attr('data-id');
			var tis = this;
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/deletecats",
				data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
				dataType: "json",
				success: function(response){
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(tis).hide();
						$(tis).next('.activebtn').show();
						$(tis).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");
					}
					else if(response.result == 2)
					{
						toastr.error(response.msg);
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
					}
				}
			});
		}
	});
	
	$('.activebtn').click(function(e){
		e.preventDefault();
		
		if(confirm("Are you sure?") === true)
		{
			var table = $(this).attr('data-table');
			var row_id = $(this).attr('data-id');
			var tis = this;
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update",
				data: 'table_name=' + table + '&row_id=' + row_id + '&status=0',
				dataType: "json",
				success: function(response){
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(tis).hide();
						$(tis).prev('.deletebtn').show();
						$(tis).parent().next('td').html("<span class='btn btn-sm btn-success'>Active</span>");
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
					}
				}
			});
		}
	});
	
	function update_table_data(this_id)
	{
		var table = $(this_id).next().attr('data-table');
		var page_section_id = $(this_id).next().attr('data-page-section-id');
		
		$.ajax({
			type: 'POST',
			url: baseURL + "admin/get-table-data",
			data: 'table_name=' + table + '&page_section_id=' + page_section_id,
			//dataType: "json",
			success: function(response){
				$(this_id).next().html(response);
			}
		});
	}
	
	function is_required(this_id){
		$('.error-span').hide();
		var inc = 0;
		$(this_id + " .required").each(function(){
			console.log($(this).attr('name'));
			if($(this).val() !== "undefined")
			{
				if($(this).val() != null)
				{
					if(($(this).val()).length > 0)
					{
						
					}
					else
					{
						console.log($(this).attr('name'));
						$(this).next("span").show();
						inc++;
					}
				}
				else
				{
					toastr.error('Something went wrong on ' + $(this).attr('name'));
					inc++;
				}
			}		
		});
		if(inc === 0)
		{
			return true;
		}
		return false;
	}
	
$('input').attr("autocomplete", "new-password");
	