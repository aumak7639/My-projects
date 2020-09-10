<?php $record = $records[0]; ?>
<div class="content-wrapper">
    
    <section class="content">
        <div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<div class="row">
							<div class="col-md-12">
								<a class="btn btn-primary pull-right" href="<?=base_url()?>admin/pages">All Pages</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <form role="form" action="<?php echo base_url() ?>admin/add_category_post" this_id="form-001" class="update_page" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" value="<?=$record->name?>" onfocusout="$('input[name=slug]').val($(this).val())" name="name">
										<span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" value="tbl_pages" name="table_name">
                                        <input type="hidden" value="<?=$record->id?>" name="row_id">
                                        <input type="hidden" value="<?=$record->slug?>" name="slug">
                                    </div>
                                </div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Page Type<span class="text-danger">*</span></label>
										<select class="form-control required" onchange="if($(this).val() == 'standard'){$('#content').show();}else{$('#content').hide();}" name="page_type">
											<option value="">Choose Type</option>
											<option <?php if($record->page_type == 'standard'){echo "selected";} ?> value="standard">Standard</option>
											<option <?php if($record->page_type == 'customizable'){echo "selected";} ?> value="customizable">Customizable</option>
										</select>
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Meta Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" value="<?=$record->meta_title?>" name="meta_title">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Meta Keywords <span class="text-danger">*</span></label>
										<input type="text" class="form-control required" value="<?=$record->meta_keywords?>" name="meta_keywords">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Meta Description <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" value="<?=$record->meta_description?>" name="meta_description">
										<span class="text-danger error-span">This input is required.</span>
                                    </div>
                                </div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Meta Image </label>
										<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" name="meta_image">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
                            </div>
                            <div class="row" id="content" <?php if($record->page_type == "customizable"){ echo 'style="display: none;"'; } ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="slug">Content</label>
                                        <textarea class="form-control" id="editor"><?=$record->content?></textarea>
										<span class="text-danger error-span">This input is required.</span>
										<input type="hidden" name="content" value="<?=$record->content?>">
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
            <div class="col-md-4">
				<img src="<?=base_url()?>uploads/pages/<?=$record->meta_image?>" class="w--100">
            </div>
        </div>  
    </section>
</div>
	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/dist/js/ckeditor.js" charset="utf-8"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>