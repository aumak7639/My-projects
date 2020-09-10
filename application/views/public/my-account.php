


        
        <!-- Page Header Section Start Here -->
        <section class="page-header bg_img padding-tb">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header-content-area">
                    <h4 class="ph-title">My Account</h4>
                    <ul class="lab-ul">
                        <li><a href="index.php">Home</a></li>
                        <li><a class="active">My Account</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Page Header Section Ending Here -->
		
		
        <!-- Shop Cart Page Section start here -->		            
	    <div class="shop-cart padding-tb ">
            <div class="container">
				<div class="row">
					
					<!-- Begin Umino's Account Page Area -->
            <div class="account-page-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-whishlist" role="tab" aria-controls="account-wishlist" aria-selected="false">Wish List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-myreviews" role="tab" aria-controls="account-reviews" aria-selected="false">My Reviews</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="<?=base_url()?>logout" role="tab" aria-selected="false">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">

                                    <?php $id=$_SESSION['login_id'];?>
	    
	                            <?php $record=$this->frontend_model->get_records('tbl_general_users', "status = '0' and id='$id'")[0]; ?>

                                        <p>Hello <b><?= $record->first_name;?> <?=$record->last_name; ?></b> (not <?= $record->first_name; ?>? <a href="login-register.html">Sign
                                                out</a>)</p>
                                        <p>From your account dashboard you can view your recent orders, manage your shipping and
                                            billing addresses and <a href="javascript:void(0)">edit your password and account details</a>.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>ORDER</th>
                                                        <th>DATE</th>
                                                        
                                                        <th>TOTAL</th>
                                                       
                                                    </tr>
                                                    <?php
                                                    $id=$_SESSION['login_id'];
                                                    $ordersvar = $this->frontend_model->get_records('tbl_orders', "is_paid='1' and status='0' and user_id='$id' order by date_time asc");
                                                    foreach($ordersvar as $order): 
                                                    $items = $this->frontend_model->get_records('tbl_order_item' ,"status='0' and order_id= '$order->order_id' and user_id= '$id' order by date_time asc ");                                                                          
                                                    ?>
                                                      
                                                     <?php if(!empty($items)): ?>
                                                        <?php foreach($items as $item):?>
                                                  
                                                    
                                                    <tr>
                                                        <td><?= $item->order_id; ?></td>
                                                        <?php
                                                            $myvalue = $item->date_time;
                                                            $datetime = new DateTime($myvalue);
                                                            $date = $datetime->format('Y-m-d');
                                                        ?>
                                                        
                                                        
                                                        <td><?= $date; ?></td>
                                                        
                                                        <td>₹<?= $item->price;?> for <?= $item->quantity;?> item(s)</td>
                                                        
                                                       
                                                    </tr>
                                                    <?php endforeach;?>
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="account-whishlist" role="tabpanel" aria-labelledby="account-orders-tab">
                                    <div class="myaccount-wishlist">
                                        <h4 class="small-title">My Wish list</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                            
                                                <tbody>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>NAME</th>
                                                        <th>PRICE</th>
                                                        <th>DESCRIPTION</th>
                                                        <th>DATE</th>
                                                    
                                                        
                                                    </tr>
                                                    <?php
                                                   $id=$_SESSION['login_id'];
                                                    
                                                    $items = $this->frontend_model->get_records('tbl_user_wishlist', "  status='0' and user_id='$id' order by date_time asc");
                                                    // foreach($var)
                                                       $i=1;                                                                      
                                                    ?>

                                                    <?php foreach($items as $item)
                                                    { 
                                                       
                                                        $var = $this->frontend_model->get_records('tbl_product' ,"status='0' and id= '$item->item_id'  order by date_time asc ")[0];?>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $var->name; ?></td>
                                                        <td>₹<?= $var->price ?> </td>
                                                        <td> <?=$var->short_description ?> </td>
                                                        
                                                        <?php
                                                            $myvalue = $item->date_time;
                                                            $datetime = new DateTime($myvalue);
                                                            $date = $datetime->format('Y-m-d');
                                                        ?>
                                                        
                                                        
                                                        <td><?= $date; ?></td>
                                                      
                                                       
                                                    </tr>
                                                    <?php
                                                   $i++; }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-myreviews" role="tabpanel" aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">My Reviews</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>PRODUCT NAME</th>
                                                        <th>EMAIL</th>
                                                        <th>RATING</th>
                                                        <th>COMMENT</th>
                                                        <th>DATE</th>
                
                                                       

                                                    </tr>
                                                    <?php
                                                   $id=$_SESSION['login_id'];
                                                    
                                                    $items = $this->frontend_model->get_records('tbl_reviews', "  status='0' and user_id='$id' order by date_time asc");
                                                    // foreach($var)
                                                       $i=1;                                                                      
                                                    ?>

                                                    <?php foreach($items as $item)
                                                    { 
                                                       
                                                        $var = $this->frontend_model->get_records('tbl_product' ,"status='0' and id= '$item->product_id'  order by date_time asc ")[0];?>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $var->name; ?></td>
                                                        <td><?= $item->email ?> </td>
                                                        <td> <?=$item->ratings ?> </td>
                                                        <td> <?=$item->comment ?> </td>
                                                        
                                                        <?php
                                                            $myvalue = $item->date_time;
                                                            $datetime = new DateTime($myvalue);
                                                            $date = $datetime->format('Y-m-d');
                                                        ?>
                                                        
                                                        
                                                        <td><?= $date; ?></td>
                                                      
                                                       
                                                    </tr>
                                                    <?php
                                                   $i++; }
                                                    ?>
                                                    <!-- <tr>
                                                        <td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
                                                        <td>Mar 27, 2020</td>
                                                        <td>On Hold</td>
                                                        <td>₹162.00 for 2 items</td>
                                                        <td><a href="order-invoice.php" class="umino-btn umino-btn_dark umino-btn_sm"><span><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                                                        </td>
                                                    </tr> -->
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
                                        <p>The following addresses will be used on the checkout page by default.</p>
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="small-title">BILLING ADDRESS</h5>
                                                <address>
                                                    1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                                </address>
                                            </div>
                                            <div class="col">
                                                <h5 class="small-title">SHIPPING ADDRESS</h5>
                                                <address>
                                                    1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form action="#" class="umino-form">
                                            <div class="umino-form-inner">
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-firstname">First Name*</label>
                                                    <input type="text" id="account-details-firstname">
                                                </div>
                                                <div class="single-input single-input-half">
                                                    <label for="account-details-lastname">Last Name*</label>
                                                    <input type="text" id="account-details-lastname">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-email">Email*</label>
                                                    <input type="email" id="account-details-email">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-oldpass">Current Password(leave blank to leave
                                                        unchanged)</label>
                                                    <input type="password" id="account-details-oldpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-newpass">New Password (leave blank to leave
                                                        unchanged)</label>
                                                    <input type="password" id="account-details-newpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-confpass">Confirm New Password</label>
                                                    <input type="password" id="account-details-confpass">
                                                </div>
                                                <div class="single-input">
                                                    <button class="umino-btn umino-btn_dark" type="submit"><span>SAVE
                                                    CHANGES</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


				</div>
			</div>
		</div>
        <!-- Shop Cart Page Section ending here -->
	
