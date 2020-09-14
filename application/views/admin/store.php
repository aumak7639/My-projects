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
										<form reload-action="true" this_id="form-002" class="update_data" method="post" role="form">
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
																Seller ID (Primary Users)
															</label>
															<br>
															<label for="name">
																<ul>
																	<?php 
																		foreach(explode(",", $record->primary_users) as $sell):
																			if($sell != ""):
																				echo "<li>";
																				echo "MM";
																				echo $this->common_model->get_record('tbl_sellers', "status = '0' and store_id='" . $record->store_id . "' and id = '" . $sell . "'", "seller_id");
																				echo "</li>";
																			endif;
																		endforeach;
																	?>
																</ul>
															</label>
														</div>
													</div>
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
												</div>
											</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
												<input type="submit" class="btn btn-primary" value="Save changes">
											</div>
										</form>
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
