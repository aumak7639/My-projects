<?php 
	$order_id  = $order->order_id;
	$order_process = $this->frontend_model->get_records("tbl_order_process", "order_id = '$order_id'")[0]; 
	$order_item = $this->frontend_model->get_records("tbl_order_item", "order_id = '$order_id'")[0]; 
	$order_item_det = $this->frontend_model->get_records("tbl_product", "id = '" . $order_item->product_id . "'")[0]; 
	$order_address_shipping = $this->frontend_model->get_records("tbl_order_address", "option_name='shipping' and order_id = '" . $order->order_id . "'")[0]; 
	$order_address_billing = $this->frontend_model->get_records("tbl_order_address", "option_name='billing' and order_id = '" . $order->order_id . "'")[0];
?>
        <!-- Begin  Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Order Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Breadcrumb Area End Here -->
        <main class="page-content">
            <div class="account-page-area">
                <div class="container">
                    <div id="invoice">
					  <div class="toolbar hidden-print">
						 <div class="text-right">
							<a id="printInvoice" class="btn btn-info" href="#0" onclick='printDiv();'>
								<i class="fa fa-print"></i> Print
							</a>
						 </div>
						 <hr>
					  </div>
					  <div class="invoice overflow-auto" id="DivIdToPrint">
						 <div style="min-width: 600px">
							<header>
							   <div class="row">
								  <div class="col-lg-6 invoice-logo">
									<img src="<?=base_url()?>assets/front/images/logo.png" width="200">
								  </div>
								  <div class="col-lg-6 company-details">
									 <h3 class="invoice-id">
										Order ID <?php $order_id  = $order->order_id; ?> [<?=ucfirst($order_process->process)?>]
									</h3>
									 <div class="date">Date of Invoice: <?=date("M d, Y", strtotime($order->date))?></div>
								  </div>
							   </div>
							</header>
							<main>
							   <div class="row contacts">
								  <div class="col-lg-6 invoice-to">
									<h2 class="name">
										Furn2Fit
									 </h2>
									 <div>3584 Hickory Heights Drive ,Hanover MD 21076, USA</div>
									 <div>(123) 456-789</div>
									 <div>
										company@example.com
									 </div>
								  </div>
								  <div class="col-lg-3 invoice-details">
									<div class="text-gray-light">
										Billing Address
									</div>
									<h3 class="to"><?=ucfirst($order_address_billing->first_name)?> <?=ucfirst($order_address_billing->last_name)?></h3>
									<div class="address">
										<?=$order_address_billing->address1?>
										<br>
										<?=$order_address_billing->address2?>
										<br>
										City: <?=$order_address_billing->city?>
										<br>
										State: <?=$order_address_billing->state?>
										<br>
										Pincode: <?=$order_address_billing->pincode?>
										<br>
										Email: <?=$order_address_billing->email?>
										<br>
										Phone: <?=$order_address_billing->phone_number?>
									</div>
								  </div>
									<div class="col-lg-3 invoice-details">
										<div class="text-gray-light">
											Shipping Address:
										</div>
										<h3 class="to"><?=ucfirst($order_address_shipping->first_name)?> <?=ucfirst($order_address_shipping->last_name)?></h3>
										<div class="address">
											<?=$order_address_shipping->address1?>
											<br>
											<?=$order_address_shipping->address2?>
											<br>
											City: <?=$order_address_shipping->city?>
											<br>
											State: <?=$order_address_shipping->state?>
											<br>
											Pincode: <?=$order_address_shipping->pincode?>
											<br>
											Email: <?=$order_address_shipping->email?>
											<br>
											Phone: <?=$order_address_shipping->phone_number?>
										</div>
									</div>
													   </div>
							   <div class="table-responsive-sm">
								  <table class="table table-striped">
									 <thead>
										<tr>
																						
										   <th class="center">#</th>
										   <th>Product</th>
										   <th class="center">Quantity</th>
										   <th class="right">Total</th>
										</tr>
									 </thead>
									 <tbody>
										<tr>
											<td class="center">
												<a href="<?=base_url()?><?=$order_item_det->slug?>">
													<img src="<?=base_url()?>uploads/products/<?=$order_item_det->product_image?>" width="70"  alt="<?=base_url()?>uploads/products/<?=$order_item_det->product_image?>"/>
												</a>
											</td>
											<td class="left strong">
												<a href="<?=base_url()?><?=$order_item_det->slug?>">
													<?=$order_item_det->name?>
												</a>
											</td>
											<td class="center">
												<?=$order_item->quantity?>
											</td>
											<td class="right">
												₹<?=number_format($order_item->price, 2)?>
											</td>
										</tr>
									  </tbody>
								  </table>
							   </div>
							   <div class="row">
								  <div class="col-lg-8 col-sm-5">
								  </div>
								  <div class="col-lg-4 col-sm-5 ml-auto no-padding">
									 <table class="table table-clear">
										<tbody>
										   <tr>
											  <td class="text-left">
												 <strong>Subtotal</strong>
											  </td>
											  <td class="text-right">₹<?=number_format($order->sub_total, 2)?></td>
										   </tr>
										   <tr>
											  <td class="text-left">
												 <strong>GST</strong>
											  </td>
											  <td class="text-right">₹<?=number_format($order->gst, 2)?></td>
										   </tr>
										   <tr>
											  <td class="text-left">
												 <strong>Shipping Cost</strong>
											  </td>
											  <td class="text-right">₹<?=number_format($order->shipping, 2)?></td>
										   </tr>
										   <tr>
											  <td class="text-left">
												 <strong>Total</strong>
											  </td>
											  <td class="text-right">
												 <strong>₹<?=number_format($order->total, 2)?></strong>
											  </td>
										   </tr>
										</tbody>
									 </table>
								  </div>
							   </div>
							   <div class="thanks">Thank you!</div>
							   <div class="notices">
								  <div>Note:</div>
								  <div class="notice">Please read all terms and polices on www.furn2fit.com for returns, replacement and other issues.</div>
							   </div>
							</main>
							<footer>
							   Invoice was created on a computer and is valid without the signature and seal.
							</footer>
						 </div>
						 <div></div>
					  </div>
				   </div>
                </div>
            </div>
        </main>

<script>
	function printDiv() 
	{

	  var divToPrint=document.getElementById('DivIdToPrint');

	  var newWin=window.open('','Print-Window');

	  newWin.document.open();

	  newWin.document.write('<html><head>'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/vendor/bootstrap.min.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/vendor/font-awesome.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/vendor/fontawesome-stars.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/vendor/ion-fonts.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/plugins/slick.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/plugins/animate.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/plugins/jquery-ui.min.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/plugins/venobox.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/plugins/nice-select.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/plugins/timecircles.css">'+
		'<link rel="stylesheet" href="<?=base_url()?>assets/front/css/style.css">'+
		'<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"></head><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

	  newWin.document.close();

	}
</script>