<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						<div class="row">
							<form class="update_data">
								<div class="col-md-3">
									<div class="form-group">
										<label>Order Process </label>
										<select name="process" class="form-control" required>
											<option <?=($order_process->process=="pending")?"selected":""?> value="pending">Pending</option>
											<option <?=($order_process->process=="processing")?"selected":""?> value="processing">Processing</option>
											<option <?=($order_process->process=="dispatched")?"selected":""?> value="dispatched">Dispatched</option>
											<option <?=($order_process->process=="completed")?"selected":""?> value="completed">Completed</option>
											<option <?=($order_process->process=="cancelled")?"selected":""?> value="cancelled">Cancelled</option>
										</select>
										<input type="hidden" value="<?=$order_process->id?>" name="row_id">
										<input type="hidden" value="tbl_order_process" name="table_name">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Estimated Delivery Date </label>
										<input type="date" value="<?=$order_process->est_delivery_date?>" class="form-control" name="est_delivery_date">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Courier Name </label>
										<input type="text" value="<?=$order_process->courier_name?>" class="form-control" name="courier_name">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Courier ID </label>
										<input type="text" value="<?=$order_process->courier_id?>" class="form-control" name="courier_id">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
								<div class="col-md-12">
									<button class="btn btn-info" type="button" data-target="#view_images" data-toggle="modal">View Package Images</button>
									<button class="btn btn-primary pull-right" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
            </div>
        </div>
    </section>
	<section class="content">
		<div class="invoice" id="invoice">
		  <!-- title row -->
			<div class="row">
				<div class="col-xs-12">
				  <h2 class="page-header">
					<img src="<?=base_url()?>uploads/common/<?=$this->common_model->get_record('tbl_general_settings', "option_name = 'top-header-logo'", 'value')?>" width="70" border="0">
					<small class="pull-right">Date: <?=$order->date?></small>
				  </h2>
				</div>
				<!-- /.col -->
			</div>
			<!-- info row -->
			<div class="row invoice-info">
				<?php foreach($order_addresses as $order_address): ?>
					<?php if($order_address->option_name == "billing"): ?>
						<div class="col-sm-4 invoice-col">
							Billing Address
							<address>
								<strong>
									<?=ucfirst($order_address->first_name) ?> 
									<?=ucfirst($order_address->last_name) ?>
								</strong><br>
								<?php if($order_address->company_name != ""): ?>
									Company Name: <?=$order_address->company_name ?><br>
								<?php endif; ?>
								Address: <?=$order_address->address1 ?><br>
								<?php if($order_address->address2 != ""): ?>
									Landmark: <?=$order_address->address2 ?><br>
								<?php endif; ?>
								City: <?=$order_address->city ?><br>
								State: <?=$order_address->state ?><br>
								Pincode: <?=$order_address->pincode ?><br>
								Mobile Number: <?=$order_address->phone_number ?><br>
								<?php if($order_address->email != ""): ?>
									Email: <?=$order_address->email ?><br>
								<?php endif; ?>
							</address>
						</div>
					<?php endif; ?>
					<?php if($order_address->option_name == "shipping"): ?>
						<div class="col-sm-4 invoice-col">
							Billing Address
							<address>
								<strong>
									<?=ucfirst($order_address->first_name) ?> 
									<?=ucfirst($order_address->last_name) ?>
								</strong><br>
								<?php if($order_address->company_name != ""): ?>
									Company Name: <?=$order_address->company_name ?><br>
								<?php endif; ?>
								Address: <?=$order_address->address1 ?><br>
								<?php if($order_address->address2 != ""): ?>
									Landmark: <?=$order_address->address2 ?><br>
								<?php endif; ?>
								City: <?=$order_address->city ?><br>
								State: <?=$order_address->state ?><br>
								Pincode: <?=$order_address->pincode ?><br>
								Mobile Number: <?=$order_address->phone_number ?><br>
								<?php if($order_address->email != ""): ?>
									Email: <?=$order_address->email ?><br>
								<?php endif; ?>
							</address>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
				
				
				<div class="col-sm-4 invoice-col">
					<b>Order ID: <?=$order->order_id?></b><br>
					<br>
					<b>Payment Method:</b> <?php echo ucfirst($order->payment_method) ?><br>
					<b>Payment Status:</b> <?php echo ucfirst($order->payment_method) ?><br>
					<b>Order Status:</b> <?php echo ucfirst($order->payment_method) ?><br>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- Table row -->
			<div class="row">
				<div class="col-xs-12 table-responsive">
				  <table class="table table-striped">
					<thead>
					<tr>
					  <th>Sl. No.</th>
					  <th>Product</th>
					  <th>Quantity</th>
					  <th>Subtotal</th>
					</tr>
					</thead>
					<tbody>
					<?php $i = 1; ?>
					<?php foreach($order_items as $order_item): ?>
						<tr>
							<td><?=$i?></td>
							<td><?=$this->common_model->get_record('tbl_product', "id=" . $order_item->product_id, 'name')?></td>
							<td><?=$order_item->quantity?></td>
							<td>₹<?=number_format($order_item->price, 2)?></td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
					</tbody>
				  </table>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<div class="row">
				<div class="col-xs-6">
				  
				</div>
				<!-- /.col -->
				<div class="col-xs-6">
				  <div class="table-responsive">
					<table class="table">
					  <tbody><tr>
						<th style="width:50%">Subtotal:</th>
						<td>₹<?=number_format($order->sub_total, 2)?></td>
					  </tr>
					  <tr>
						<th>GST (<?=$this->common_model->get_record('tbl_product', "status = '0' and id=" . $order_item->product_id, 'product_gst')?>%)</th>
						<td>₹<?=number_format($order->gst, 2)?></td>
					  </tr>
					  <tr>
						<th>Shipping:</th>
						<td>₹<?=number_format($order->shipping, 2)?></td>
					  </tr>
					  <tr>
						<th>Total:</th>
						<td>₹<?=number_format($order->total, 2)?></td>
					  </tr>
					</tbody></table>
				  </div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- this row will not appear when printing -->
			<div class="row no-print">
				<div class="col-xs-12">
				  <a href="javascript:void(0)" class="btn btn-primary" onclick="printDiv()"><i class="fa fa-print"></i> Print</a>
				</div>
			</div>
		</div>
    </section>
</div>

<div class="modal fade common-modal" id="view_images" tabindex="-1" role="dialog" aria-labelledby="view_images" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<?php foreach($order_process_images as $order_process_image): ?>
							<div class="col-md-4">
								<a target="_blank" href="<?=base_url()?>uploads/common/<?=$order_process_image->file_name?>">
									<img src="<?=base_url()?>uploads/common/<?=$order_process_image->file_name?>" class="w--100">
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
<script>
	function printDiv() {
		 var printContents = document.getElementById('invoice').innerHTML;
		 var originalContents = document.body.innerHTML;

		 document.body.innerHTML = printContents;

		 window.print();

		 document.body.innerHTML = originalContents;
	}
</script>


