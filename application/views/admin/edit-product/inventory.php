	<form this_id="form-00<?=uniqid()?>" class="update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Item(s) in stock <span class="text-danger">*</span></label>
					<input type="number" min="0" value="<?=$record->in_stock?>" name="in_stock" class="required form-control">
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_product" name="table_name">
					<input type="hidden" value="<?=$record->id?>" name="row_id">
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Shipping Cost <span class="text-danger">*</span></label>
					<input type="number" min="0" value="<?=$record->shipping_cost?>" name="shipping_cost" class="required form-control">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Minimum Order Quantity <span class="text-danger">*</span></label>
					<input type="number" min="0" value="<?=$record->moq?>" name="moq" class="required form-control">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">                                
				<div class="form-group">
					<label for="name">Shipping Note</label>
					<input type="text" value="<?=$record->shipping_note?>" name="shipping_note" class="form-control">
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
