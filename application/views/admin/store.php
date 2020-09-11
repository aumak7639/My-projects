<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table">
					<thead>
						<tr>
							<th>Sl. No.</th>
							<th>Store ID</th>
							<th>Name</th>
							<th>Plan</th>
							<th>Unpaid Payout</th>
							<th>Paid Payout</th>
							<th>Total Paid Payout</th>
							<th class="text-center">Is verified?</th>
							<th class="text-center">Actions</th>
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
							<td><?php echo $inc; ?></td>
							<td>
								<a href="<?=base_url()?>store/<?=$tis->slugify($record->name)?>/<?=$record->store_id?>" target="_blank">
									<?php echo $record->store_id ?>
								</a>
							</td>
							<td>
								<a href="<?=base_url()?>store/<?=$tis->slugify($record->name)?>/<?=$record->store_id?>" target="_blank">
									<?php echo $record->name ?>
								</a>
							</td>
							<td><?=$this->common_model->get_record('tbl_plans', "status = '0' and id='" . $record->plan_id . "'", "plan_name")?></td>
							<td class="text-center">
								<a target="_blank" href="<?=base_url()?>admin/unpaid-payouts?store_id=<?=$record->store_id?>" class="btn btn-sm btn-info">
									<?=sizeof($this->common_model->get_custom_query("select a.* from tbl_orders a, tbl_order_process b where a.status = '0' and a.is_payout = '0' and b.process = 'completed' and a.store_id = '" . $record->store_id . "' and a.order_id = b.order_id"))?>
								</a>
							</td>
							<td class="text-center">
								<a target="_blank" href="<?=base_url()?>admin/paid-payouts?store_id=<?=$record->store_id?>" class="btn btn-sm btn-info">
									<?=sizeof($this->common_model->get_records('tbl_payouts', "status = '0' and is_payout = '1' and store_id = '" . $record->store_id . "' order by id desc"))?>
								</a>
							</td>
							<td>
								<?php $tot = $this->common_model->get_custom_query("select sum(total) as tot from tbl_payouts where status = '0' and is_payout = '1' and store_id = '" . $record->store_id . "' order by id desc")[0]->tot; ?>
								₹<?=number_format(($tot == "")?"0":$tot, 2)?>
							</td>
							<td class="text-center">
								<?php if($record->is_verified == 1): ?>
									<span class="btn btn-sm btn-success">Verified</span>
								<?php else: ?>
									<span class="btn btn-sm btn-warning">Pending</span>
								<?php endif; ?>
							</td>
							<td class="text-center">
								<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewstore-<?php echo $record->id ?>">
									View
								</a>
								<!-- modal start -->
								<div class="modal fade" id="viewstore-<?php echo $record->id ?>">
								  <div class="modal-dialog">
									<div class="modal-content text-left">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span></button>
											<h4 class="modal-title"><?php echo $record->name ?></h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-6">                                
													<div class="form-group">
														<label for="name">
															Seller Name (Primary Users)
														</label>
														<br>
														<label for="name">
															<ul>
																<?php 
																	foreach(explode(",", $record->primary_users) as $sell):
																		if($sell != ""):
																			$seller = $this->common_model->get_record('tbl_sellers', "status = '0' and store_id='" . $record->store_id . "' and id = '" . $sell . "'", "user_id");
																			echo "<li>";
																			echo ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id = '" . $seller . "'", "first_name"));
																			echo " ";
																			echo ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id = '" . $seller . "'", "last_name"));
																			echo "</li>";
																		endif;
																	endforeach;
																?>
															</ul>
														</label>
													</div>
												</div>
											</div>
											<hr>
											<div class="row">
												<form reload-action="true" this_id="form-002-<?=uniqid()?>" class="update_data" method="post" role="form">
													<div class="col-md-6">                                
														<div class="form-group">
															<label for="name">Is verified? <span class="text-danger">*</span></label>
															<select class="form-control required" name="is_verified">
																<option <?=$record->is_verified=='0'?"selected":""?> value="0">Pending</option>
																<option <?=$record->is_verified=='1'?"selected":""?> value="1">Verified</option>
																<option <?=$record->is_verified=='2'?"selected":""?> value="2">Declined</option>
															</select>
															<span class="text-danger error-span">This input is required.</span>
															<input type="hidden" name="row_id" value="<?php echo $record->id ?>">
															<input type="hidden" name="table_name" value="tbl_stores">
														</div>
													</div>
													<div class="col-md-6">                                
														<div class="form-group">
															<label for="name">Active / Inactive? <span class="text-danger">*</span></label>
															<select class="form-control required" name="active_status">
																<option <?=$record->is_verified=='0'?"selected":""?> value="0">Inactive</option>
																<option <?=$record->is_verified=='1'?"selected":""?> value="1">Active</option>
															</select>
															<span class="text-danger error-span">This input is required.</span>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Profile Image</label>
															<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" name="store_logo">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Current Profile Image</label><br>
															<a target="_blank" href="<?=base_url()?>uploads/common/<?php echo $record->store_logo ?>">
																<img width="50" height="50" src="<?=base_url()?>uploads/common/<?php echo $record->store_logo ?>">
															</a>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Banner Image</label>
															<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" name="banner">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Current Banner Image</label><br>
															<a target="_blank" href="<?=base_url()?>uploads/common/<?php echo $record->banner ?>">
																<img width="50" height="50" src="<?=base_url()?>uploads/common/<?php echo $record->banner ?>">
															</a>
														</div>
													</div>
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Save">
													</div>
												</form>
											</div>
											<hr>
											<?php
												$account_det = $this->common_model->get_records('tbl_store_payout_account', "status = '0' and store_id = '" . $record->store_id . "'")[0];
											?>
											<form reload-action="true" class="update_data" role="form" this_id="form-001-<?=uniqid()?>">
												<div class="row">
													<div class="col-md-12">
														<h4>Payout Information</h4>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Bank Account Number</label><br>
															<input type="text" class="form-control" name="account_number" value="<?=$account_det->account_number?>">
															<input type="hidden" name="row_id" value="<?=$account_det->id?>">
															<input type="hidden" name="table_name" value="tbl_store_payout_account">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Account Holder Name</label><br>
															<input type="text" class="form-control" name="holder_name" value="<?=$account_det->holder_name?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Bank IFSC</label><br>
															<input type="text" class="form-control" name="ifsc" value="<?=$account_det->ifsc?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Status</label><br>
															<select class="form-control" name="is_approved">
																<option <?=($account_det->is_approved==0)?"selected":""?> value="0">Pending</option>
																<option <?=($account_det->is_approved==1)?"selected":""?> value="1">Approved</option>
																<option <?=($account_det->is_approved==2)?"selected":""?> value="2">Declined</option>
															</select>
														</div>
													</div>
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Save">
													</div>
												</div>
											</form>
											<hr>
											<?php
												$tax_det = $this->common_model->get_records('tbl_store_tax', "status = '0' and store_id = '" . $record->store_id . "'")[0];
											?>
											<form reload-action="true" class="update_data" role="form" this_id="form-003-<?=uniqid()?>">
												<div class="row">
													<div class="col-md-12">
														<h4>Tax Information</h4>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">PAN</label><br>
															<input type="text" class="form-control" name="pan" value="<?=$tax_det->pan?>">
															<input type="hidden" name="row_id" value="<?=$tax_det->id?>">
															<input type="hidden" name="table_name" value="tbl_store_tax">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Name on PAN</label><br>
															<input type="text" class="form-control" name="pan_name" value="<?=$tax_det->pan_name?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Business Address</label><br>
															<input type="text" class="form-control" name="business_address" value="<?=$tax_det->business_address?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Pincode</label><br>
															<input type="text" class="form-control" name="pincode" value="<?=$tax_det->pincode?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">GSTIN</label><br>
															<input type="text" class="form-control" name="gstin" value="<?=$tax_det->gstin?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="slug">Status</label><br>
															<select class="form-control" name="is_approved">
																<option <?=($tax_det->is_approved==0)?"selected":""?> value="0">Pending</option>
																<option <?=($tax_det->is_approved==1)?"selected":""?> value="1">Approved</option>
																<option <?=($tax_det->is_approved==2)?"selected":""?> value="2">Declined</option>
															</select>
														</div>
													</div>
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Save">
													</div>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
										</div>
									</div>
								  </div>
								</div>
								<!-- modal end -->
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
