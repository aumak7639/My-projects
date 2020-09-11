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
							<th>Image</th>
							<th>Name</th>
							<th>Date</th>
							<th></th>
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
								<a href="<?=base_url()?>uploads/common/<?=$record->image?>" target="_blank">
									<img src="<?=base_url()?>uploads/common/<?=$record->image?>" width="100">
								</a>
							</td>
							<td>
								<a href="<?=base_url()?>blog/<?=$record->id?>/<?=$tis->slugify($record->title)?>" target="_blank">
									<?=$record->title?>
								</a>
							</td>
							<td>
								<?=$record->date?>
							</td>
							<td class="text-center">
								<a href="<?=base_url()?>admin/edit-blog/<?=$record->id?>" class="btn btn-sm btn-warning">Edit</a>
							</td>
							<td class="text-center">
								<form class="update_data" reload-action="true" this_id="form-990<?=uniqid()?>">
									<input type="hidden" value="<?=$record->id?>" name="row_id">
									<input type="hidden" value="tbl_blogs" name="table_name">
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