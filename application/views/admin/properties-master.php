<div class="content-wrapper">
    
    <section class="content">
		<div class="row">
			<form role="form" action="<?php echo base_url() ?>admin/add_category_post" this_id="form-001" class="insert_data" method="post" role="form">
				<div class="col-md-8">
					<div class="box box-primary">
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">                                
									<div class="form-group">
										<label for="name">Title <span class="text-danger">*</span></label>
										<input type="text" class="form-control required" name="name">
										<span class="text-danger error-span">This input is required.</span>
										<input type="hidden" value="tbl_product_properties_master" name="table_name">
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<input type="submit" class="btn btn-primary pull-right" value="Submit" />
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
							<th>Title</th>
							<th class="text-center">Actions</th>
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
							<td><?php echo $record->title ?></td>
							<td class="text-center">
								<?php if($record->id != 0): ?>
									<?php if(0 == 1): ?>
									<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#editSlider" onclick="get_records('tbl_category_images', 'category_id=<?=$record->id?>')"><i class="fa fa-book"></i></a>
									
									<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider" onclick="$('#addSlider input[name=category_id]').val('<?=$record->id?>')"><i class="fa fa-plus"></i></a>
									<?php endif; ?>
									<a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default" onclick="
									$('.update_data input[name=title]').val('<?=$record->title?>');
									$('.update_data input[name=row_id]').val('<?=$record->id?>');
									"><i class="fa fa-pencil"></i></a>
									
									<a class="btn btn-sm btn-danger deletecats" style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#" data-table="tbl_product_properties_master" data-id="<?php echo $record->id; ?>"><i class="fa fa-close"></i></a>
									
									<a class="btn btn-sm btn-success activebtn" style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#" data-table="tbl_product_properties_master" data-id="<?php echo $record->id; ?>"><i class="fa fa-check"></i></a>
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

	<div class="modal fade" id="modal-default">
	  <div class="modal-dialog">
		<div class="modal-content">
			<form reload-action="true" this_id="form-002" class="update_data" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">                                
							<div class="form-group">
								<label for="name">Title <span class="text-danger">*</span></label>
								<input type="text" class="form-control required" name="title">
								<span class="text-danger error-span">This input is required.</span>
								<input type="hidden" value="tbl_product_properties_master" name="table_name">
								<input type="hidden" name="row_id">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
					<input type="submit" class="btn btn-primary" value="Save changes">
				</div>
			</form>
		</div>
	  </div>
	</div>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
	
	<script>
		function deleteBtn(table_name, where, tis,delete_image){
			if(confirm('Are you sure to delete this?') === true)
			{
				$.ajax({
					type: 'POST',
					url: baseURL + "admin/delete_data",
					data: "table_name=" + table_name + "&where=" + where + "&delete_image=" + delete_image,
					dataType: "json",
					success: function(response){
						console.log(response);
						if(response.result == 1)
						{
							toastr.success('Success!');
							$(tis).parents('.well').remove();
						}
						else
						{
							toastr.error('Something went wrong! Please try again later!');
						}
					}
				});
			}
		}
	</script>