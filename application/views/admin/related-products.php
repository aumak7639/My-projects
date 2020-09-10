<div class="content-wrapper">
    
    <section class="content">
        
		<div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <form role="form" this_id="form-001" class="related-products" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                           	<div class="col-md-6">
									<div class="form-group">
										<label for="slug">Product<span class="text-danger">*</span></label>
										<select class="form-control required" onchange="if($(this).val() == 'standard'){$('#content').show();}else{$('#content').hide();}" name="product">
                                            <?php foreach($records as $record):?>
											<option value="<?=$record->id?>"><?=$record->name?></option>
                                            <?php endforeach;?>
											</select>
										<span class="text-danger error-span">This input is required.</span>
									</div>
								</div>
                            </div>
                              <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Related Product<span class="text-danger">*</span></label>
                                        <select class="form-control required" name="related_products[]" multiple="multiple">
                                             <?php foreach($records as $record):?>
                                            <option value="<?=$record->id?>"><?=$record->name?></option>
                                            <?php endforeach;?>
                                            </select>
                                        <span class="text-danger error-span">This input is required.</span>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/dist/js/ckeditor.js" charset="utf-8"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

$('.related-products').submit(function(e){
        e.preventDefault();
        var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
        
            $.ajax({
                type: 'POST',
                url: baseURL + "admin/related-products-update",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response){
                    if(response.result == 1)
                    {
                        toastr.success('Success!');
                    }
                    else
                    {
                        toastr.error('Something went wrong! Please try again later!');
                    }
                }
            });
        
    });
    

</script>