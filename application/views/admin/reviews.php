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
							<th>User</th>
							<th>Product</th>
							<th>Comment</th>
							<th>Ratings</th>
							<th>Date Time</th>
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
								<?=$this->common_model->get_record("tbl_general_users", "id=" . $record->user_id, 'first_name')?> <?=$this->common_model->get_record("tbl_general_users", "id=" . $record->user_id, 'last_name')?>
								<br>
								<?=$this->common_model->get_record("tbl_general_users", "id=" . $record->user_id, 'phone_number')?>
							</td>
							<td>
								<a target="_blank" href="<?=base_url()?><?=$this->common_model->get_record("tbl_product", "id=" . $record->product_id, 'slug')?>">
									<?=$this->common_model->get_record("tbl_product", "id=" . $record->product_id, 'name')?>
								</a>
							</td>
							<td><?php echo $record->comment ?></td>
							<td><?php echo $record->ratings ?> / 5</td>
							<td><?php echo date("h:i:sa d M, Y", strtotime($record->date_time)) ?></td>
							<td class="text-center">
								<form id="review_status_form_<?=$inc?>" class="update_data">
									<select class="form-control" name="review_status" onchange="$('#review_status_form_<?=$inc?>').submit();">
										<option <?=($record->review_status=="pending"?"selected":"")?> value="pending"> Inactive</option>
										<option <?=($record->review_status=="approved"?"selected":"")?> value="approved"> Active</option>
									</select>
									<input value="tbl_reviews" name="table_name" type="hidden">
									<input value="<?=$record->id?>" name="row_id" type="hidden">
								</form>
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