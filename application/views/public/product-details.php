<!--Page Header Section Start Here -->
<section class="page-header bg_img padding-tb">
    <div class="overlay"></div>
    <div class="container">
        <div class="page-header-content-area">
            <h4 class="ph-title"> Products Details</h4>
            <ul class="lab-ul">
                <li><a href="index.php">Home</a></li>
                <li><a class="active">Products Details</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- Page Header Section Ending Here -->

<!-- Shop Page Section start here -->
<section class="shop-single padding-tb pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12 sticky-widget">
                <div class="product-details">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <div class="product-thumb">
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="shop-item">
                                                <div class="shop-thumb">
                                                    <img src="<?=base_url()?>uploads/common/<?=$record->product_image?>"
                                                        alt="shop-single">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img src="<?=base_url()?>assets/front/images/product/single/top/01.png" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div> -->
                                    </div>
                                    <div class="shop-navigation d-flex flex-wrap">
                                        <div class="shop-nav shop-slider-prev"><i class="icofont-simple-left"></i></div>
                                        <div class="shop-nav shop-slider-next"><i class="icofont-simple-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="swiper-container gallery-thumbs">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="shop-item">
                                                        <div class="shop-thumb">
                                                            <img src="<?=base_url()?>assets/front/images/product/01.jpg" alt="shop-single">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="post-content">
                                <h4><?= $record->name;?></h4>
                                <?php 
                                $countavg=0;
                                foreach($reviews as $review){
                                        $countavg+=$review->ratings;
                                        $avg=$countavg/$rcount;
                                     }?>
                                <p class="rating">
                                     <?php for($i=0;$i<$avg;$i++){?>
                                            <i class="far fa-star"></i>
                                    <?php }?>
                                </p>
                                <h4>
                                    ₹ <?=$record->price;?>
                                </h4>
                                <p>
                                    <?= $record->short_description; ?>
                                </p>
                                <form>
                                    <div class="select-product unit">
                                        <select id="weight" onchange="weight()">

                                            <option>Select Units</option>
                                            <option value="500 gms">500 gms</option>
                                            <option value="1 kg">1 kg</option>
                                            <option>2 kg</option>
                                            <option>3 kg</option>
                                            <option>4 kg</option>
                                            <option>>5 kg</option>


                                        </select>
                                        <i class="fas fa-angle-down"></i>
                                    </div>

                                    <!-- <div >
                                                <div class="dec qtybutton">-</div> -->
                                    <!-- <input type="text"  size="4" class="cart-plus-minus-box input-text qty text" title="Qty"  value="<?=$cart->product_quantity?>" name="update_cart_product_quantity" max="15" min="1" step="1" data-amount="price-<?=$record->id?>" data-total-amount="total-<?=$record->id?>">
                                                <div class="inc qtybutton">+</div>
                                                <input type="hidden" name="product_id" value="<?=$record->id?>">
                                                </form>
                                            </div>  -->
                                </form>
                                <div>
                                    <form>
                                        <input type="number" size="4" class="cart-plus-minus-box input-text qty text"
                                            title="Qty" value="1" name="update_cart_product_quantity" max="15" min="1"
                                            step="1" data-amount="price-<?=$record->id?>"
                                            data-total-amount="total-<?=$record->id?>">

                                        <input type="hidden" name="product_id" value="<?=$record->id?>">

                                    </form>
                                    <br>
                                </div>


                                <form class="single-add-to-cart-form" id="form-id">
                                    <input type="hidden" name="product_id" value="<?=$record->id?>" />
                                    <input type="hidden" name="product_quantity" class="variation_id" value="1" />
<!-- 
                                    <input type="hidden" name="product_weight" class="variation_id" value="<??>" /> -->
                                    <button type="submit">Add To Cart</button>
                                </form>

                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>





                <div class="review">
                    <ul class="agri-ul review-nav">
                        <li class="desc active" data-target="description-show">Description</li>
                        <li class="rev " data-target="review-content-show">Reviews <?=count($reviews)?></li>
                    </ul>


                    <div class="review-content description-show">
                        <div class="description">
                            <p><?=$record->description?></p>
                            <div class="post-item">
                                <div class="post-thumb">
                                    <img src="<?=base_url()?>uploads/common/<?=$record->product_image?>" alt="shop">
                                </div>
                               <!--  <div class="post-content">
                                    <ul class="agri-ul">
                                        <li>
                                            Donec non est at libero vulputate rutrum.
                                        </li>
                                        <li>
                                            Morbi ornare lectus quis justo gravida semper.
                                        </li>
                                        <li>
                                            Pellentesque aliquet, sem eget laoreet ultrices.
                                        </li>
                                        <li>
                                            Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
                                        </li>
                                        <li>
                                            Donec a neque libero.
                                        </li>
                                        <li>
                                            Pellentesque aliquet, sem eget laoreet ultrices.
                                        </li>
                                        <li>
                                            Morbi ornare lectus quis justo gravida semper..
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            <!-- <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                             -->
                        </div>



                        <div class="review-showing">
                            <ul class="agri-ul content">
                               
                                <style>
                                .txt-center {
                                    text-align: center;
                                }

                                .hide {
                                    display: none;
                                }

                                .clear {
                                    float: none;
                                    clear: both;
                                }

                                .rating {
                                    width: 90px;
                                    unicode-bidi: bidi-override;
                                    direction: rtl;
                                    text-align: center;
                                    position: relative;
                                }

                                .rating>label {
                                    float: right;
                                    display: inline;
                                    padding: 0;
                                    margin: 0;
                                    position: relative;
                                    width: 1.1em;
                                    cursor: pointer;
                                    color: #000;
                                }

                                .rating>label:hover,
                                .rating>label:hover~label,
                                .rating>input.radio-btn:checked~label {
                                    color: transparent;
                                }

                                .rating>label:hover:before,
                                .rating>label:hover~label:before,
                                .rating>input.radio-btn:checked~label:before,
                                .rating>input.radio-btn:checked~label:before {
                                    content: "\2605";
                                    position: absolute;
                                    left: 0;
                                    color: #FFD700;
                                }
                                </style>
    <!--                             <li>
                                    <div class="post-thumb">
                                        <img src="<?=base_url()?>assets/front/images/team/03.jpg" alt="shop">
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-meta">
                                            <div class="posted-on">
                                                <a href="#">Mack Zucky</a>
                                                <p>Posted on December 25, 2017 at 6:57 am</p>
                                            </div>
                                            <div class="rating">
                                                <div class="txt-center">
                                                 
                                                        <div class="rating">
                                                            <input id="star5" name="star" type="radio" value="5"
                                                                class="radio-btn hide" />
                                                            <label for="star5">☆</label>
                                                            <input id="star4" name="star" type="radio" value="4"
                                                                class="radio-btn hide" />
                                                            <label for="star4">☆</label>
                                                            <input id="star3" name="star" type="radio" value="3"
                                                                class="radio-btn hide" />
                                                            <label for="star3">☆</label>
                                                            <input id="star2" name="star" type="radio" value="2"
                                                                class="radio-btn hide" />
                                                            <label for="star2">☆</label>
                                                            <input id="star1" name="star" type="radio" value="1"
                                                                class="radio-btn hide" />
                                                            <label for="star1">☆</label>
                                                            <div class="clear"></div>
                                                        </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="entry-content">
                                            <p>Enthusiast build innovativ initiatives before lonterm high-impact awesome
                                                theme seo psd porta monetize covalent leadership after without resource.
                                            </p>
                                        </div>
                                    </div>
                                </li> -->
                                <?php foreach($reviews as $review):?>

                                <li>
                                    <div class="post-thumb">
                                        <img src="<?=base_url()?>assets/front/images/team/04.jpg" alt="shop">
                                    </div>
                                     <div class="post-content">
                                        <div class="entry-meta">
                                            <div class="posted-on">
                                                <a href="#"><?=$review->Name?></a>
                                                <p>Posted on <?=$review->date_time?></p>
                                            </div>
                                            <div class="rating">
                                                <?php $reviews=(int)$review->ratings;
                                                for($i=0;$i<$reviews;$i++){?>
                                                    <i class="far fa-star"></i>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="entry-content">
                                            <p><?=$review->comment?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <div class="client-review">
                                <div class="review-form">
                                    <div class="review-title">
                                        <h5>Add a Review</h5>
                                    </div>
                                    <form  class="row insert_data"   this_id="001">
                                        <div class="col-md-4 col-12">
                                            <input type="text" name="name" placeholder="Full Name" name="Name">
                                            <input type="hidden" name="table_name" value="tbl_reviews">
                                            <input type="hidden" name="user_id"  value="<?php echo $_SESSION['login_id'];?>">
                                            <input type="hidden" name="product_id"  value="<?=$record->id?>">

                                        </div>
                                        <div class="col-md-4 col-12">
                                            <input type="text" name="email" placeholder="Email Adress" name="email">
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="rating">
                                                <span class="rating-title">Your Rating : </span>
                                                <div class="rating">


                                                
                                                        <input id="star5" name="ratings" type="radio" value="5"
                                                            class="radio-btn hide" />
                                                        <label for="star5">☆</label>
                                                        <input id="star4" name="ratings" type="radio" value="4"
                                                            class="radio-btn hide" />
                                                        <label for="star4">☆</label>
                                                        <input id="star3" name="ratings" type="radio" value="3"
                                                            class="radio-btn hide"  />
                                                        <label for="star3">☆</label>
                                                        <input id="star2" name="ratings" type="radio" value="2"
                                                            class="radio-btn hide"/>
                                                        <label for="star2">☆</label>
                                                        <input id="star1" name="ratings" type="radio" value="1"
                                                            class="radio-btn hide"/>
                                                        <label for="star1">☆</label>
                                                        <div class="clear"></div>
                                                    

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <textarea rows="8" placeholder="Type Here Message" name="comment"></textarea>
                                        </div>
                                        <?php if(isset($_SESSION['login_id'])){?>


                                        <div class="col-12">
                                            <button class="defult-btn" type="submit">Submit Review</button>
                                        </div>
                                        <?php }else{?>
                                            <div class="col-12">
                                          
                                            <a href="<?=base_url()?>login" class="defult-btn">Submit Review</a>
                                        </div>
                                        
                                        
                                        <?php }?>


                                    </form>
                                </div>
                            </div>
                        </div>







                    </div>
                </div>
            </div>
</section>

  <?php if($record->related_products[0]!='' || !isset($record->related_products)):?>  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="section-header mb-1 mt-5">
                <h3>Related Products</h3>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">
                   <?php $rproducts=$this->frontend_model->get_records('tbl_product', "status = '0' and id='$record->id'")[0];
                   $rrproducts=explode(",",$rproducts->related_products);
                   foreach($rrproducts as $products):
                    if($products!=$record->id):?>
                   <?php $product=$this->frontend_model->get_records('tbl_product', "status = '0' and id='$products'")[0];
                   $checked=$this->frontend_model->get_records('tbl_user_wishlist', "status = '0' and item_id='$product->id'")[0];?>
                    <div class="item">
                        <div class="shop-product-wrap">
                            <div class="product-item">
                                <div class="product-thumb">
                                    <img src="<?=base_url()?>uploads/products/<?=$product->product_image?>" alt="shope">
                                    <div class="product-action-link">
                                        <a href="<?=base_url()?>uploads/products/<?=$product->product_image?>" data-rel="lightcase"><i class="icofont-eye"></i></a>
                                               <a href="javascript:(0)" onclick="wishlist(<?=$product->id?>)"><i class="icofont-heart-alt" id="heart<?=$product->id?>" <?php if($checked){ echo "style='color:red'";}?>></i></a>
                                            <form class="single-add-to-cart-form" id="form-id">
                                                    <input type="hidden" name="product_id" value="<?=$product->id?>"/>
                                                    <input type="hidden" name="product_quantity" class="variation_id" value="1"/>
                            
                                                <a href="javascript:void(0)" onclick="$(this).closest('form').submit()"><i class="icofont-cart-alt"></i></a>
                                            </form>
                                            </div>
                                </div>
                                <div class="product-content">
                                    <h6><a href="<?=base_url()?>seaproduct/<?=$product->id?>"><?=$product->name?></a></h6>
                                    <h6>₹<?=$product->price?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                    <?php endforeach;?>
                    
                    
                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<script>
$('ul.review-nav').on('click', 'li', function(e) {
    e.preventDefault();
    var reviewContent = $('.review-content');
    var viewRev = $(this).data('target');
    $('ul.review-nav li').removeClass('active');
    $(this).addClass('active');
    reviewContent.removeClass('review-content-show description-show').addClass(viewRev);
});





$('.insert_data').submit(function(e){
    
    e.preventDefault();
    
    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
    
    if(is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "comment",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function() {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function(response){
                console.log(response)
                if(response.result == 1)
                {
                    $(this_id)[0].reset();
                    toastr.success('Success!');
                    location.reload();
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    
                    if($(this_id).attr('row-data') === 'yes')
                    {
                        update_table_data(this_id);
                    }
                    
                    if($(this_id).attr('reload-action') === 'true')
                    {
                        setTimeout(function(){ location.reload(); }, 1000);
                    }
                }
                else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    }
    else
    {
        toastr.error('Please check the required fields!');
    }
});
</script>
<!-- Shop Page Section ending here
    -->
