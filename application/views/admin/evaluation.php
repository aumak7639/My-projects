<div class="content-page">
    <div class="content">  

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> New Section</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> Free Evaluation</a></li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- <div class="row">

                <div class="col-md-8">


                    <div class="card-box">
                        <form role="form" action="<?php echo base_url() ?>admin/add_category_post" this_id="form-001"
                            class="insert_data" method="post" role="form">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control required" name="title">

                                            <span class="text-danger error-span">This input is required.</span>
                                            <input type="hidden" value="tbl_free_evaluation_section" name="table_name">
                                            <input type="hidden" value="" name="row_id">

                                            <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>"
                                                name="date_time">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control" name="description">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="background_color">Background color</label>
                                            <input type="text" class="form-control" name="background_color">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="button_background">Button Background</label>
                                            <input type="text" class="form-control" name="button_background">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="font_color">Font color</label>
                                            <input type="text" class="form-control" name="font_color">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text_name">Text name</label>
                                            <input type="text" class="form-control" name="text_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link">Link</label>
                                            <input type="text" class="form-control" name="link">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
 --> 


            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                     

                        <table data-toggle="table" data-search="true" data-show-refresh="true" data-sort-name="id"
                            data-page-list="[5, 10, 20]" data-page-size="5" data-pagination="true"
                            data-show-pagination-switch="true" class="table-borderless">
                            <thead class="thead-light">

                                <tr>


                                    <th data-field="number" data-sortable="true">SI.no</th>
                                    <th data-field="name" data-sortable="true">name</th>
                                    <input type="hidden" value="tbl_evaluation" name="table_name">
                                    <th data-field="company" data-sortable="true">Company</th>
                                    <th data-field="email" data-sortable="true">E-mail</th>
                                    <th data-field="phone" data-sortable="true">Phone</th>
                                    <th data-field="mobile" data-sortable="true">Mobile</th>
                                    <th data-field="address" data-sortable="true">Address</th>
                                    <th data-field="location" data-sortable="true">Location</th>
                                     <th data-field="city" data-sortable="true">City</th>
                                    <th data-field="pincode" data-sortable="true">  Pincode</th>
                                    <th data-field="nearestbranch" data-sortable="true">Nearest Branch </th>
                                     
                                    <th data-field="additionalinfo" data-sortable="true">   Additional Info</th>
                                     


 

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


                                    <td><?php echo $record->name ?></td>
                                    <td><?php echo $record->company ?></td>
                                    <td><?php echo $record->email ?></td>
                                    <td><?php echo $record->phone ?></td>
                                    <td><?php echo $record->mobile ?></td>
                                    <td><?php echo $record->address ?></td>
                                    <td><?php echo $record->location ?></td>
                                    <td><?php echo $record->city ?></td>
                                    <td><?php echo $record->pincode ?></td>
                                    <td><?php echo $record->nearestbranch ?></td>
                                    
                                     



                                    <td class="text-center">
                                        <?php if($record->id != 0): ?>
                                        <?php if(0 == 1): ?>
                                        <!-- <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#editSlider" onclick="get_records('tbl_category_images', 'sub_category_id=?=$record->id?>')"><i class="fa fa-book"></i></a>
									 -->
                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#addSlider"
                                            onclick="$('#addSlider input[name=sub_category_id]').val('<?=$record->id?>')"><i
                                                class="fa fa-plus"></i></a>
                                        <?php endif; ?>
                                         

                                          

                                        <a class="btn btn-sm btn-danger deletecats"
                                        style="<?php if($record->status == 1){ echo 'display: none;'; } ?>" href="#"
                                        data-table="tbl_our_partners" data-id="<?php echo $record->id; ?>"><i
                                            class="fa fa-times"></i></a>
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

                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
        </div>
    </div>
</div>






<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form reload-action="true" this_id="form-002" class="update_data" method="post" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" name="title">

                                <span class="text-danger error-span">This input is required.</span>
                                <input type="hidden" value="tbl_evaluation" name="table_name">
                                <input type="hidden" value="" name="row_id">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" name="company">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="button_background">Button Background </label>
                                <input type="text" class="form-control" name="button_background">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="font_color">Font color</label>
                                <input type="text" class="form-control" name="font_color">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text_name">Text name</label>
                                <input type="text" class="form-control" name="text_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link">
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
            <form role="form" action="#" this_id="form-003" class="insert_admin" method="post" role="form">
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
                                    <label>Name</label>
                                    <input type="file" class="form-control required" name="text">
                                    <span class="text-danger error-span">This input is required.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="file" class="form-control required" name="text">
                                    <span class="text-danger error-span">This input is required.</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Link *" class="form-control required"
                                            name="link">
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


<script>
function get_records(table_name, where) {
    $('#arr1').html("");
    var img;
    $.ajax({
        type: 'POST',
        url: baseURL + "admin/get_records",
        data: "table_name=" + table_name + "&where=" + where,
        dataType: "json",
        success: function(response) {
            console.log(response);
            if (response.result == 1) {
                $.each(response.records, function(key, val) {

                    if (val.image !== "default-image.jpg") {
                        img = val.image;
                    } else {
                        img = "";
                    }
                    $('#arr1').append('	<div class="well col-md-12">' +
                        '<div class="col-md-2">' +
                        '<a href="<?=base_url()?>uploads/category/' + val.image +
                        '" target="_blank"><img width="50" height="50" src="<?=base_url()?>uploads/category/' +
                        val.image + '"></a>' +
                        '</div>' +
                        '<div class="col-md-2">' +
                        '<a href="<?=base_url()?>uploads/category/' + val.image_1 +
                        '" target="_blank"><img width="50" height="50" src="<?=base_url()?>uploads/category/' +
                        val.image_1 + '"></a>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<input type="text" value="' + val.link + '" class="form-control">' +
                        '</div>' +
                        '<div class="col-md-2">' +
                        '<span class="btn btn-sm btn-danger pull-right" onclick=deleteBtn("tbl_category_images","id=' +
                        val.id + '",this,"uploads/category/' + img +
                        '")><i class="fa fa-trash"></i></span>' +
                        '</div>' +
                        '</div>');
                });
            } else {
                toastr.error('Something went wrong! Please try again later!');
            }
        }
    });
}

function deleteBtn(table_name, where, tis, delete_image) {
    if (confirm('Are you sure to delete this?') === true) {
        $.ajax({
            type: 'POST',
            url: baseURL + "admin/delete_data",
            data: "table_name=" + table_name + "&where=" + where + "&delete_image=" + delete_image,
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.result == 1) {
                    toastr.success('Success!');
                    $(tis).parents('.well').remove();
                } else {
                    toastr.error('Something went wrong! Please try again later!');
                }
            }
        });
    }
}
</script>

