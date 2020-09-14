<link href="<?php echo base_url(); ?>assets/admin/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <section class="content">
		<div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <form action="<?php echo base_url() ?>admin/add_category_post" this_id="form-001" class="insert_product_data" method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="name">
										<span class="text-danger error-span">This input is required.</span>
										<input type="hidden" value="tbl_product" name="table_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Leave blank for auto generation">
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Meta Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="meta_title">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Meta Keywords <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="meta_keywords">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Meta Description <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="meta_description">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Short Description <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="short_description">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">In Stock <span class="text-danger">*</span></label>
                                        <input type="number" value="0" name="in_stock" class="required form-control">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Tags <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="tags">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Strikeout Price <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control required" name="strikeout_price">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Price <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control required" name="price">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Highlight</label>
                                        <input type="file" class="form-control" name="highlight">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">SKU ID <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="sku_id">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Choose Brand <span class="text-danger">*</span></label>
                                        <select class="form-control required select2" name="brand_id">
											<?php foreach($brands as $brand): ?>
												<option value="<?=$brand->id?>"><?=$brand->name?></option>
											<?php endforeach; ?>
										</select>
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Choose Categories <span class="text-danger">*</span></label>
                                        <select class="form-control required select2" multiple="multiple" name="category">
											<?php foreach($categories as $category): ?>
												<option value="<?=$category->id?>"><?=$category->name?></option>
											<?php endforeach; ?>
										</select>
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Choose Sub Categories <span class="text-danger">*</span></label>
                                        <select class="form-control required select2" multiple="multiple" name="sub_category">
											<?php foreach($sub_categories as $sub_category): ?>
												<option value="<?=$sub_category->id?>"><?=$sub_category->name?></option>
											<?php endforeach; ?>
										</select>
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Choose Child Categories <span class="text-danger">*</span></label>
                                        <select class="form-control required select2" multiple="multiple" name="child_category">
											<?php foreach($child_categories as $child_category): ?>
												<option value="<?=$child_category->id?>"><?=$child_category->name?></option>
											<?php endforeach; ?>
										</select>
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Featured Image <span class="text-danger">*</span></label>
                                        <input type="file" name="product_image" accept="image/x-png,image/gif,image/jpeg" class="required form-control">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Additional Images <span class="text-danger">*</span></label>
                                        <input type="file" name="product_images[]" accept="image/x-png,image/gif,image/jpeg" multiple class="required form-control">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
                            </div>
							<hr>
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="slug">Description <span class="text-danger">*</span></label>
										<textarea name="description" id="editor"></textarea>
                                    </div>
                                </div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<h3 class="margin0">Technical Specifications</h3>
								</div>
							</div>
							<hr>
							<div id="technical_spec">
								<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
											<label for="slug">Title <span class="text-danger">*</span></label>
											<select class="form-control select2" required name="spec_id[]">
												<option value=""></option>
												<?php foreach($technical_specifications as $technical_specification): ?>
													<option value="<?=$technical_specification->id?>"><?=$technical_specification->title?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group">
											<label for="slug">Description <span class="text-danger">*</span></label>
											<input type="text" required class="form-control" name="spec_description[]">
										</div>
									</div>
									<div class="col-sm-2">
										<label for="slug">&nbsp;</label><br>
										<a class="btn btn-sm btn-success" onclick="addbtn()"><i class="fa fa-plus"></i></a>
									</div>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/dist/js/select2.full.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/dist/js/ckeditor.js" charset="utf-8"></script>
<script>
	$('.select2').select2();
	
	
	$('.insert_product_data').submit(function(e){
		e.preventDefault();
		
		$('textarea[id=editor]').text($('.ck-content').html());
		
		var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
		
		if(is_required(this_id) === true)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/insert_product",
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
	
	function addbtn()
	{
		$('#technical_spec').append('<div class="row">'+
										'<div class="col-sm-5">'+
											'<div class="form-group">'+
												'<label for="slug">Title <span class="text-danger">*</span></label>'+
												'<select class="form-control select2" name="spec_id[]">'+
													'<option value=""></option>'+
													'<?php foreach($technical_specifications as $technical_specification): ?>'+
													'	<option value="<?=$technical_specification->id?>"><?=$technical_specification->title?></option>'+
													'<?php endforeach; ?>'+
												'</select>'+
											'</div>'+
										'</div>'+
										'<div class="col-sm-5">'+
											'<div class="form-group">'+
												'<label for="slug">Description <span class="text-danger">*</span></label>'+
												'<input type="text" class="form-control" name="spec_description[]">'+
											'</div>'+
										'</div>'+
										'<div class="col-sm-2">'+
											'<label for="slug">&nbsp;</label><br>'+
											'<a class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-trash"></i></a>'+
											'<a class="btn btn-sm btn-success" onclick="addbtn()"><i class="fa fa-plus"></i></a>'+
										'</div>'+
									'</div>');
		$('.select2').select2();
	}
	
	function removebtn(tis)
	{
		$(tis).parent().parent().remove();
	}
	
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>