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
							<th>Order ID</th>
							<th>Product</th>
							<th>Total</th>
							<th>Order Status</th>
							<th>Est. / Delivered Date</th>
							<th class="text-center">Payment Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($records))
						{
							$inc = 1;
							foreach($records as $record)
							{
								$order_process = $this->common_model->get_records('tbl_order_process', "status = '0' and order_id = '" . $record->order_id . "'")[0];
						?>
						<tr>
							<td><?php echo $inc; ?></td>
							<td>
								<a class="btn btn-sm btn-primary" href="<?=base_url()?>admin/order-details/<?=$record->order_id?>">
									<?php echo $record->order_id ?>
								</a>
							</td>
							<td>
								<a href="<?=base_url()?><?=$record->slug?>" target="_blank">
									<?php echo $record->name ?>
								</a>
							</td>
							<td>₹<?php echo number_format($this->common_model->get_record('tbl_orders', "status = '0' and order_id='" . $record->order_id . "'", "total"), 2) ?></td>
							<td><?=ucfirst($order_process->process)?></td>
							<td><?=$order_process->est_delivery_date?></td>
							<td class="text-center">
								<?php if($this->common_model->get_record('tbl_orders', "status = '0' and order_id='" . $record->order_id . "'", "is_paid") == 1): ?>
									<span class="btn btn-sm btn-success">Paid</span>
								<?php else: ?>
									<span class="btn btn-sm btn-warning">Unpaid</span>
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
