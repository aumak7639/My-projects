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
							<th>Store ID</th>
							<th>Name</th>
							<th>Plan</th>
							<th>Unpaid Payout</th>
							<th>Paid Payout</th>
							<th>Total Paid Payout</th>
							<th>Bank Account Number</th>
							<th>Account Holder Name</th>
							<th>Bank IFSC</th>
							<th>Payout Information Proof Status</th>
							<th>PAN</th>
							<th>Name on PAN</th>
							<th>Business Address</th>
							<th>Pincode</th>
							<th>GSTIN</th>
							<th>Tax Information Proof Status</th>
							<th class="text-center">Is verified?</th>
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
							
							<?php
								$account_det = $this->common_model->get_records('tbl_store_payout_account', "status = '0' and store_id = '" . $record->store_id . "'")[0];
							?>
							
							<td><?=$account_det->account_number?></td>
							<td><?=$account_det->holder_name?></td>
							<td><?=$account_det->ifsc?></td>
							<td><?=($account_det->is_approved==0)?"Pending":""?> <?=($account_det->is_approved==1)?"Approved":""?> <?=($account_det->is_approved==2)?"Declined":""?></td>
							
							<?php
								$tax_det = $this->common_model->get_records('tbl_store_tax', "status = '0' and store_id = '" . $record->store_id . "'")[0];
							?>
							
							<td><?=$tax_det->pan?></td>
							<td><?=$tax_det->pan_name?></td>
							<td><?=$tax_det->business_address?></td>
							<td><?=$tax_det->pincode?></td>
							<td><?=$tax_det->gstin?></td>
							<td><?=($tax_det->is_approved==0)?"Pending":""?> <?=($tax_det->is_approved==1)?"Approved":""?> <?=($tax_det->is_approved==2)?"Declined":""?></td>
							<td class="text-center">
								<?php if($record->is_verified == 1): ?>
									<span class="btn btn-sm btn-success">Verified</span>
								<?php else: ?>
									<span class="btn btn-sm btn-warning">Pending</span>
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
