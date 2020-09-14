
<div class="content-wrapper">
    
    <section class="content">
		 


		
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table">
					<thead>
						<tr>
							

							<th>ID</th>
							<th>Title</th>
							
							<th>Description</th>
                            <th>background_color</th>
                            <th>Created On</th>
                            <th>Actions</th>
                            <th>Status</th>
							
							
							

						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($records))
						{
							$inc = 1;
							foreach($records as $record):
							
						?>
						<tr>

					
							<td><?php echo $inc; ?></td>
						
							
							 <td><?= $record->title ?></td>
							<td><?php echo $record->description ?></td> 
							<td><?php echo $record->background_color?></td> 

							<?php
                                    $myvalue = $record->date_time;

                                 $datetime = new DateTime($myvalue);
 
                                     $date = $datetime->format('Y-m-d');
                                   $time = $datetime->format('H:i:s');
                                  ?>

                                    <td><?php echo $date;echo " ".$time?></td>
                            
                            

							
							<td class="text-center">
								<?php if($record->id != 0): ?>
							
									<a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default" onclick="

									$('.update_data input[name=title]').val('<?=$record->title?>');
									$('.update_data input[name=row_id]').val('<?=$record->id?>');
									$('.update_data input[name=status]').val('<?=$record->status?>');
                                    $('.update_data input[name=description]').val(`<?=$record->description?>`);
                                    $('.update_data input[name=background_color]').val('<?=$record->background_color?>');
								
									"><i class="fa fa-pencil"></i></a>
									
									
									<a class="btn btn-sm btn-success activebtn" style="<?php if($record->status == 0){ echo 'display: none'; } ?>" href="#" data-table="tbl_free_evaluation_section" data-id="<?php echo $record->id; ?>"><i class="fa fa-check"></i></a>
								<?php endif; ?>
							</td>


					
						</tr>
						<?php
							$inc++;
							endforeach;
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
                                        <label for="title">Title<span class="text-danger">*</span></label>
										<input type="text" class="form-control required" name="title">
									  
										<span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" value="tbl_free_evaluation_section" name="table_name">
										<input type="hidden"  name="row_id">
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <input type="text" class="form-control" name="description" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="background_color">background color</label>
                                        <input type="text" class="form-control" name="background_color" >
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

	
	
	
	</div> 


	
	
	<div class="modal fade" id="addSlider">
	  <div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="#" this_id="form-003" class="insert_data" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Add Slider</h4>
				</div>
				<div class="modal-body">
					<div id="arr">
						<div class="well col-md-12">
							<div class="col-md-6">
								<div class="form-group">
									<label>Desktop</label>
									<input type="file" class="form-control required" name="image">
									<span class="text-danger error-span">This input is required.</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mobile</label>
									<input type="file" class="form-control required" name="image_1">
									<span class="text-danger error-span">This input is required.</span>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<input type="text" placeholder="Link *" class="form-control required" name="link">
										<span class="text-danger error-span">This input is required.</span>
										<input type="hidden" name="table_name" value="tbl_category_images">
										<input type="hidden" name="sub_category_id" value="0">
									</div>
								</div>
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
	
	<div class="modal fade" id="editSlider">
	  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Sliders</h4>
			</div>
			<div class="modal-body" id="arr1">
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-default pull-right" data-dismiss="modal" value="Close">
			</div>
		</div>
	  </div>
	</div>
	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>

<script>
	function get_records(table_name, where){
		$('#arr1').html("");
		var img;
		$.ajax({
			type: 'POST',
			url: baseURL + "admin/get_records",
			data: "table_name=" + table_name + "&where=" + where,
			dataType: "json",
			success: function(response){
				console.log(response);
				if(response.result == 1)
				{
					$.each(response.records, function(key, val){
						
						if(val.image !== "default-image.jpg")
						{
							img = val.image;
						}
						else
						{
							img = "";
						}
						$('#arr1').append('	<div class="well col-md-12">'+
												'<div class="col-md-2">'+
													'<a href="<?=base_url()?>uploads/category/' + val.image + '" target="_blank"><img width="50" height="50" src="<?=base_url()?>uploads/category/' + val.image + '"></a>'+
												'</div>'+
												'<div class="col-md-2">'+
													'<a href="<?=base_url()?>uploads/category/' + val.image_1 + '" target="_blank"><img width="50" height="50" src="<?=base_url()?>uploads/category/' + val.image_1 + '"></a>'+
												'</div>'+
												'<div class="col-md-6">'+
													'<input type="text" value="' + val.link + '" class="form-control">'+
												'</div>'+
												'<div class="col-md-2">'+
													'<span class="btn btn-sm btn-danger pull-right" onclick=deleteBtn("tbl_category_images","id=' + val.id + '",this,"uploads/category/' + img + '")><i class="fa fa-trash"></i></span>'+
												'</div>'+
											'</div>');
					});
				}
				else
				{
					toastr.error('Something went wrong! Please try again later!');
				}
			}
		});
	}
	
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