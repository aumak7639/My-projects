	<form this_id="form-00<?=uniqid()?>" class="add_new_color_variant" method="post" role="form" enctype="multipart/form-data" reload-action="true">
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Color Image (150x150px) <span class="text-danger">*</span></label>
					<input type="file" name="color_image" class="required form-control" required>
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_product_color_variants" name="table_name">
					<input type="hidden" value="<?=$record->id?>" name="product_id">
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Choose Product <span class="text-danger">*</span></label>
					<select class="form-control select2" name="value" required>
						<?php foreach($this->common_model->get_records("tbl_product", "status = '0' order by name asc") as $pr): ?>
							<option value="<?=$pr->id?>"><?=$pr->name?></option>
						<?php endforeach; ?>
					</select>
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

	<form this_id="form-00<?=uniqid()?>" class="update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Finishing</label>
					<input type="text" name="finishing_variant" class="form-control" value="<?=$record->finishing_variant?>" placeholder="Seperate the values by comma">
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_product" name="table_name">
					<input type="hidden" value="<?=$record->id?>" name="row_id">
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Loft </label>
					<input type="text" name="loft_variant" class="form-control" value="<?=$record->loft_variant?>" placeholder="Seperate the values by comma">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Mirror </label>
					<input type="text" name="mirror_variant" class="form-control" value="<?=$record->mirror_variant?>" placeholder="Seperate the values by comma">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Dimension (Height in feet)</label>
					<input type="text" name="dimension_h" class="form-control" value="<?=$record->dimension_h?>">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Dimension (Width in feet) </label>
					<input type="text" name="dimension_w" class="form-control" value="<?=$record->dimension_w?>">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Dimension (Diameter in feet) </label>
					<input type="text" name="dimension_d" class="form-control" value="<?=$record->dimension_d?>">
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
	
	<div class="row">
		<div class="col-md-12">
			<h4>Color Variants</h4>
		</div>
		<?php foreach($this->common_model->get_records("tbl_product_color_variants", "status = '0' and product_id = '$record->id'") as $cv): ?>
			<div class="col-md-3 text-center">
				<a href="<?=base_url()?>uploads/products/<?=$cv->color_image?>" target="_blank">
					<img src="<?=base_url()?>uploads/products/<?=$cv->color_image?>" width="200">
				</a>
				<br>
				<a href="<?=base_url()?><?=$this->common_model->get_record("tbl_product", "id='$cv->value'", "slug");?>" target="_blank">
					<h4>
						<?=$this->common_model->get_record("tbl_product", "id='$cv->value'", "name");?>
					</h4>
				</a>
				<form class="update_data" this_id="form-id-00<?=uniqid();?>">
					<input type="hidden" name="status" value="1">
					<input type="hidden" name="row_id" value="<?=$cv->id?>">
					<input type="hidden" name="table_name" value="tbl_product_color_variants">
					<button type="submit" class="btn btn-sm btn-danger" onclick="remove_color_variant(this)">Remove</button>
				</form>
			</div>
		<?php endforeach; ?>
	</div>
	
	<script>
		function remove_color_variant(tis)
		{
			setTimeout(function(){ $(tis).parents('.col-md-3').remove(); }, 2000);
		}
	</script>