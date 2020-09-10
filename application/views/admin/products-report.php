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
							<th>Store Name</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Sub Category</th>
							<th>Child Category</th>
							<th>Price</th>
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
							<td><?php echo $record->store_id ?></td>
							<td>
								<?=$this->common_model->get_record("tbl_stores", "store_id='" . $record->store_id . "'", "name")?>
								
								<?php if($this->common_model->get_record("tbl_stores", "store_id='" . $record->store_id . "'", "is_verified") != 1): ?>
									<span class="text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
								<?php else: ?>
									<span class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
								<?php endif; ?>
							</td>
							<td>
								<a target="_blank" href="<?=base_url()?><?=$record->slug?>">
									<?php echo $record->name ?>
								</a>
							</td>
							<td><?php echo $this->common_model->get_category_name($record->category) ?></td>
							<td><?php echo $this->common_model->get_sub_category_name($record->sub_category) ?></td>
							<td><?php echo $this->common_model->get_child_category_name($record->child_category) ?></td>
							<td>₹<?php echo $record->price ?></td>
							<td class="text-center">
								<?=ucfirst($record->product_status)?>
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