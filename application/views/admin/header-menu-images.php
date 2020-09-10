<link href="<?php echo base_url(); ?>assets/admin/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <section class="content">
	
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="box box-primary">
							<div class="box-body">
								<div class="col-md-6">
									<a class="btn btn-info" href="<?=base_url()?>admin/header-menu"> Back</a>
								</div>
								<div class="col-md-6 text-right">
									<span> Recommend to upload images with 4:4 aspect ratio.</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <form role="form" action="<?php echo base_url() ?>admin/add_category_post" this_id="form-001" class="menu-header-images" method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<?php foreach($menus as $menu): ?>
									<?php if($menu->menu_type == 'parent'): ?>
										<div class="col-md-2 padding--15 allborder-ddd">
											<div class="form-group">
												<label for="name">
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
												</label>
												<input type="file" name="<?=$menu->id?>" accept="image/x-png,image/gif,image/jpeg" class="required form-control">
											</div>		
											<div class="form-group">
												<label for="name">
													Image Link
												</label>
												<input type="url" name="image_link_<?=$menu->id?>" value="<?=$menu->image_link?>" placeholder="https:// or http:// is must" class="required form-control">
											</div>									
											<a href="<?=base_url()?>uploads/header-menu/<?=$menu->image?>" target="_blank"><img src="<?=base_url()?>uploads/header-menu/<?=$menu->image?>" class="w--100"></a>
										</div>	
									<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
<script>
	$('.menu-header-images').submit(function(e){
		e.preventDefault();
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		$.ajax({
			type: 'POST',
			url: baseURL + "admin/menu_header_images_post",
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
					location.reload();
				}
				else
				{
					toastr.error('Something went wrong! Please try again later!');
					$(this_id + ' input[type=submit]').removeAttr('disabled');
				}
			}
		});
	});
	
</script>