<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">City</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <form role="form" action="<?php echo base_url() ?>admin/add_category_post"
                                this_id="form-001" class="insert_data" method="post" role="form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city_name">City Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="city_name">
                                        <span class="text-danger error-span">This input is required.</span>

                                        <input type="hidden" value="tbl_city" name="table_name">
                                        <input type="hidden" value="" name="row_id">



                                    </div>




                                    <div class="form-group col-md-6">
                                        <label for="desktop_img_url">desktop_url</label>
                                        <input type="file" class="form-control" name="desktop_img_url">
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="mobile_img_url">mobile_url</label>
                                        <input type="file" class="form-control" name="mobile_img_url">

                                    </div>
                                </div>




                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>





            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">


                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                            data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                            data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="id" data-sortable="true" data-formatter="">ID</th>
                                    <th data-field="builder" data-sortable="true">City</th>

                                    <th data-field="img1" data-sortable="true">Desktop Image</th>
                                    <th data-field="img2" data-sortable="true">mobile Image</th>


                                    <th data-field="date" data-sortable="true">Created On</th>

                                    <th data-field="amount" data-align="center" data-sortable="true"
                                        data-sorter="priceSorter">Actions</th>
                                    <th data-field="status" data-align="center" data-sortable="true"
                                        data-formatter="statusFormatter">Status</th>

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


                                    <td><?php echo $record->city_name ?></td>



                                    <td><a target="_blank"
                                            href="<?=base_url()?>uploads/common/<?php echo $record->desktop_img_url ?>"><img
                                                width="50" height="50"
                                                src="<?=base_url()?>uploads/common/<?php echo $record->desktop_img_url ?>"></a>
                                    </td>
                                    <td><a target="_blank"
                                            href="<?=base_url()?>uploads/common/<?php echo $record->mobile_img_url ?>"><img
                                                width="50" height="50"
                                                src="<?=base_url()?>uploads/common/<?php echo $record->mobile_img_url ?>"></a>
                                    </td>
                                    <?php
                                    $myvalue = $record->date_time;

                                 $datetime = new DateTime($myvalue);
 
                                     $date = $datetime->format('Y-m-d');
                                   $time = $datetime->format('H:i:s');
                                  ?>

                                    <td><?php echo $date;echo " ".$time?></td>






                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if(0 == 1): ?>

                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                            onclick="$('#addSlider input[name=sub_category_id]').val('<?=$record->id?>')"><i
                                                class="fa fa-plus"></i></a>
                                        <?php endif; ?>

                                        <button type="button" class="btn btn-success waves-effect waves-light"
                                            data-toggle="modal" data-target="#con-close-modal" onclick="
								
									
								$('.update_data input[name=city_name]').val('<?=$record->city_name?>');
							

								$('.update_data .img-a').attr('href', '<?=base_url()?>uploads/common/<?=$record->desktop_img_url?>');
							$('.update_data .img1').attr('src', '<?=base_url()?>uploads/common/<?=$record->desktop_img_url?>');

							$('.update_data .img-b').attr('href', '<?=base_url()?>uploads/common/<?=$record->mobile_img_url?>');
							$('.update_data .img2').attr('src', '<?=base_url()?>uploads/common/<?=$record->mobile_img_url?>');
						
								
								$('.update_data input[name=row_id]').val('<?=$record->id?>');
								$('.update_data input[name=status]').val('<?=$record->status?>');
								$('.update_data input[name=desktop_img_url]').val('<?=$record->desktop_img_url?>');
								$('.update_data input[name=mobile_img_url]').val('<?=$record->mobile_img_url?>');
							
								"><i class="fe-edit"></i></button>




                                        <a class="btn btn-sm btn-danger deletecats <?= $record->id;?>" onclick="myFunction(this,<?= $record->id;?>,'tbl_city')"
                                            style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_city" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-times"></i></a>



                                                <script>
$('.deletecats').click(function(e){
		e.preventDefault();
		
		if(confirm("Press a button!") === true)
		{
			var table = $(this).attr('data-table');
			var row_id = $(this).attr('data-id');
			var tis = this;
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/deletecats",
				data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
				dataType: "json",
				success: function(response){
					if(response.result == 1)
					{
						toastr.success('Success!');
						$(tis).hide();
						$(tis).next('.activebtn').show();
						$(tis).parent().next('td').html("<span class='btn btn-sm btn-danger'>Inactive</span>");
					}
					else if(response.result == 2){
						toastr.success('something went wrong!');

					}
					
				}
			});
		}
	});
	
</script>


                                                

                                        <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_city" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-check"></i></a>
                                        <?php endif; ?>
                                    </td>


                                    



                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if($record->status == 0){ echo "<span class='badge label-table badge-success'>Active</span>"; }else{  echo "<span class='badge label-table badge-danger'>Inactive</span>"; } ?>
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
                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div>

        </div>
    </div> <!-- content -->

</div>







<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <form reload-action="true" this_id="form-002" class="update_data" method="post" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>


                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city_name">City Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" name="city_name">
                                <span class="text-danger error-span">This input is required.</span>


                                <input type="hidden" value="tbl_city" name="table_name">
                                <input type="hidden" value="" name="row_id">



                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Current desktop Image</label><br>
                                <a target="_blank" href="#" class="img-a"><img class="img1" width="50" height="50"
                                        src=""></a>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Current mobile Image</label><br>
                                <a target="_blank" href="#" class="img-b"><img class="img2" width="50" height="50"
                                        src=""></a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desktop_img_url">desktop_url</label>
                                <input type="file" class="form-control" name="desktop_img_url">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_url">mobile_url</label>
                                <input type="file" class="form-control" name="mobile_img_url">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>


                    <button type="submit" class="btn btn-info waves-effect waves-light">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>





