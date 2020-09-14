<div class="content-page">
    <div class="content">

       
        <div class="container-fluid">

         
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Builder</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>
          

       
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <form role="form" action="<?php echo base_url() ?>admin/add_category_post"
                                this_id="form-001" class="insert_data" method="post" role="form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="builder_area">builder Area <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="builder_area">
                                        <span class="text-danger error-span">This input is required.</span>



                                        <input type="hidden" value="tbl_builder" name="table_name">
                                        <input type="hidden" value="" name="row_id">


                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="builder_name">builder Name</label>
                                        <input type="text" class="form-control required" name="builder_name">
                                        <span class="text-danger error-span">This input is required.</span>


                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="desktop_url">desktop_url</label>
                                        <input type="file" class="form-control" name="desktop_url">
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="mobile_url">mobile_url</label>
                                        <input type="file" class="form-control" name="mobile_url">

                                    </div>
                                </div>




                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

                            </form>

                        </div>
                    </div> 
                </div>
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
                                    <th data-field="builder" data-sortable="true">Builder Area</th>
                                    <th data-field="name" data-sortable="true">Builder Name</th>
                                    <th data-field="img1" data-sortable="true">Desktop Image</th>
                                    <th data-field="img2" data-sortable="true">mobile Image</th>


                                    <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Created On
                                    </th>

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


                                    <td><?php echo $record->builder_area ?></td>
                                    <td><?php echo $record->builder_name ?></td>


                                    <td><a target="_blank"
                                            href="<?=base_url()?>uploads/common/<?php echo $record->desktop_url ?>"><img
                                                width="50" height="50"
                                                src="<?=base_url()?>uploads/common/<?php echo $record->desktop_url ?>"></a>
                                    </td>
                                    <td><a target="_blank"
                                            href="<?=base_url()?>uploads/common/<?php echo $record->mobile_url ?>"><img
                                                width="50" height="50"
                                                src="<?=base_url()?>uploads/common/<?php echo $record->mobile_url ?>"></a>
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
								
									
								$('.update_data input[name=builder_area]').val('<?=$record->builder_area?>');
								$('.update_data input[name=builder_name]').val('<?=$record->builder_name?>');

								$('.update_data .img-a').attr('href', '<?=base_url()?>uploads/common/<?=$record->desktop_url?>');
							$('.update_data .img1').attr('src', '<?=base_url()?>uploads/common/<?=$record->desktop_url?>');

							$('.update_data .img-b').attr('href', '<?=base_url()?>uploads/common/<?=$record->mobile_url?>');
							$('.update_data .img2').attr('src', '<?=base_url()?>uploads/common/<?=$record->mobile_url?>');
						
								
								$('.update_data input[name=row_id]').val('<?=$record->id?>');
								$('.update_data input[name=status]').val('<?=$record->status?>');
								$('.update_data input[name=desktop_url]').val('<?=$record->desktop_url?>');
								$('.update_data input[name=mobile_url]').val('<?=$record->mobile_url?>');
							
								"><i class="fe-edit"></i></button>




                                        <a class="btn btn-danger deletecats"
                                            style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_builder" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-times"></i></a>

                                        <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_builder" data-id="<?php echo $record->id; ?>"><i
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
                                            <label for="builder_area">builder Area <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="builder_area">
                                            <span class="text-danger error-span">This input is required.</span>


                                            <input type="hidden" value="tbl_builder" name="table_name">
                                            <input type="hidden" value="" name="row_id">



                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="builder_name">builder Name</label>
                                            <input type="text" class="form-control" name="builder_name">
                                            <span class="text-danger error-span">This input is required.</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">Current desktop Image</label><br>
                                            <a target="_blank" href="#" class="img-a"><img class="img1" width="50"
                                                    height="50" src=""></a>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">Current mobile Image</label><br>
                                            <a target="_blank" href="#" class="img-b"><img class="img2" width="50"
                                                    height="50" src=""></a>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desktop_url">desktop_url</label>
                                            <input type="file" class="form-control" name="desktop_url">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile_url">mobile_url</label>
                                            <input type="file" class="form-control" name="mobile_url">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect"
                                    data-dismiss="modal">Close</button>


                                <button type="submit" class="btn btn-info waves-effect waves-light">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->





        </div> <!-- container -->

    </div> <!-- content -->

</div>


<div class="rightbar-overlay"></div>

<!-- Vendor js -->

