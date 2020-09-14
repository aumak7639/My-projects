<div class="content-page">
    <div class="content">


        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>

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
                                this_id="form-001" class="update_tags" method="post" role="form">

                                <h3><?=$records->tags?></h3>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tags">Tags <span
                                                class="text-danger">*</span></label>
                                         <select  id="select_tags<?=$record->id?>"  class="form-control"  multiple>
    <?php $re=$this->common_model->get_records('tbl_tags', "status = '0'");?>
                                       
                                       <?php foreach($re as $r){?>
                                       <option value="<?=$r->tags?>"><?=$r->tags;?></option>
                                       <?php }?>
                                       
                                   </select>

                                   <input type="hidden" name="table_name" value="tbl_property_details">
                                   <input type="hidden" name="row_id" value="<?=$records->id?>">




                                    </div>
                                  




                               

                                   
                                </div>




                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

                            </form>

                        </div>
                    </div>
                </div>
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


                            <div class="card-box p-4">
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tags">Tags <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="tags">

                                        <span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" value="tbl_tags" name="table_name">
                                        <input type="hidden" value="" name="row_id">



                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="slug">Sulg <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control required" name="slugs">


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

<script>




$('.removeData').click(function(e){
e.preventDefault();

if(confirm("Press a button!") === true)
{
var table = $(this).attr('data-table');
var row_id = $(this).attr('data-id');
var tis = this;
$.ajax({
type: 'POST',
url: baseURL + "admin/removeData",
data: 'table_name=' + table + '&row_id=' + row_id + '&status=1',
dataType: "json",
success: function(response){
if(response.result == 1)
{
toastr.success('Success!');
$(tis).hide();
$(tis).next('.activebtn').show();
$(tis).parent().next('td').html("<span class='badge label-table badge-danger'>Inactive</span>");
}
else if(response.result == 2){
toastr.success('something went wrong!');

}

}
});
}
});

// </script>








