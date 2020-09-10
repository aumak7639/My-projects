	<form this_id="form-00<?=uniqid()?>" class="update_product_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Product Name <span class="text-danger">*</span></label>
					<input type="text" class="form-control required" value="<?=$record->name?>" name="name">
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_product" name="table_name">
					<input type="hidden" value="<?=$record->id?>" name="row_id">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug">Product Code / SKU</label>
					<input type="text" class="form-control required" value="<?=$record->sku_id?>" readonly>
					<span class="text-danger error-span">This input is required.</span>
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
							<option <?php if($brand->id == $record->brand_id){ echo "selected"; } ?> value="<?=$brand->id?>">
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
							<option <?php if($child_category->id == $record->child_category){ echo "selected"; } ?> value="<?=$child_category->id?>">
								<?=$child_category->name?> (Parent: <?=$this->common_model->get_record("tbl_category", "id=" . $child_category->category_id, "name")?>) (Sub: <?=$this->common_model->get_record("tbl_sub_category", "id=" . $child_category->sub_category_id, "name")?>)
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
					<input type="number" class="form-control required" min="0" value="<?=$record->selling_price?>" name="selling_price">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug" class="w--100">
						Selling Price <span class="text-danger">*</span> 
					</label>
					<input type="number" class="form-control required" min="0" value="<?=$record->price?>" name="price">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug" class="w--100">
						Product GST <span class="text-danger">*</span> 
					</label>
					<input type="number" class="form-control required" min="0" value="<?=$record->product_gst?>" name="product_gst">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Product Featured Image (400px x 400px preferred)</label>
					<input type="file" name="product_image" accept="image/x-png,image/gif,image/jpeg" class="form-control">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<a target="_blank" href="<?=base_url()?>uploads/products/<?=$record->product_image?>">
					<img style="border: 1px solid #000;" width="100" height="100" src="<?=base_url()?>uploads/products/<?=$record->product_image?>">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Product Color Image (400px x 400px preferred)</label>
					<input type="file" name="product_color_image" accept="image/x-png,image/gif,image/jpeg" class="form-control">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<a target="_blank" href="<?=base_url()?>uploads/products/<?=$record->product_color_image?>">
					<img style="border: 1px solid #000;" width="100" height="100" src="<?=base_url()?>uploads/products/<?=$record->product_color_image?>">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="slug">Short Description <span class="text-danger">*</span></label>
					<textarea class="form-control required" name="short_description" rows="4" dir="ltr"><?=$record->short_description?></textarea>
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="slug">Description / Instructions / Features <span class="text-danger">*</span></label>
					<textarea class="form-control required" id="editor" name="description" rows="14" dir="ltr"><?=$record->description?></textarea>
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="slug">Warranty <span class="text-danger">*</span></label>
					<textarea class="form-control required" id="editor1" name="warranty_description" rows="14" dir="ltr"><?=$record->warranty_description?></textarea>
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="slug">Care Instructions <span class="text-danger">*</span></label>
					<textarea class="form-control required" id="editor2" name="care_instructions" rows="14" dir="ltr"><?=$record->care_instructions?></textarea>
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="slug">Returns <span class="text-danger">*</span></label>
					<textarea class="form-control required" id="editor3" name="returns" rows="14" dir="ltr"><?=$record->returns?></textarea>
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="slug">Quality Promise <span class="text-danger">*</span></label>
					<textarea class="form-control required" id="editor4" name="quality_promise" rows="14" dir="ltr"><?=$record->quality_promise?></textarea>
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
