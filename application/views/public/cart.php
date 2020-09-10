<?php include("header.php") ?>


        
        <!-- Page Header Section Start Here -->
        <section class="page-header bg_img padding-tb">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header-content-area">
                    <h4 class="ph-title"> Cart</h4>
                    <ul class="lab-ul">
                        <li><a href="index.php">Home</a></li>
                        <li><a class="active">Cart</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Page Header Section Ending Here -->
        
        
        <!-- Shop Cart Page Section start here -->                  
        <div class="shop-cart padding-tb pb-0">
            <div class="container">
                <div class="section-wrapper">
                    <div class="cart-top">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody class="cart_list">
                                <?php 
                                        $i=0;

                                        foreach($carts as $cart){
                                                $record=$this->frontend_model->get_records('tbl_product', "status=0 and id=$cart->product_id")[0];
                                        ?>
                                        
                                <tr class="cart_item_parent" pr-id="<?=$record->id?>">
                                    <td class="product-item">
                                        <div class="p-thumb">
                                            <a href="#"><img src="<?=base_url()?>uploads/common/<?=$record->product_image?>" alt="product"></a>
                                        </div>
                                        <div class="p-content">
                                            <a href="#"><?=$record->description?></a>
                                        </div>
                                    </td>
                                    <td class="product-price">
                                                    <span class="amount">
                                                        ₹<span id="price-<?=$record->id?>"><?=number_format($record->price,2)?></span>
                                                    </span>
                                                </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <form>
                                             <input type="button" class="minus update_cart_minus" value="-">
                                                            <!-- 
                                            <input type="button" class="update_cart_minus dec qtybutton" minus="-" value="-"> -->
                                            <input type="text"  size="4" class="cart-plus-minus-box input-text qty text" title="Qty" value="<?=$cart->product_quantity?>" name="update_cart_product_quantity" max="15" min="1" step="1" data-amount="price-<?=$record->id?>" data-total-amount="total-<?=$record->id?>">
                                                          
                                          <!--  <input type="button" class="update_cart_plus inc qtybutton" plus="+" value="+">

                                           -->
                                           <input type="button"   class="plus update_cart_plus" value="+">
                                                                   <input type="hidden" name="product_id" value="<?=$record->id?>">
                                                       
                                        </form>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                                    <span class="amount">
                                                        ₹<span id="total-<?=$record->id?>"><?=number_format(($cart->product_quantity * $record->price), 2)?></span>
                                                    </span>
                                                </td>
    
                                    <td>
                                        <a href="javascript:void(0)" class="remove cart_remove_btn"><img src="<?=base_url()?>assets/front/images/del.png" alt="product"></a>
                                    </td>
                                </tr>
                                <?php $i++;}?>
                                    
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-bottom">
                        <div class="cart-checkout-box">
                            <form action="#0" class="coupon">
                                <input type="text" name="coupon" placeholder="Coupon Code..." class="cart-page-input-text">
                                <input type="submit" value="Apply Coupon">
                            </form>

                            <form  class="cart-checkout">
                                <input type="submit" value="Update Cart" id="update_cart">
                                <input type="submit" value="Proceed to Checkout" id="proceed_to_checkout">
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Cart Page Section ending here -->

<?php include("footer.php") ?>
    


























