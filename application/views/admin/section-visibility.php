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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Section</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Visiblity</a></li>

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
                                    <th data-field="builder" data-sortable="true">Section</th>

                                  
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


                                    <td><?php echo $record->bhk_no ?></td>



                                   




                                   
                                   <td>
                                        <a class="btn btn-sm btn-success activebtn"
                                            style="<?php if($record->status == 0){ echo 'display: none;'; } ?>" href="#"
                                            data-table="tbl_bhk" data-id="<?php echo $record->id; ?>"><i
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







          


        </div> <!-- container -->

    </div> <!-- content -->

</div>


<div class="rightbar-overlay"></div>

<!-- Vendor js -->

<script src="<?php echo base_url() ?>assets\admin\js\vendor.min.js"></script>


<!-- Bootstrap Tables js -->
<script src="<?php echo base_url() ?>assets\admin\libs\bootstrap-table\bootstrap-table.min.js"></script>

<!-- Init js -->
<script src="<?php echo base_url() ?>assets\admin\js\pages\bootstrap-tables.init.js"></script>

<!-- App js -->
<!-- <script src="<?php echo base_url() ?>assets\admin\js\app.min.js"></script> -->