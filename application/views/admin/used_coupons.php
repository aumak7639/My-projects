



<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
          <!--randomStringToInput(this)-->	
               
</div>

    	<table class="table table-hover data_table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Coupon Id</th>
							<th>Used Date</th>
							<th>User Name</th>
												
							
							
						
						</tr>
					</thead>
					<tbody>	
						
						 
								   <?php foreach($rows as $row): ?>
									
								<tr>
									<td><?php echo $row->id;?></td>
									<td>
<?php echo $row->Coupon_id ?>
									</td>
									<td><?php echo $row->Date;?></td>
									<td>
<?php echo $this->common_model->get_record('tbl_general_users', "id='" . $row->User_id . "'", "first_name") ?>
									</td>

									
									
				
								</tr>

					<?php endforeach; ?>
            </tbody>
   </table>
</div>
     <!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>

<!-- jQuery UI CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
   // Datapicker 
   $( ".datepicker" ).datepicker({
      "dateFormat": "yy-mm-dd"
   });

 
 $(document).ready(function(){
    $("#flat").change(function(){
        var isflat = $(this).children("option:selected").val();
        if(isflat==0){ 
			     $('#point').on('input', function () {
			    
			    var value = $(this).val();
			    
			    if ((value !== '') && (value.indexOf('.') === -1)) {
			        
			        $(this).val(Math.max(Math.min(value, 100), -90));
			    }
			});}
        
        
    });
});

  
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>


