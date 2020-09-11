<div class="content-wrapper">
    
    <section class="content">
		<div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <form role="form" action="<?php echo base_url() ?>admin/add_category_post" this_id="form-001" class="update_data" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Logo <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control required" name="value">
										<span class="text-danger error-span">This input is required.</span>
                                        <input type="hidden" value="top-header-logo" name="option_name">
                                        <input type="hidden" value="" name="value2">
                                        <input type="hidden" value="tbl_general_settings" name="table_name">
                                        <input type="hidden" value="1" name="row_id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="<?=base_url()?>uploads/common/<?=$logo->value?>" style="max-width: 100%;">
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
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>