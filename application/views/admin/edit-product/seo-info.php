	<form this_id="form-00<?=uniqid()?>" class="update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug">Meta Title</label>
					<input type="text" value="<?=$record->meta_title?>" class="form-control" name="meta_title">
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_product" name="table_name">
					<input type="hidden" value="<?=$record->id?>" name="row_id">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="tags" class="w--100">
						Meta Keywords
						<small class="pull-right">Seperated by comma(,)</small>
					</label>
					<input type="text" value="<?=$record->meta_keywords?>" class="form-control" name="meta_keywords">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug">Meta Description</label>
					<input type="text" value="<?=$record->meta_description?>" class="form-control" name="meta_description">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="tags" class="w--100">
						Tags
						<small class="pull-right">Seperated by comma(,)</small>
					</label>
					<input type="text" value="<?=$record->tags?>" class="form-control" data-role="tagsinput" name="tags">
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