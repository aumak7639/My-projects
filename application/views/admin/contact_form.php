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
							<th>Date Time</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Status</th>
							<th>Comments</th>
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
							<td><?php echo $record->date_time ?></td>
							<td><?php echo $record->name ?></td>
							<td><?php echo $record->email ?></td>
							<td><?php echo $record->phone_number ?></td>
							<td><?php echo $record->subject ?></td>
							<td><?php echo $record->message ?></td>
							<td>
								<form class="update_data">
									<input type="hidden" name="table_name" value="tbl_contact_form"> 
									<input type="hidden" name="row_id" value="<?php echo $record->id ?>">
									<select class="form-control" name="ticket_status" required onchange="$(this).parent().submit();">
										<option <?=($record->ticket_status=='pending')?"selected":""?> value="pending">Pending</option>
										<option <?=($record->ticket_status=='processing')?"selected":""?> value="processing">Processing</option>
										<option <?=($record->ticket_status=='resolved')?"selected":""?> value="resolved">Resolved</option>
										<option <?=($record->ticket_status=='closed')?"selected":""?> value="closed">Closed</option>
									</select>
								</form>
							</td>
							<td>
								<span class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewcomments-<?php echo $record->id ?>">
									View
								</span>
								<!-- modal start -->
								<div class="modal fade" id="viewcomments-<?php echo $record->id ?>">
								  <div class="modal-dialog">
									<div class="modal-content text-left">
										<div class="modal-header">
											<div class="row">
												<div class="col-md-12">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span></button>
													<h4 class="modal-title"><?php echo $record->name ?></h4>
												</div>
											</div>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-12">                                
													<div class="form-group">
														<label for="name">
															Comments
														</label>
														<br>
														<div style="height: 500px;overflow-y: scroll;">
															<?php 
																foreach($this->common_model->get_records("tbl_contact_form_comments", "status = '0' and cf_id = '" .$record->id . "' order by id desc") as $comment):
																	?>
																		<div class="well">
																			<h4>
																				<?=$this->common_model->get_record("tbl_users", "userId='" . $comment->user_id . "'", "name")?> 
																				<small>(<?=$comment->date_time?>)</small>
																			</h4>
																			<p><?=$comment->comment?></p>
																		</div>
																	<?php
																endforeach;
															?>
															<?php
																if(sizeof($this->common_model->get_records("tbl_contact_form_comments", "status = '0' and cf_id = '" .$record->id . "' order by id desc")) < 1)
																{
																	?>
																		<div class="well text-center">
																			No records.
																		</div>
																	<?php
																}
															?>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">                                
													<form class="insert_data" this_id="form-<?=uniqid()?>" reload-action="true">
														<div class="form-group">
															<input type="hidden" name="table_name" value="tbl_contact_form_comments">
															<input type="hidden" name="cf_id" value="<?=$record->id?>">
															<input type="hidden" name="user_id" value="<?=$this->session->userdata('userId')?>">
															<textarea name="comment" class="form-control" required></textarea>
														</div>                               
														<div class="form-group">
															<input type="submit" value="Add" class="btn btn-primary btn-sm">
														</div>
													</form>
												</div>
											</div>
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
