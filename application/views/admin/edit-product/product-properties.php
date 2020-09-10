	
	<form this_id="form-00<?=uniqid()?>" class="update_product_properties_data" method="post" role="form" enctype="multipart/form-data">
		<?php $incc = 1; ?>
		<?php $propss = $this->common_model->get_records("tbl_product_properties", "status = '0' and product_id = '$record->id' order by id asc"); ?>
		<?php foreach($propss as $props): ?>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="slug" class="w--100">
							Title <span class="text-danger">*</span> 
						</label>
						<select class="form-control" name="title_id[]" required>
							<?php foreach($this->common_model->get_records("tbl_product_properties_master", "status = '0' order by title asc") as $prop): ?>
								<option <?=($prop->id == $props->title_id)?"selected":""?> value="<?=$prop->id?>"><?=$prop->title?></option>							
							<?php endforeach; ?>
						</select>
						<input type="hidden" value="<?=$record->id?>" name="product_id">
						<span class="text-danger error-span">This input is required.</span>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="slug" class="w--100">
							Value <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control required" value="<?=$props->value?>" name="value[]">
						<span class="text-danger error-span">This input is required.</span>
					</div>
				</div>
				<div class="col-md-2">
					<br>
					<button type="button" class="btn btn-sm btn-success" onclick="prop_add()"><i class="fa fa-plus"></i></button>
					<?php if($incc != 1): ?>
						<button type="button" class="btn btn-sm btn-danger" onclick="prop_remove()"><i class="fa fa-close"></i></button>
					<?php endif; ?>
				</div>
			</div>
			<?php $incc++; ?>
		<?php endforeach; ?>
		
		<?php if(sizeof($propss) == 0): ?>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="slug" class="w--100">
							Title <span class="text-danger">*</span> 
						</label>
						<select class="form-control" name="title_id[]" required>
							<?php foreach($this->common_model->get_records("tbl_product_properties_master", "status = '0' order by title asc") as $prop): ?>
								<option value="<?=$prop->id?>"><?=$prop->title?></option>							
							<?php endforeach; ?>
						</select>
						<input type="hidden" value="<?=$record->id?>" name="product_id">
						<span class="text-danger error-span">This input is required.</span>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="slug" class="w--100">
							Value <span class="text-danger">*</span>
						</label>
						<input type="text" class="form-control required" name="value[]">
						<span class="text-danger error-span">This input is required.</span>
					</div>
				</div>
				<div class="col-md-2">
					<br>
					<button type="button" class="btn btn-sm btn-success" onclick="prop_add()"><i class="fa fa-plus"></i></button>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="property-list">
			
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary pull-right">Update</button>
			</div>
		</div>
		
	</form>
	
	<script>
		function prop_add()
		{
			$('.property-list').append(''+
				'<div class="row">'+
					'<div class="col-md-5">'+
						'<div class="form-group">'+
							'<label for="slug" class="w--100">'+
								'Title <span class="text-danger">*</span> '+
							'</label>'+
							'<select class="form-control" name="title_id[]" required>'+
								'<?php foreach($this->common_model->get_records("tbl_product_properties_master", "status = '0' order by title asc") as $prop): ?>'+
									'<option value="<?=$prop->id?>"><?=$prop->title?></option>		'+					
								'<?php endforeach; ?>'+
							'</select>'+
							'<span class="text-danger error-span">This input is required.</span>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-5">'+
						'<div class="form-group">'+
							'<label for="slug" class="w--100">'+
								'Value <span class="text-danger">*</span>'+
							'</label>'+
							'<input type="text" class="form-control required" name="value[]">'+
							'<span class="text-danger error-span">This input is required.</span>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-2">'+
						'<br>'+
						'<button type="button" class="btn btn-sm btn-success" onclick="prop_add()"><i class="fa fa-plus"></i></button>'+
						'<button type="button" class="btn btn-sm btn-danger" onclick="prop_remove(this)"><i class="fa fa-close"></i></button>'+
					'</div>'+
				'</div>'+
			'');
		}
		
		function prop_remove(tis)
		{
			$(tis).parent().parent().remove();
		}
	</script>