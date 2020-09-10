<form this_id="form-00<?=uniqid()?>" class="insert_product_dimension_image" method="post" role="form" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">                                
			<div class="form-group">
				<label for="name">Product Dimentions Images <span class="text-danger">*</span> (400px x 400px preferred)</label>
				<div class="input-images-2" style="padding-top: .5rem;"></div>
				<input type="hidden" value="tbl_product_dimensions_images" name="table_name">
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
		<div id="product-dimension-images">
			<?php include("product-dimensions-images.php"); ?>
		</div>
	</div>
</div>