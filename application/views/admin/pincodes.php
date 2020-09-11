<div class="content-wrapper">
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
					<form class="from-new-pincodes" reload-action="true" this_id="form-9900<?=uniqid()?>">
						<label>Pincodes (seperated by comma)</label>
						<textarea name="pincodes" required class="form-control required" placeholder="Eg. 654321,543216,523641,856242,235610"></textarea>
						<button class="btn btn-primary">Submit</button>
					</form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table">
					<thead>
						<tr>
							<th>Sl. No.</th>
							<th>Pincode</th>
							<th>Date Time</th>
							<th></th>
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
							<td><?=$inc?></td>
							<td>
								<?=$record->pincode?>
							</td>
							<td>
								<?=date('h:i:sa d M, Y', strtotime($record->date_time))?>
							</td>
							<td class="text-center">
								<form class="update_data" reload-action="true" this_id="form-990<?=uniqid()?>">
									<input type="hidden" value="<?=$record->id?>" name="row_id">
									<input type="hidden" value="tbl_pincodes" name="table_name">
									<input type="hidden" value="1" name="status">
									<button class="btn btn-sm btn-danger">Delete</button>
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