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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sub Category</a></li>

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

                                        <label for="property_subcategory">Property Sub-Category<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="property_subcategory">

                                        <!-- <span class="text-danger error-span">This input is required.</span> -->
                                        <input type="hidden" value="tbl_subcategory" name="table_name">
                                        <input type="hidden" value="" name="row_id">


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="property_type_id">Property Category</label>

                                            <?php $record_13=$this->common_model->get_records('tbl_category', "status = '0'");?>
                                            <select class="selectpicker w100 show-tick form-control required"
                                                name="property_category_id">
                                                <option value="">Property for</option>
                                                <?php foreach($record_13 as $record13):?>
                                                <option value="<?= $record13->id;?>" id="<?= $record13->id;?>">
                                                    <?= $record13->property_category;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
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
                                    <th  data-sortable="true">Property Category</th>
                                    <th data-field="builder" data-sortable="true">Property Sub-Category</th>





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


                                    <?php $record_13=$this->common_model->get_records('tbl_category', "status = '0' and id='$record->property_category_id'")[0];?>
                                        
                                    <td><?php echo $record_13->property_category; ?></td>
                                    <td><?php echo $record->property_subcategory ?></td>



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





                                    <td><?php echo $record->date_time ?></td>





                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if(0 == 1): ?>

                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                            onclick="$('#addSlider input[name=sub_category_id]').val('<?=$record->id?>')"><i
                                                class="fa fa-plus"></i></a>
                                        <?php endif; ?>

                                        <button type="button" class="btn btn-success waves-effect waves-light"
                                            data-toggle="modal" data-target="#con-close-modal" onclick="
								
									
                                $('.update_data input[name=property_subcategory]').val('<?=$record->property_subcategory?>');
                                $('.update_data select[name=  property_category_id').val('<?=$record->property_category_id?>');
                              

								$('.update_data .img-a').attr('href', '<?=base_url()?>uploads/common/<?=$record->desktop_img_url?>');
							$('.update_data .img1').attr('src', '<?=base_url()?>uploads/common/<?=$record->desktop_img_url?>');

							$('.update_data .img-b').attr('href', '<?=base_url()?>uploads/common/<?=$record->mobile_img_url?>');
							$('.update_data .img2').attr('src', '<?=base_url()?>uploads/common/<?=$record->mobile_img_url?>');
						
								
								$('.update_data input[name=row_id]').val('<?=$record->id?>');
								$('.update_data input[name=status]').val('<?=$record->status?>');
								$('.update_data input[name=desktop_img_url]').val('<?=$record->desktop_img_url?>');
								$('.update_data input[name=mobile_img_url]').val('<?=$record->mobile_img_url?>');
							
								"><i class="fe-edit"></i></button>




                                        <a class="btn btn-sm btn-danger deletecats <?= $record->id;?>" onclick="myFunction(this,<?= $record->id;?>,'tbl_subcategory')"
                                            style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_subcategory" data-id="<?php echo $record->id; ?>"><i
                                                class="fa fa-times"></i></a>

                                        <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_subcategory" data-id="<?php echo $record->id; ?>"><i
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
                                            <label for="property_subcategory">Property Sub-Category<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control required"
                                                name="property_subcategory">

                                            <span class="text-danger error-span">This input is required.</span>
                                            <input type="hidden" value="tbl_subcategory" name="table_name">
                                            <input type="hidden" value="" name="row_id">




                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="property_category_id">Property Category</label>

                                            <?php $record_13=$this->common_model->get_records('tbl_category', "status = '0'");?>
                                            <select class="selectpicker w100 show-tick form-control required"
                                                name="property_category_id">
                                                <option value="">Property for</option>
                                                <?php foreach($record_13 as $record13):?>
                                                <option value="<?= $record13->id;?>" id="<?= $record13->id;?>">
                                                    <?= $record13->property_category;?></option>
                                                <?php endforeach;?>
                                            </select>
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

