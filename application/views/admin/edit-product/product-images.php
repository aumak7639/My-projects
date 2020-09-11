<form this_id="form-00<?=uniqid()?>" class="insert_product_image" method="post" role="form" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">                                
			<div class="form-group">
				<label for="name">Additional Images <span class="text-danger">*</span> (400px x 400px preferred)</label>
				<div class="input-images-1" style="padding-top: .5rem;"></div>
				<input type="hidden" value="tbl_product_images" name="table_name">
				<input type="hidden" value="<?=$record->id?>" name="product_id">
				<span class="text-danger error-span">This input is required.</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">                                
			<button type="submit" class="btn btn-primary pull-right">Save</button>
			<br>
			<br>
		</div>
	</div>
</form>
<div class="row">
	<div class="col-md-12">                                
		<div id="product-add-images">
			<?php include("product-additional-images.php"); ?>
		</div>
	</div>
</div>