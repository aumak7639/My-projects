<?php include("sections/functions.php"); ?>
<?php $record = $records[0]; ?>
<div class="content-wrapper">
    
    <section class="content">
		<div class="row">
			<div class="col-md-4"> 
				<div class="card">
					<div class="card-header">
						<div class="box box-primary">
							<div class="box-body">
								<div class="col-md-6 text-left">
									<h4>Section Order</h4>
								</div>
								<div class="col-md-6 text-right">
									<a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i></a>
									<a class="btn btn-primary btn-sm" id="btnsave"> Update</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-block">
						<div class="row">
							<div class="col-md-12">
								<form name="page_section_form" action="#">
									<input type="hidden" value="<?=$record->id?>" name="page_id">
									<ul id="sortable" class="list-group">
										<?php $t = 1; ?>
										<?php foreach($page_sections as $page_section): ?>
											<li class="list-group-item <?php if($t == 1){ echo "focusClass"; } ?>">
												<div class="col-md-9">
													<span> <?php echo $this->common_model->get_section_name($page_section->section_code); ?> </span>
													<input type="hidden" value="<?=$page_section->section_code?>" name="section_code[]">
													<input type="hidden" value="<?=$page_section->id?>" name="row_id[]">
												</div>
												<div class="col-md-3 text-right">
													<a class="btn btn-sm btn-warning" onclick="$('.cards').hide();$('#card-<?=$page_section->id;?>').show();$('.focusClass').removeClass('focusClass');$(this).parents('.list-group-item').addClass('focusClass');">Edit <i class="fa fa-external-link"></i></a>
													<span class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-close"></i></span>
												</div>
											</li>
										<?php $t++; ?>
										<?php endforeach; ?>
									</ul>
								</form>
							</div>
						</div>
					</div>
				</div> 
			</div> 
			
			<div class="col-md-8">
				<?php $i=1; ?>
				<?php foreach($page_sections as $page_section): ?>
				<?php $data['page_id'] = $page_section->page_id; ?>
				<?php $data['section_code'] = $page_section->section_code; ?>
				<?php $data['page_section_id'] = $page_section->id; ?>
				<?php $section_code = $page_section->section_code; ?>
				<?php $section = $this->common_model->get_records('tbl_sections', "section_code = '" . $section_code . "'")[0]; ?>
					<div class="cards" id="card-<?=$page_section->id;?>" style="<?php if($i != 1){ echo "display:none;";} ?>">
						<?php $tis->load->view('admin/sections/' . $section->admin_file . '.php', $data); ?>
					</div> 
				<?php $i++; ?>
				<?php endforeach; ?>
			</div>
			
        </div>  
    </section>
</div>




	<div class="modal fade addsection" id="modal-default">
	  <div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form role="form" action="#" this_id="form-002" class="add_section" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Add Section</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<?php $ii = 1; ?>
								<?php foreach($sections as $section): ?>
										<div class="col-md-6 col-lg-4">
											<div class="well" onclick="$('input[name=section_code1]').val('<?=$section->section_code?>');$('input[name=section_name2]').val('<?=$section->name?>');$('.well').removeClass('focusClass');$(this).addClass('focusClass');$('.preview-box h4').text('<?=$section->name?>');$('.preview-box small').text('<?=$section->section_code?>');$('.preview-box img').attr('src', '<?=base_url()?>uploads/sections/<?=$section->image?>');">
												<img class="w--100" src="<?=base_url()?>uploads/sections/<?=$section->image?>">
												<p class="text-center ellipsis-words"><?=$section->name?></p>
											</div>
										</div>
									<?php if($ii % 3 == 0): ?>
									</div>
									<div class="row">
									<?php endif; ?>
								<?php $ii++; ?>
								<?php endforeach; ?>
							</div>
							<input type="hidden" value="" name="section_code1">
							<input type="hidden" value="" name="section_name2">
						</div>
						<div class="col-md-4 preview-box">
							<h4>Preview</h4>
							<small>Section Code</small>
							<br>
							<br>
							<div class="well">
								<img src="<?=base_url()?>uploads/common/default-image.jpg" class="w-100">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
					<input type="submit" class="btn btn-primary" value="Add Section">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>
	

	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(function(){
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	});
	
	$('.add_section').submit(function(e){
		e.preventDefault();
		
		$('#sortable').append('	<li class="list-group-item">'+
									'<div class="col-md-9">'+
										'<span> ' + $("input[name=section_code1]").val() + ' - ' + $( "input[name=section_name2]" ).val() + ' </span>'+
										'<input type="hidden" value="' + $("input[name=section_code1]").val() + '" name="section_code[]">'+
										'<input type="hidden" value="0" name="row_id[]">'+
									'</div>'+
									'<div class="col-md-3 text-right">'+
										'<span class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-close"></i></span>'+
									'</div>'+
								'</li>');
		toastr.success('Menu added!');
		$(".select2").val('').trigger('change')
		
	});
  
	function removebtn(tis)
	{
		$(tis).parents('li').remove();
	}
	
	$('#btnsave').click(function(){
		
		if(confirm("Are you sure?") === true)
		{
			if($('#sortable li').length > 0)
			{
				$.ajax({
					type: 'POST',
					url: baseURL + "admin/update_page_sections",
					data: $('form[name=page_section_form]').serialize(),
					dataType: "json",
					beforeSend: function() {
						$('#btnsave').attr('disabled', 'true');
					},
					success: function(response){
						console.log(response)
						if(response.result == 1)
						{
							toastr.success('Success!');
							$('#btnsave').removeAttr('disabled');
							setTimeout(function(){ location.reload(); }, 1000);
						}
						else
						{
							toastr.error('Something went wrong! Please try again later!');
							$('#btnsave').removeAttr('disabled');
						}
					}
				});
			}
			else
			{
				toastr.error('Add at least one!');
			}
		}
	});
	
</script>

<script>
	
	function deleteBtn(table_name, where, tis,delete_image, delete_image1){
		if(confirm('Are you sure to delete this?') === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/delete_data_2",
				data: "table_name=" + table_name + "&where=" + where + "&delete_image=" + delete_image + "&delete_image1=" + delete_image1,
				dataType: "json",
				success: function(response){
					console.log(response);
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(tis).parents('tr').remove();
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
					}
				}
			});
		}
	}
	
	function delete_testimonial(table, row_id, tis){
		if(confirm('Are you sure to delete this?') === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update",
				data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
				dataType: "json",
				success: function(response){
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(tis).parents('tr').remove();
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
					}
				}
			});
		}
	}
	
	function is_uniq_input(tis1){
		$('.error-span').hide();
		var tis = tis1 + " .arr";
		var inc = 0;
		
		$(tis).each(function(){
			if($(this).val() !== "undefined")
			{
				if($(this).val() !== '0' && $(this).val() !== '' && $(this).val() !== 'null' && $(this).val() !== null)
				{
					inc++;
				}
			}
		});
		if(inc === 1)
		{
			return true;
		}
		$(tis1 + " .aerror-span").show();
		return false;
	}
	
	$('.insert_product_listing_data').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_uniq_input(this_id) === true)
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
	});
	
	$('.update_product_listing_data').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_uniq_input(this_id) === true)
		{
			if($(this_id + " select[name=product_1]").val() !== null)
			{
				var product = $(this_id + " select[name=product_1]").val();
			}
			else
			{
				var product = 0;
			}
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update",
				data: $(this).serialize() + "&product=" + product,
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
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$(this_id + ' input[type=submit]').removeAttr('disabled');
					}
				}
			});
		}
	});
	
	$('.update_in_data').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if($(this_id + " input[name=row_id]").val() !== '0')
		{
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
		}
		else
		{
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
						if(response.result == 1)
						{
							toastr.success('Success!');
							$(this_id + ' input[type=submit]').removeAttr('disabled');
							$(this_id + " input[name=row_id]").val(response.insert_id);
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
		}
	});
	
</script>