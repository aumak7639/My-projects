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
							<th>Order Date</th>
							<th>Order ID</th>
							<th>Store ID</th>
							<th>Order Sub Total</th>
							<th>Mimaas Commission</th>
							<th>Shipping</th>
							<th>GST</th>
							<th>Payout Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach($records as $seller_payment): ?>
							<?php if($this->common_model->get_record("tbl_order_process", "order_id = '" . $seller_payment->order_id . "'", "process") == 'completed'): ?>
								<?php if($seller_payment->is_payout == 1): ?>
									<?php $payout_det = $this->common_model->get_records("tbl_payouts", "payout_id = '" . $seller_payment->payout_id . "'")[0]; ?>
									<tr>
										<td><?=$i?></td>
										<td><?=date("M d, Y", strtotime($seller_payment->date_time))?></td>
										<td><?=$seller_payment->order_id?></td>
										<td><?=$seller_payment->store_id?></td>
										<td>₹<?=number_format($seller_payment->sub_total, 2)?></td>
										<td>₹<?=number_format($payout_det->commission_fee, 2)?></td>
										<td>₹<?=number_format($seller_payment->shipping, 2)?></td>
										<td>₹<?=number_format($seller_payment->gst, 2)?></td>
										<td>₹<?=number_format($payout_det->total, 2)?></td>
										<td>
											<span class="btn btn-warning color--white">Paid</span>
										</td>
									</tr>
									<?php $i++; ?>
								<?php else: ?>
									<tr>
										<td><?=$i?></td>
										<td><?=date("M d, Y", strtotime($seller_payment->date_time))?></td>
										<td><?=$seller_payment->order_id?></td>
										<td><?=$seller_payment->store_id?></td>
										<td>₹<?=number_format($seller_payment->sub_total, 2)?></td>
										<td>
											₹<?php
												$payout_commission_fee = $seller_payment->payout_commission_fee;
												
												echo number_format(($seller_payment->sub_total / 100) * $seller_payment->payout_commission_fee, 2);
											?>
										</td>
										<td>₹<?=number_format($seller_payment->shipping, 2)?></td>
										<td>₹<?=number_format($seller_payment->gst, 2)?></td>
										<td>
											<?php $total = ($seller_payment->sub_total + $seller_payment->shipping) -  (($seller_payment->sub_total / 100) * $seller_payment->payout_commission_fee)?>
											<?php 
												if($seller_payment->is_own_gst == 1){
													$total = $total + $seller_payment->gst;
												}
											?>
											₹<?=number_format($total, 2)?>
										</td> 
										<td>
											<span class="btn btn-primary color--white" data-toggle="modal" data-target="#payout-modal" onclick="payout_modal('<?=$seller_payment->order_id?>')">Pay</span>
										</td>
									</tr>
									<?php $i++; ?>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

<!-- modal start -->
<div class="modal fade" id="payout-modal">
  <div class="modal-dialog">
	<div class="modal-content text-left">
		<form this_id="form-002" id="payout-status-update" role="form" enctype="multipart/form-data">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
				<h4 class="modal-title"><?php echo $record->name ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Order ID <span class="text-danger">*</span></label>
							<input type="text" class="form-control required" id="order_id" value="" readonly>
							<input type="hidden" value="" name="order_id"> 
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Transaction ID <span class="text-danger">*</span></label>
							<input type="text" class="form-control required" name="transaction_id" value="" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Upload Transaction Details <span class="text-danger">*</span></label>
							<input type="file" class="form-control required" name="file" required>
						</div>
					</div>
					<div class="col-md-6">                                
						<div class="form-group">
							<label for="name">Status <span class="text-danger">*</span></label>
							<select class="form-control required" name="is_payout" required>
								<option selected value="1">Paid</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">                                
						<div class="form-group">
						<label for="name">Notes</label>
							<textarea class="form-control" name="notes"></textarea>
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
	function payout_modal(a)
	{
		$('input[name=order_id]').val(a);
		$('#order_id').val(a);
	}
</script>