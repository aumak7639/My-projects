<div class="content-wrapper">
    
    <section class="content">
        <div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<div class="row">
							<form>
								<div class="col-md-3">
									<label>Min Date</label>
									<input class="form-control" type="date" value="<?=date('Y-m-d')?>" name="min_date" required>
								</div>
								<div class="col-md-3">
									<label>Max Date</label>
									<input class="form-control" type="date" value="<?=date('Y-m-d')?>" name="max_date" required>
									<?php if(isset($_GET['store_id'])): ?>
										<input type="hidden" value="<?=$_GET['store_id']?>" name="store_id">
									<?php endif; ?>
								</div>
								<div class="col-md-3">
									<label>&nbsp;</label><br>
									<button class="btn btn-sm btn-primary" type="submit">
										Submit
									</button>
								</div>
							</form>
						</div>
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
							<th>Payout Date</th>
							<th>Order ID</th>
							<th>Store ID</th>
							<th>Order Sub Total</th>
							<th>Mimaas Commission</th>
							<th>Shipping</th>
							<th>GST</th>
							<th>Payout Amount</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach($records as $record): ?>
							<tr>
								<td><?=$i?></td>
								<td><?=date("M d, Y", strtotime($record->date_time))?></td>
								<td><?=$record->order_id?></td>
								<td><?=$record->store_id?></td>
								<td>₹<?=number_format($record->sub_total, 2)?></td>
								<td>₹<?=number_format($record->commission_fee, 2)?></td>
								<td>₹<?=number_format($record->shipping, 2)?></td>
								<td>₹<?=number_format($record->gst, 2)?></td>
								<td>₹<?=number_format($record->total, 2)?></td>
								<td>
									<span class="btn btn-success color--white">Paid</span>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
