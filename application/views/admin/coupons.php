<div class="content-wrapper">
    
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<span class="btn btn-primary" data-toggle="modal" data-target="#coupon-modal">Add Coupon</span>
			</div>
		</div>
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table_1">
					<thead>
						<tr>
							<th class="text-center">Sl. No.</th>
							<th class="text-center">Coupon Code</th>
							<th class="text-center">Flat / Percentage</th>
							<th class="text-center">Value</th>
							<th class="text-center">Start Date</th>
							<th class="text-center">End Date</th>
							<th class="text-center">Limit</th>
							<th class="text-center">Used</th>
							<th class="text-center">Actions</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($records))
						{
							$inc = 1;
							foreach($records as $record)
							{
						?>
						<tr>
							<td class="text-center"><?php echo $inc; ?></td>
							<td class="text-center"><?=$record->coupon_code?></td>
							<td class="text-center"> <?=($record->flat_percentage==0)?"Flat":""?> <?=($record->flat_percentage==1)?"Percentage":""?></td>
							<td class="text-center"><?=$record->value?></td>
							<td class="text-center"><?=$record->start_date?></td>
							<td class="text-center"><?=$record->end_date?></td>
							<td class="text-center"><?=$record->limits?></td>
							<td class="text-center"><?=$record->used?></td>
							<td class="text-center">
								<span class="btn btn-sm btn-info" data-toggle="modal" data-target="#coupon-edit-modal" onclick="edit_coupon('<?=$record->id?>', '<?=$record->coupon_code?>', '<?=$record->flat_percentage?>', '<?=$record->value?>', '<?=$record->start_date?>', '<?=$record->end_date?>', '<?=$record->limits?>', '<?=$record->coupon_status?>'); child_category_1('<?=$record->child_category?>'); product_id_1('<?=$record->product_id?>');">
									<i class="fa fa-pencil"></i>
								</span>
							</td>
							<td class="text-center">
								<?=($record->coupon_status==0)?"Active":""?> <?=($record->coupon_status==1)?"Expired":""?>
							</td>
						</tr>
						<?php
							$inc++;
							}
						}
						?>
					</tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

<!-- modal start -->
<div class="modal fade" id="coupon-modal">
  <div class="modal-dialog">
	<div class="modal-content text-left">
		<form this_id="form-002" class="insert_coupon_data" role="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><?php echo $record->name ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Select Categories</label>
							<select class="form-control select2" multiple="multiple" id="child_category">
								<?php foreach($this->common_model->get_records("tbl_child_category", "status = '0' order by id desc") as $child_category): ?>
									<option value="<?=$child_category->id?>">
										<?=$child_category->name?> 
										(Parent: <?=$this->common_model->get_record("tbl_category", "id=" . $child_category->category_id, "name")?>) 
										(Sub: <?=$this->common_model->get_record("tbl_sub_category", "id=" . $child_category->sub_category_id, "name")?>)
									</option>
								<?php endforeach; ?>
							</select>
							<input type="hidden" value="tbl_coupons" name="table_name"> 
							<input type="hidden" value="" name="child_category"> 
							<input type="hidden" value="" name="product_id"> 
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Select Product</label>
							<select class="form-control select2" multiple="multiple" id="product_id">
								<?php foreach($this->common_model->get_records("tbl_product", "status = '0' and product_status = 'approved' order by id desc") as $product): ?>
									<option value="<?=$product->id?>">
										<?=$product->name?> 
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Coupon Code <span class="text-danger">*</span></label>
							<input type="text" class="form-control required" name="coupon_code">
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Flat / Percentage <span class="text-danger">*</span></label>
							<select class="form-control required" name="flat_percentage" required>
								<option value="0">Flat</option>
								<option value="1">Percentage</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Value <span class="text-danger">*</span></label>
							<input type="number" class="form-control required" min="1" value="1" name="value" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Start Date <span class="text-danger">*</span></label>
							<input type="date" class="form-control required" name="start_date" value="<?=date('Y-m-d')?>" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">End Date <span class="text-danger">*</span></label>
							<input type="date" class="form-control required" name="end_date" value="<?=date('Y-m-d')?>" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Limit <span class="text-danger">*</span></label>
							<input type="number" class="form-control required" min="1" value="1" name="limits" required>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
				<input type="submit" class="btn btn-primary" value="Save">
			</div>
		</form>
	</div>
  </div>
</div>
<!-- modal end -->	  

<!-- modal start -->
<div class="modal fade" id="coupon-edit-modal">
  <div class="modal-dialog">
	<div class="modal-content text-left">
		<form reload-action="true" this_id="form-002" class="update_data" role="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><?php echo $record->name ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Select Categories</label>
							<select class="form-control select2" multiple="multiple" id="child_category_1">
								<?php foreach($this->common_model->get_records("tbl_child_category", "status = '0' order by id desc") as $child_category): ?>
									<option value="<?=$child_category->id?>">
										<?=$child_category->name?> 
										(Parent: <?=$this->common_model->get_record("tbl_category", "id=" . $child_category->category_id, "name")?>) 
										(Sub: <?=$this->common_model->get_record("tbl_sub_category", "id=" . $child_category->sub_category_id, "name")?>)
									</option>
								<?php endforeach; ?>
							</select>
							<input type="hidden" value="tbl_coupons" name="table_name"> 
							<input type="hidden" value="tbl_coupons" name="row_id"> 
							<input type="hidden" value="" name="child_category"> 
							<input type="hidden" value="" name="product_id">
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Select Product</label>
							<select class="form-control select2" multiple="multiple" id="product_id_1">
								<?php foreach($this->common_model->get_records("tbl_product", "status = '0' and product_status = 'approved' order by id desc") as $product): ?>
									<option value="<?=$product->id?>">
										<?=$product->name?> 
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Coupon Code <span class="text-danger">*</span></label>
							<input type="text" class="form-control required" name="coupon_code">
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Flat / Percentage <span class="text-danger">*</span></label>
							<select class="form-control required" name="flat_percentage" required>
								<option value="0">Flat</option>
								<option value="1">Percentage</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Value <span class="text-danger">*</span></label>
							<input type="number" class="form-control required" min="1" value="1" name="value" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Start Date <span class="text-danger">*</span></label>
							<input type="date" class="form-control required" name="start_date" value="<?=date('Y-m-d')?>" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">End Date <span class="text-danger">*</span></label>
							<input type="date" class="form-control required" name="end_date" value="<?=date('Y-m-d')?>" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Limit <span class="text-danger">*</span></label>
							<input type="number" class="form-control required" min="1" value="1" name="limits" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Coupon Status <span class="text-danger">*</span></label>
							<select class="form-control required" name="coupon_status" required>
								<option selected value="0">Active</option>
								<option selected value="1">Expired</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
				<input type="submit" class="btn btn-primary" value="Save">
			</div>
		</form>
	</div>
  </div>
</div>
<!-- modal end -->	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>

<script>
	function edit_coupon(row_id, coupon_code, flat_percentage, value, start_date, end_date, limits, coupon_status)
	{
		$('input[name=row_id]').val(row_id);
		$('input[name=coupon_code]').val(coupon_code);
		$('select[name=flat_percentage]').val(flat_percentage);
		$('input[name=value]').val(value);
		$('input[name=start_date]').val(start_date);
		$('input[name=end_date]').val(end_date);
		$('input[name=limits]').val(limits);
		$('select[name=coupon_status]').val(coupon_status);
	}
</script>

<script>
	function child_category_1(a)
	{
		var selectedValues = new Array();
		selectedValues[0] = "842";
		selectedValues[1] = "841";
		$("#child_category_1").val(selectedValues);
	}
	
	function product_id_1(a)
	{
		$("#product_id_1").val(a);
	}
</script>