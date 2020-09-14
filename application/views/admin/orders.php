



<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">

	
		<table>
     <tr>

       <td>
          <input type='text'  name="date1" id='search_fromdate' class="datepicker" placeholder='From date'>
       </td>

     	<td>
     		<input type="text" name="date2" id="end_date" class="datepicker" placeholder='End date'/>
     	</td>
       <td>
          <input type='submit' id="_search" value="Search">
       </td>
     </tr>
     </table>
 

   
                  <table class="table table-hover data_table" id="tb">
					<thead>
						<tr>
							<th>Sl. No.</th>
<th>Order Date</th>							
<th>Order ID</th>
							<th>Product</th>
							<th>Total</th>
							<th class="text-center">Payment Status</th>
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
							<td>
							<?php
                                    $myvalue = $record->date_time;

                                 $datetime = new DateTime($myvalue);
 
                                     $date = $datetime->format('Y-m-d');
                                   $time = $datetime->format('H:i:s');
                                  ?>

                                    <td><?php echo $date;echo " ".$time?></td>
							
							</td>
							<td>
								<a class="btn btn-sm btn-primary" href="<?=base_url()?>admin/order-details/<?=$record->order_id?>">
									<?php echo $record->order_id ?>
								</a>
							</td>
							<td>
								<a href="<?=base_url()?><?=$record->slug?>" target="_blank">
									<?php echo $record->name ?>
								</a>
							</td>
							<td>₹<?php echo number_format($this->common_model->get_record('tbl_orders', "status = '0' and order_id='" . $record->order_id . "'", "total"), 2) ?></td>
							<td class="text-center">
								<?php if($this->common_model->get_record('tbl_orders', "status = '0' and order_id='" . $record->order_id . "'", "is_paid") == 1): ?>
									<span class="btn btn-sm btn-success">Paid</span>
								<?php else: ?>
									<span class="btn btn-sm btn-warning">Unpaid</span>
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
    </section>
</div>

<!-- jQuery UI CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>


$(document).ready(function(){

   // Datapicker 
   $( ".datepicker" ).datepicker({
      "dateFormat": "yy-mm-dd"
   });

 

  // Search button




  $('#btn_search').click(function(){
 // Read values
          var from_date = $('#search_fromdate').val();
          var to_date = $('#end_date').val();

          // Append to data
          data.searchByFromdate = from_date;
          data.searchByTodate = to_date;
 
$.ajax({
				type: 'POST',
				url: baseURL + "getproductlist",
				data: $(this).serialize(),
				dataType: "json",
				beforeSend: function() {
					$('#btn_search').attr('disabled', 'true');
				},
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						toastr.success('We have received your order!');
						
					}
					else
					{
						
					}
				}
			});

     dataTable.draw();
  });

});



$(document).ready(function() {
    $("#example1").dataTable().fnDestroy()
        $('#example1').DataTable( {
            dom: 'Bfrtip',
            rowGroup: {
           dataSrc: 1
        },
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
           
    
    } );
} );
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>


