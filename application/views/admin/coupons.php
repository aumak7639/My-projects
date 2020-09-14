



<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
          <!--randomStringToInput(this)-->	
                <form method="post" action="<?php echo base_url()?>admin/Common_controller/insert1">
 	 			
							  <div class="col-md-12">
					

							<input type='text'  name="expiry_date"  class="datepicker" placeholder='Expiry date'>
							</div>
							 
							  <div class="col-md-12">
					

						<select name="IsFlat" id="flat">
							  <option value="1">Flat</option>
							  <option value="0">Percentage</option>
							</select>
							</div>
							
							  <div class="col-md-12">
					

						<input type='number' id="point" name="point"  placeholder='Points'/>
							</div>
								  <div class="col-md-12">
					
						<input type="submit" name="submit" class="btn btn-sm btn-success">
				
                		</div>

						
     </form>       
</div>
    	<table class="table table-hover data_table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Coupon Number</th>
							<th>Generated Date</th>							
							<th>Expiry Date</th>
							<th>Points</th>
							<th>Is Flat</th>
							<th>Status</th>
							<th class="text-center"></th>
						</tr>
					</thead>
					<tbody>	
						
						<?php 
							if($fetch_data->num_rows()>0)
							{
								foreach ($fetch_data->result() as $row) {
							?>		
								<tr>
									<td><?php echo $row->Id;?></td>
									<td><?php echo $row->Coupon_number;?></td>
									<td><?php echo $row->Generated_date;?></td>
				
									<td><?php echo $row->Expiry_date;?></td>
									<td><?php if($row->IsFlat==1){echo "Flat";}else{echo "Percentage";}?></td>
									<td><?php echo $row->Point;?></td>
									<td><?php if($row->Status=="C"){echo "Created";}else if($row->Status=="D"){echo "Expired";}else{echo "Used";}?></td>
								
									<td><a name="Delete" class="btn btn-sm btn-danger" href="<?php echo base_url()?>admin/Common_controller/update1?Id=<?php echo $row->Id;?>">Delete</a></td>
								</tr>

							<?php	}
							}
							else{?>
								<tr><td>No data found</td></tr>
						<?php	}
						?>
						
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


