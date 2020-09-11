<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table_1">
					<thead>
						<tr>
							<th>Sl. No.</th>
							<th>Cusomer Name</th>
							<th>Mobile Number</th>
							<th class="text-center">Total Orders</th>
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
								<?php echo sizeof($this->common_model->get_records('tbl_orders', "status = '0' and user_id=" . $record->id)) ?>
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