<div class="content-wrapper">
    
    <section class="content">
		<div class="row">
			<div class="col-md-12"> 
				<div class="card">
					<div class="card-header">
						<div class="box box-primary">
							<div class="box-body">
								<div class="col-md-6 text-left">
									<h4>Menu List Order</h4>
								</div>
								<div class="col-md-6 text-right">
									<a class="btn btn-warning btn-sm" href="<?=base_url()?>admin/menu-header-images"> Upload Menu Images</a>
									<a class="btn btn-primary btn-sm" id="btnsave"> Update</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-header">
						<div class="box box-primary">
							<div class="box-body">
								<div class="col-md-6">
									<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#pmodal-default"> Add Category (Parent)</a>
									<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#smodal-default"> Add Sub Category (Sub)</a>
									<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#cmodal-default"> Add Child Category (Child)</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-block">
						<div class="row">
							<div class="col-md-12">
								<form name="menu_form" action="#">
									<ul id="sortable" class="list-group">
										<?php foreach($menus as $menu): ?>
											<li class="list-group-item <?=$menu->menu_type?>">
												<div class="col-md-9">
													<span>
													<?php
														if($menu->cat_type == 'category'){
															echo $this->common_model->get_category_name($menu->cat_id);
														}
														elseif($menu->cat_type == 'sub_category'){
															echo $this->common_model->get_sub_category_name($menu->cat_id);
														}
														elseif($menu->cat_type == 'child_category'){
															echo $this->common_model->get_child_category_name($menu->cat_id);
														}
													?>
													</span>
													<input type="hidden" value="<?=$menu->menu_type?>" name="menu_type[]">
													<input type="hidden" value="<?=$menu->cat_id?>" name="cat_id[]">
													<input type="hidden" value="<?=$menu->cat_type?>" name="cat_type[]">
													<input type="hidden" value="<?=$menu->image?>" name="image[]">
												</div>
												<div class="col-md-3 text-right">
													<span class="btn btn-sm btn-default text-capitalize"><?=$menu->menu_type?></span>
													<span class="btn btn-sm btn-danger" onclick="removebtn_1('<?=$menu->id?>');removebtn(this);"><i class="fa fa-close"></i></span>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</form>
							</div>
						</div>
					</div>
					<div class="card-header">
						
					</div>
				</div> 
			</div>  
        </div>  
    </section>
</div>

	<div class="modal fade" id="pmodal-default">
	  <div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="#" this_id="form-001" class="add_menu_list" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Add Category</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">                                
							<div class="form-group">
								<label for="name">Category Name</label><br>
								<select class="form-control select2 w--100 rq" name="category">
									<option value="">Select Category</option>
									<?php foreach($categories as $category): ?>
										<option value="<?=$category->id?>"><?=$category->name?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">                                
							<div class="form-group">
								<label for="name">Type</label><br>
								<select class="form-control w--100" name="type">
									<option value="parent">Parent</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>
	

	<div class="modal fade" id="smodal-default">
	  <div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="#" this_id="form-002" class="add_menu_list" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Add Sub Category</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">                                
							<div class="form-group">
								<label for="name"> Sub Category Name</label><br>
								<select class="form-control select2 w--100 rq" name="sub_category">
									<option value="">Select Sub Category</option>
									<?php foreach($sub_categories as $sub_category): ?>
										<option value="<?=$sub_category->id?>"><?=$sub_category->name?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">                                
							<div class="form-group">
								<label for="name">Type</label><br>
								<select class="form-control w--100" name="type">
									<option value="sub">Sub</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>
	
	<div class="modal fade" id="cmodal-default">
	  <div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="#" this_id="form-003" class="add_menu_list" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Add Child Category</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">                                
							<div class="form-group">
								<label for="name"> Child Category Name</label><br>
								<select class="form-control select2 w--100 rq" name="child_category">
									<option value="">Select Child Category</option>
									<?php foreach($child_categories as $child_category): ?>
										<option value="<?=$child_category->id?>"><?=$child_category->name?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">                                
							<div class="form-group">
								<label for="name">Type</label><br>
								<select class="form-control w--100" name="type">
									<option value="child">Child</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
					<input type="submit" class="btn btn-primary" value="Submit">
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
  
	$('.add_menu_list').submit(function(e){
		e.preventDefault();
		
		var this_id = "form[this_id=" + $(this).attr('this_id') + "] ";
		
		var valk = 0;
		var cat_id = '';
		var cat_type = '';
		
		$('.add_menu_list .rq').each(function(){
			if($(this).val().length > 0)
			{
				valk++;
				cat_id = $(this).val();
				cat_type = $(this).attr('name');
			}
		});
		
		if(valk > 1 || valk === 0)
		{
			toastr.error('Select any one!');
		}
		else
		{
			$('#sortable').append('<li class="list-group-item ' + $(this_id + 'select[name=type]').val() + '">'+
										'<div class="col-md-9">'+
											'<span>' + $(this_id + "select[name=" + cat_type + "] option:selected" ).text() + '</span>'+
											'<input type="hidden" value="' + $(this_id + 'select[name=type]').val() + '" name="menu_type[]">'+
											'<input type="hidden" value="' + cat_id + '" name="cat_id[]">'+
											'<input type="hidden" value="' + cat_type + '" name="cat_type[]">'+
											'<input type="hidden" value="0" name="menu_id[]">'+
											'<input type="hidden" value="default-image.jpg" name="image[]">'+
										'</div>'+
										'<div class="col-md-3 text-right">'+
											'<span class="btn btn-sm btn-default text-capitalize">' + $(this_id + 'select[name=type]').val() + '</span>'+
											'<span class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-close"></i></span>'+
										'</div>'+
									'</li>');
			toastr.success('Menu added!');
			$(".select2").val('').trigger('change')
		}
	});
  
	function removebtn(tis)
	{
		$(tis).parents('li').remove();
	}
	
	function removebtn_1(id)
	{
		$('input[name=delete_id]').val($('input[name=delete_id]').val() + "," + id);
	}
	
	$('#btnsave').click(function(){
		
		if($('#sortable li').length > 0)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update_header_menu",
				data: $('form[name=menu_form]').serialize(),
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
	});
	
</script>