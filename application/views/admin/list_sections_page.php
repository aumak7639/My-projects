<div class="content-wrapper">
    
    <section class="content">
		<div class="row">
            <form role="form" action="#" this_id="form-001" class="insert_data" method="post" role="form">
				<div class="col-md-6">
					<div class="box box-primary">
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control required" name="name">
										<span class="text-danger error-span">This input is required.</span>
										<input type="hidden" value="tbl_sections" name="table_name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Admin File <span class="text-danger">*</span></label>
										<input type="text" class="form-control required" name="admin_file">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Front File <span class="text-danger">*</span></label>
										<input type="text" class="form-control required" name="front_file">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Section Image <span class="text-danger">*</span></label>
										<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" name="image">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Guide Image <span class="text-danger">*</span></label>
										<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" name="guide_image">
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" value="Submit">
						</div>
					</div>
				</div>
			</form>
        </div>  
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table">
					<thead>
						<tr>
							<th>Sl. No.</th>
							<th>Section Code</th>
							<th>Name</th>
							<th>Admin File</th>
							<th>Front File</th>
							<th>Section Image</th>
							<th>Guide Image</th>
							<th class="text-center">Actions</th>
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
						  <td><?php echo $record->section_code ?></td>
						  <td><?php echo $record->name ?></td>
						  <td><?php echo $record->admin_file ?></td>
						  <td><?php echo $record->front_file ?></td>
						  <td><a href="<?=base_url()?>uploads/sections/<?=$record->image?>" target="_blank"><img src="<?=base_url()?>uploads/sections/<?=$record->image?>" width="100" height="100"></a></td>
						  <td><a href="<?=base_url()?>uploads/sections/<?=$record->guide_image?>" target="_blank"><img src="<?=base_url()?>uploads/sections/<?=$record->guide_image?>" width="100" height="100"></a></td>
						  <td class="text-center">
							<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-default" onclick="
							$('.update_data #img-004').attr('src', '<?=base_url()?>uploads/sections/<?=$record->guide_image?>');
							$('.update_data #img-003').attr('href', '<?=base_url()?>uploads/sections/<?=$record->guide_image?>');
							$('.update_data #img-002').attr('src', '<?=base_url()?>uploads/sections/<?=$record->image?>');
							$('.update_data #img-001').attr('href', '<?=base_url()?>uploads/sections/<?=$record->image?>');
							$('.update_data input[name=admin_file]').val('<?=$record->admin_file?>');
							$('.update_data input[name=front_file]').val('<?=$record->front_file?>');
							$('.update_data input[name=name]').val('<?=$record->name?>');
							$('.update_data input[name=row_id]').val('<?=$record->id?>');
							"><i class="fa fa-pencil"></i></a>
							
							<a class="btn btn-sm btn-danger deletebtn" style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#" data-table="tbl_sections" data-id="<?php echo $record->id; ?>"><i class="fa fa-close"></i></a>
							
							<a class="btn btn-sm btn-success activebtn" style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#" data-table="tbl_sections" data-id="<?php echo $record->id; ?>"><i class="fa fa-check"></i></a>
							
						  </td>
						  <td class="text-center"><?php if($record->status == 0){ echo "<span class='btn btn-sm btn-success'>Active</span>"; }else{  echo "<span class='btn btn-sm btn-danger'>Inactive</span>"; } ?></td>
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

	<div class="modal fade" id="modal-default">
	  <div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="<?php echo base_url() ?>admin/add_category_post" this_id="form-002" class="update_data" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="slug">Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control required" name="name">
								<span class="text-danger error-span">This input is required.</span>
								<input type="hidden" value="tbl_sections" name="table_name">
								<input type="hidden" value="" name="row_id">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="slug">Admin File <span class="text-danger">*</span></label>
								<input type="text" class="form-control required" name="admin_file">
								<span class="text-danger error-span">This input is required.</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="slug">Front File <span class="text-danger">*</span></label>
								<input type="text" class="form-control required" name="front_file">
								<span class="text-danger error-span">This input is required.</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="slug">Section Image</label>
								<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" name="image">
								<span class="text-danger error-span">This input is required.</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="slug">Guide Image</label>
								<input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" name="guide_image">
								<span class="text-danger error-span">This input is required.</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<a href="#" id="img-001" target="_blank"><img src="#" id="img-002" class="w--100"></a>
						</div>
						<div class="col-md-6">
							<a href="#" id="img-003" target="_blank"><img src="#" id="img-004" class="w--100"></a>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
					<input type="submit" class="btn btn-primary" value="Save changes">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>
	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
