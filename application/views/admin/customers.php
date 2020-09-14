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
							<th>Cusomer Name</th>
							<th>Mobile Number</th>
							<th class="text-center">Total Orders</th>
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
							<td><?php echo $inc; ?></td>
							<td>
								<?=ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id=" . $record->id, 'first_name')) ?> 
								<?=ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id=" . $record->id, 'last_name')) ?>
							</td>
							<td><?php echo $record->phone_number ?></td>
							<td class="text-center">
								<a href="<?=base_url()?>admin/orders?user-id=<?=$record->id?>">
									<?php echo sizeof($this->common_model->get_records('tbl_orders', "status = '0' and user_id=" . $record->id)) ?>
								</a>
							</td>
							<td class="text-center">
								<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewstore-<?php echo $record->id ?>"><i class="fa fa-book"></i></a>
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
															<label for="name">First Name <span class="text-danger">*</span></label>
															<input type="text" class="form-control required" name="first_name" value=" <?=ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id=" . $record->id, 'first_name'))  ?>">
															
															<input type="hidden" value="tbl_general_users" name="table_name">
															<input type="hidden" value="<?=$record->id?>" name="row_id">
														</div>
													</div>
													<div class="col-md-6">                                
														<div class="form-group">
															<label for="name">Last Name <span class="text-danger">*</span></label>
															<input type="text" class="form-control required" name="last_name" value=" <?=ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id=" . $record->id, 'last_name'))  ?>">
														</div>
													</div>
													<div class="col-md-6">                                
														<div class="form-group">
															<label for="name">Phone Number <span class="text-danger">*</span></label>
															<input type="text" class="form-control required" name="phone_number" value=" <?=ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id=" . $record->id, 'phone_number'))  ?>">
														</div>
													</div>
													<div class="col-md-6">                                
														<div class="form-group">
														<label for="name">Is verified? <span class="text-danger">*</span></label>
															<select class="form-control required" name="is_verified">
																<option <?=$record->is_verified=='0'?"selected":""?> value="0">No</option>
																<option <?=$record->is_verified=='1'?"selected":""?> value="1">Yes</option>
																
															</select>
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
							<td>
								<?php if($record->is_verified == 0): ?>
									<a class="btn btn-sm btn-warning">Pending</a>
								<?php else: ?>
									<a class="btn btn-sm btn-success">Verified</a>
								<?php endif; ?>
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