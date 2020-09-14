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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
          <!--  <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <form role="form" action="<?php echo base_url() ?>admin/add_category_post"
                                this_id="form-001" class="insert_data" method="post" role="form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bhk_no">BHK<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="bhk_no">
                                        <span class="text-danger error-span">This input is required.</span>

                                        <input type="hidden" value="tbl_bhk" name="table_name">
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

                        </div> 
                    </div> 
                </div> 
            </div>-->





            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">


                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                            data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                            data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="id" data-sortable="true" data-formatter="">ID</th>
                                    <th data-field="builder" data-sortable="true">Builder Name</th>
                                    

                                    <th data-field="mobile" data-sortable="true">Mobile</th>
                                    <th data-field="Email ID" data-sortable="true">Email ID</th>                                                                      
                                  <th data-field="img1" data-sortable="true">Properties</th>
                                   <th data-field="img2" data-sortable="true">Enquiries</th>


                                    <th data-field="date" data-sortable="true">Created On</th>

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


                                    <td><?php echo $record->first_name ?></td>

                                    <td><?php echo $record->mobile?></td>
                                    <td><?php echo $record->email?></td>
                                   <?php $properties=$this->common_model->get_records('tbl_property_details', "status='0' and builders_info_id='$record->id'");
                                   $rec=$properties[0]->id;
                                   ?>
                                    <td><a href="<?=base_url()?>admin/builder-properties/<?=$record->id?>"><?php echo count($properties)?></a></td>
                                    <?php foreach($properties as $property):?>
                                    <?php $viewed=$this->common_model->get_custom_query("select COUNT(id) as count from tbl_enquiry where status='0' and item_id='$property->id'");
                                        $count+=$viewed[0]->count;
                                        ?>
                                    <?php endforeach;?> 
                                    <td><a href="<?=base_url()?>admin/enquiry-list/<?=$record->id?>"><?php echo $count?></a></td>




                                    <?php
                                    $myvalue = $record->date_time;

                                 $datetime = new DateTime($myvalue);
 
                                     $date = $datetime->format('Y-m-d');
                                   $time = $datetime->format('H:i:s');
                                  ?>

                                    <td><?php echo $date;echo " ".$time?></td>



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
                                            <label for="bhk_no">BHK<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="bhk_no">
                                            <span class="text-danger error-span">This input is required.</span>


                                            <input type="hidden" value="tbl_bhk" name="table_name">
                                            <input type="hidden" value="" name="row_id">



                                        </div>
                                    </div>
                                </div>
                                <div class="row">


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

