<div class="row">
	<!-- left column -->
	<div class="col-md-12">
	  <!-- general form elements -->
		
		<div class="box box-primary">
			<div class="box-header text-center">
				<h4>Product Dimensions Images </h4>
			</div>
			<div class="box-body">
				<div class="row">
					<?php $inv = 1; ?>
					<?php 
						if(!isset($product_dimensions))
						{
							$product_dimensions = $this->common_model->get_records("tbl_product_dimensions_images", "product_id='" . $product_id . "' and status = '0'"); 
						}
					?>
					<?php foreach($product_dimensions as $product_image1): ?>
						<div class="col-md-4 text-center">
							<form class="padding--15 allborder-ddd update_data" onsubmit="return false;">
								<a target="_blank" href="<?=base_url()?>uploads/products/<?=$product_image1->file_name?>">
									<img class="w--100" src="<?=base_url()?>uploads/products/<?=$product_image1->file_name?>">
								</a>
								<br>
								<br>
								<div class="text-left">
									<label>Image Alt Text</label>
									<input class="w--100 form-control" value="<?=$product_image1->alt?>" type="text" name="alt" placeholder="Image Alt Text">
									<label>Replace image</label>
									<input class="w--100 form-control" type="file" name="file_name">
									<input type="hidden" value="tbl_product_dimensions_images" name="table_name">
									<input type="hidden" value="<?=$product_image1->id?>" name="row_id">
									<br>
								</div>
								<button type="submit" class="btn btn-sm btn-success">Save</button>
								<span class="btn btn-sm btn-danger" onclick="deleteimage1('<?=$product_image1->id?>')">Remove</span>
							</form>
						</div>
						<?php
							if(($inv%3) == 0)
							{
								echo '</div>';
								echo '<hr>';
								echo '<div class="row">';
							}
						?>
					<?php $inv++; ?>
					<?php endforeach; ?>
				</div>
				
				<?php if(sizeof($product_images) < 1): ?>
					<div class="row">
						<div class="col-md-12 text-center">
							No records.
						</div>
					</div>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</div>  