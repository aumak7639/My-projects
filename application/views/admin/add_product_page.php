	<div class="content-wrapper">
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Basic Details</a></li>
							<li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Product Images</a></li>
							<li><a href="#tab_5" data-toggle="tab" aria-expanded="true">Inventory</a></li>
							<li><a href="#tab_4" data-toggle="tab" aria-expanded="true">SEO </a></li>
							<li><a href="#tab_7" data-toggle="tab" aria-expanded="true">Badges / Highlight </a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<form this_id="form-00<?=uniqid()?>" class="insert_product_data" method="post" role="form" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6">                                
											<div class="form-group">
												<label for="name">Product Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control required" name="name">
												<span class="text-danger error-span">This input is required.</span>
												<input type="hidden" name="slug" value="">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="name" class="w--100">
													Choose Brand <span class="text-danger">*</span> 
												</label>
												<select class="form-control required select2" name="brand_id">
													<?php foreach($brands as $brand): ?>
														<option value="<?=$brand->id?>">
															<?=$brand->name?>
														</option>
														<?php endforeach; ?>
												</select>
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="name" class="w--100">
													Choose Child Category
												</label>
												<select class="form-control select2" name="child_category">
													<?php foreach($child_categories as $child_category): ?>
														<option value="<?=$child_category->id?>">
															<?=$child_category->name?> 
															(Parent: <?=$this->common_model->get_record("tbl_category", "id=" . $child_category->category_id, "name")?>) 
															(Sub: <?=$this->common_model->get_record("tbl_sub_category", "id=" . $child_category->sub_category_id, "name")?>)
														</option>
													<?php endforeach; ?>
												</select>
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="slug">MRP Price <span class="text-danger">*</span></label>
												<input type="number" class="form-control required" min="0" step="0.01" name="selling_price">
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="slug" class="w--100">
													Selling Price <span class="text-danger">*</span> 
												</label>
												<input type="number" class="form-control required" min="0" step="0.01" name="price">
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="slug" class="w--100">
													Product GST <span class="text-danger">*</span> 
												</label>
												<input type="number" class="form-control required" step="0.01" min="0" name="product_gst">
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">                                
											<div class="form-group">
												<label for="name">Product Featured Image (400px x 400px preferred) <span class="text-danger">*</span> </label>
												<input type="file" name="product_image" accept="image/x-png,image/gif,image/jpeg" class="form-control" required>
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
										<div class="col-md-6">                                
											<div class="form-group">
												<label for="name">Product Color Image (150 x 150 preferred) <span class="text-danger">*</span> </label>
												<input type="file" name="product_color_image" accept="image/x-png,image/gif,image/jpeg" class="form-control" required>
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="slug">Short Description <span class="text-danger">*</span></label>
												<textarea class="form-control required" name="short_description" rows="4" dir="ltr"></textarea>
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="slug">Description / Instructions / Features <span class="text-danger">*</span></label>
												<textarea class="form-control required" id="editor" name="description" rows="14" dir="ltr"></textarea>
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="slug">Warranty <span class="text-danger">*</span></label>
												<textarea class="form-control required" id="editor1" name="warranty_description" rows="14" dir="ltr"></textarea>
												<span class="text-danger error-span">This input is required.</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary pull-right">Save</button>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
	<script src="https://ckeditor.com/latest/ckeditor.js"></script>

	<script>
		$('.select2').select2();
		
		$('.insert_product_data').submit(function(e){
			e.preventDefault();
			var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
			var tis = this;
			setTimeout(function(){
				if(is_required(this_id) === true)
				{
					$.ajax({
						type: 'POST',
						url: baseURL + "admin/insert_product",
						data: new FormData($('.insert_product_data')[0]),
						dataType: "json",
						contentType: false,
						processData: false,
						beforeSend: function() {
							$(this_id + ' button[type=submit]').attr('disabled', 'true');
						},
						success: function(response){
							console.log(response)
							if(response.result == 1)
							{
								toastr.success('Product updated!');
								$(this_id + ' button[type=submit]').removeAttr('disabled');
								window.location.assign("<?=base_url()?>admin/product/" + response.product_id);
							}
							else
							{
								toastr.error('Something went wrong! Please try again later!');
								$(this_id + ' button[type=submit]').removeAttr('disabled');
							}
						}
					});
				}
				else
				{
					toastr.error('Please check the required fields!');
				}
			}, 1000);
		});
	</script>
	<script>
		CKEDITOR.replace( 'editor' );
		CKEDITOR.replace( 'editor1' );
		
		CKEDITOR.editorConfig = function( config ) {
        	config.toolbar = [
        		{ name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
        		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        		{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
        		'/',
        		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
        		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        		{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak' ] },
        		'/',
        		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }
        	];
        };
	</script>