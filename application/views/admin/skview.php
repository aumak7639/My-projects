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
							<th>Product Name</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Quantity</th>
							<th>Notes</th>
							<th>Status</th>
							<th>Date Time</th>
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
								<a target="_blank" href="<?=base_url()?><?=$this->common_model->get_record("tbl_product", "id = '" . $record->product_id . "'", "slug")?>">
									<?=$this->common_model->get_record("tbl_product", "id = '" . $record->product_id . "'", "name")?>
								</a>
							</td>
							<td><?php echo $record->name ?></td>
							<td><?php echo $record->phone_number ?></td>
							<td><?php echo $record->quantity ?></td>
							<td><?php echo $record->notes ?></td>
							<td><?php echo $record->enquiry_status ?></td>
							<td><?php echo $record->date_time ?></td>
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
