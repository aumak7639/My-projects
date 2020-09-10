<?php include("header.php"); ?>

			
        <div class="order-details">
			<div class="container">
			   <div id="invoice">
				  <div class="toolbar hidden-print d-flex">
					<div class="text-left w-50">
						<a href="my-account.php" id="printInvoice" class="btn btn-info" href="#0">
							Back
						</a>
					 </div>
					 <div class="text-right w-50">
						<a id="printInvoice" class="btn btn-info" href="#0">
							<i class="fa fa-print"></i> Print
						</a>
					 </div>
					 <hr>
				  </div>
				  <div class="invoice overflow-auto">
					 <div style="min-width: 600px">
						<header>
						   <div class="row">
							  <div class="col-lg-6 invoice-logo">
								<img src="assets/images/logo.jpg" data-holder-rendered="true">
							  </div>
							  <div class="col-lg-6 company-details">
								 <h4 class="name">
									Company Name
								 </h4>
								 <div>3584 Hickory Heights Drive ,Hanover MD 21076, USA</div>
								 <div>(123) 456-789</div>
								 <div>
									company@example.com
								 </div>
							  </div>
						   </div>
						</header>
						<main>
						   <div class="row contacts">
							  <div class="col-lg-6 invoice-to">
								 <h6 class="invoice-id">Order ID #4Uje1595087654 [pending]</h6>
								 <div class="date">Date of Invoice: 18-Jul-2020</div>
							  </div>
							  <div class="col-lg-3 invoice-details">
								<div class="text-gray-light">
									Billing Address
								</div>
								<h6 class="to">Suresh Kumar</h6>
								<div class="address">
									Email: rkutti24@gmail.com<br>
									Phone: 9600103904<br>
									Address: Chennai<br>
									Chennai-600042<br>
									Argentina
								</div>
							  </div>
														<div class="col-lg-3 invoice-details">
									<div class="text-gray-light">
										Shipping Address:
									</div>
									<h6 class="to">Suresh Kumar</h6>
									<div class="address">
										Email: rkutti24@gmail.com<br>
										Phone: 9600103904<br>
										Address: Chennai<br>
										Chennai-600042<br>
										Argentina
									</div>
								</div>
												   </div>
						   <div class="table-responsive-sm">
							  <table class="table table-striped">
								 <thead>
									<tr>
																					
									   <th class="center">#</th>
									   <th>Product Title</th>
									   <th>Size</th>
									   <th>Color</th>
									   <th class="right">Product Price</th>
									   <th class="center">Quantity</th>
									   <th class="right">Total</th>
									</tr>
								 </thead>
								 <tbody>
																																		<tr>
											<td class="center">1</td>
											<td class="left strong">Eva H Ring</td>
											
											<td class="left strong">M</td>
											<td class="right">
												<span style="width: 40px; height: 20px; display: block; border: 10px solid #ff0000;"></span>
											</td>
											<td class="center">₹2500</td>
											<td class="left strong">1 </td>
											<td class="right">₹2500</td>
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
										  <td class="text-right">₹2,500.00</td>
									   </tr>
									   <tr>
										  <td class="left">
											 <strong>Coupon Discount</strong>
										  </td>
										  <td class="text-right">₹0.00</td>
									   </tr>
									   <tr>
										  <td class="text-left">
											 <strong>TAX (18%)</strong>
										  </td>
										  <td class="text-right">₹450.00</td>
									   </tr>
									   <tr>
										  <td class="text-left">
											 <strong>Shipping Cost</strong>
										  </td>
										  <td class="text-right">₹356.00</td>
									   </tr>
									   <tr>
										  <td class="text-left">
											 <strong>Total</strong>
										  </td>
										  <td class="text-right">
											 <strong>₹3,014.00</strong>
										  </td>
									   </tr>
									</tbody>
								 </table>
							  </div>
						   </div>
						   <div class="thanks">Thank you!</div>
						   <div class="notices">
							  <div>Note:</div>
							  <div class="notice">Please read all terms and polices on www.adamsjewellery.in for returns, replacement and other issues.</div>
						   </div>
						</main>
						<footer>
						   Invoice was created on a computer and is valid without the signature and seal.
						</footer>
					 </div>
					 <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
					 <div></div>
				  </div>
			   </div>
			</div>
        </div>
        

<?php include("footer.php"); ?>

