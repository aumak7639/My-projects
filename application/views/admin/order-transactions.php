<div class="content-wrapper">
    <section class="content">
		<div class="row">
            <div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<form method="get">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>From date</label>
										<input class="form-control" type="date" name="from_date" value="<?=($_GET['from_date'])?$_GET['from_date']:""?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>To date</label>
										<input class="form-control" type="date" name="to_date" value="<?=($_GET['to_date'])?$_GET['from_date']:""?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="filter_status">
											<option value="1"> Paid</option>
											<option value="0"> Unpaid</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<br>
										<input class="btn btn-sm btn-primary" type="submit"> 
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table_1">
					<thead>
						<tr>
							<th>Sl. No.</th>
							<th>Mimaas Payment ID</th>
							<th>Razorpay Payment ID</th>
							<th>Customer</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Amount</th>
							<th>Description</th>
							<th>Notes</th>
							<th>For Order(s)</th>
							<th>Payment Status</th>
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
							<td><?php echo $record->order_id ?></td>
							<td><?php echo $record->payment_id ?></td>
							<td>
								<?=ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id=" . $record->user_id, 'first_name')) ?> 
								<?=ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id=" . $record->user_id, 'last_name')) ?>
								<br>
								<small><?=ucfirst($this->common_model->get_record('tbl_general_users', "status = '0' and id=" . $record->user_id, 'phone_number')) ?></small>
							</td>
							<td><?php echo $record->email ?></td>
							<td><?php echo $record->contact ?></td>
							<td><?php echo $record->amount ?></td>
							<td><?php echo $record->description?></td>
							<td><?php echo $record->notes?></td>
							<td>
								<?php 
									$order_ids = explode(",", $record->order_ids);
									for($i = 0; $i < sizeof($order_ids); $i++)
									{
										echo $order_ids[$i];
										echo "<br>";
									}
								?>
							</td>
							<td><?php echo ucfirst($record->payment_status) ?></td>
							<td>
								<?php if($record->is_paid == 0): ?>
									<a class="btn btn-sm btn-warning">Unpaid</a>
								<?php else: ?>
									<a class="btn btn-sm btn-success">Paid</a>
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