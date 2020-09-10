	<div class="content-wrapper">
		
		<section class="content">
			<div class="row">
				<form this_id="form-001" class="update_data" method="post" role="form" reload-action="true">
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="slug">Date <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="date" value="<?=$record->date?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">                                
										<div class="form-group">
											<label for="name">Title <span class="text-danger">*</span></label>
											<input type="text" class="form-control required" name="title" value="<?=$record->title?>" required>
											<span class="text-danger error-span">This input is required.</span>
											<input type="hidden" value="<?=$record->id?>" name="row_id">
											<input type="hidden" value="tbl_blogs" name="table_name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="slug">Meta Title</label>
											<input type="text" class="form-control" name="meta_title" value="<?=$record->meta_title?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="slug">Meta Keywords</label>
											<input type="text" class="form-control" name="tags" value="<?=$record->tags?>" placeholder="Seperate by comma">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="slug">Meta Description</label>
											<input type="text" class="form-control" name="meta_description" value="<?=$record->meta_description?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="slug">Short Description <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="short_description" value="<?=$record->short_description?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="slug">Current Featured Image </label>
											<a href="<?=base_url()?>uploads/common/<?=$record->image?>" target="_blank">
												<img src="<?=base_url()?>uploads/common/<?=$record->image?>" width="100">
											</a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="slug">Featured Image <span class="text-danger">*</span></label>
											<input type="file" class="form-control required" accept="image/x-png,image/gif,image/jpeg" name="image" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="slug">Description <span class="text-danger">*</span></label>
											<textarea class="form-control required" id="editor" name="description" rows="14" dir="ltr"><?=$record->description?></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<input type="submit" class="btn btn-primary pull-right" value="Submit" />
							</div>
						</div>
					</div>
				</form>
			</div>  
		</section>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
	<script src="https://ckeditor.com/latest/ckeditor.js"></script>

	<script>
		CKEDITOR.replace( 'editor' );
		
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