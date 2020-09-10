        <!-- Begin  Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?=base_url()?>">Home</a></li>
						<li class="active"><?=$pageTitle?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Breadcrumb Area End Here -->

        <!-- Begin  Single Product Area -->
        <div class="sp-area">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sp-img_area text-center">
                                <div class="zoompro-border">
                                    <img class="zoompro" src="<?=base_url()?>uploads/products/<?=$product->product_image?>" data-zoom-image="<?=base_url()?>uploads/products/<?=$product->product_image?>" alt="" />
                                </div>
                                <div id="gallery" class="sp-img_slider slider-navigation_style-4">
									<?php foreach($product_images as $product_image): ?>
										<a class="active" data-image="<?=base_url()?>uploads/products/<?=$product_image->file_name?>" data-zoom-image="<?=base_url()?>uploads/products/<?=$product_image->file_name?>">
											<img src="<?=base_url()?>uploads/products/<?=$product_image->file_name?>" alt="">
										</a>
									<?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h2>
										<a href="javascript:void(0)">
											<?=html_entity_decode(ucfirst($product->name))?>
										</a>
									</h2>
                                </div>
                                <div class="price-box">
									<?php if($product->strikeout_price != 0): ?>
										<span class="new-price"> ₹<?=number_format($product->price,2)?></span>
										<span class="old-price"> ₹<?=number_format($product->strikeout_price,2)?></span>
									<?php else: ?>
										<span class="new-price"> ₹<?=number_format($product->price,2)?></span>
										<?php if($product->selling_price != $product->price && $product->selling_price != 0): ?>
											<span class="old-price"> ₹<?=number_format($product->selling_price,2)?></span>
										<?php endif; ?>
									<?php endif; ?></h4>
                                </div>
                                <div class="product-size_box p-0">
									<?php if($product->in_stock > $product->moq && $product->in_stock != '-1'): ?>
										<div class="in-stock p-3">
											<i class="fa fa-check-circle"></i>
											<span> In Stock</span>
										</div>
									<?php else: ?>
										<div class="in-stock p-3">
											<i class="fa fa-check-circle text-danger"></i>
											<span> Out of stock</span>
										</div>
									<?php endif; ?>
                                </div>
								
								<?php if($product->dimension_h != ""): ?>
									<div class="product-size_box p-0">
										<span>Dimension</span>
										<div class="button-list">
											H <?=$product->dimension_h?> X W <?=$product->dimension_w?> X D <?=$product->dimension_d?><br>
											(all dimensions in feet)
										</div>
									</div>
								<?php endif; ?>
								
								
									<?php $cvs = $this->frontend_model->get_records("tbl_product_color_variants", "status = '0' and product_id = '$product->id'"); ?>
									<?php if(sizeof($cvs) > 0): ?>
										<div class="product-size_box color-list_area">
											<span>Color</span>
										
											<?php foreach($cvs as $cv): ?>
												<a href="<?=base_url()?><?=$this->frontend_model->get_record("tbl_product", "id='$cv->value'", "slug");?>">
													<img src="<?=base_url()?>uploads/products/<?=$cv->color_image?>" width="50">
												</a>
												&nbsp;&nbsp;
											<?php endforeach; ?>
										
										</div>
									<?php endif; ?>
								<form class="add-to-cart-form">
									<?php if($product->finishing_variant != ""): ?>
										<?php $finishing_variant_exp = explode(",", $product->finishing_variant); ?>
										<?php if(sizeof($finishing_variant_exp) > 0): ?>
											<div class="product-size_box pt-3">
												<span>Finishing</span>
												<div class="button-list">
													<?php for($i = 0; $i <sizeof($finishing_variant_exp); $i++): ?>
														<input id="finishing_variant-<?=$i?>" value="<?=$finishing_variant_exp[$i]?>" type="radio" name="finishing-variant" <?=($i == 0)?"checked":""?>>
														<label for="finishing_variant-<?=$i?>"><?=$finishing_variant_exp[$i]?></label>
													<?php endfor; ?>
												</div>									
											</div>
										<?php endif; ?>
									<?php endif; ?>
									
									<?php if($product->loft_variant != ""): ?>
										<?php $loft_variant_exp = explode(",", $product->loft_variant); ?>
										<?php if(sizeof($loft_variant_exp) > 0): ?>
											<div class="product-size_box pt-3">
												<span>Loft</span>
												<div class="button-list">
													<?php for($i = 0; $i <sizeof($loft_variant_exp); $i++): ?>
														<input id="loft_variant-<?=$i?>" value="<?=$loft_variant_exp[$i]?>" type="radio" name="loft-variant" <?=($i == 0)?"checked":""?>>
														<label for="loft_variant-<?=$i?>"><?=$loft_variant_exp[$i]?></label>
													<?php endfor; ?>
												</div>									
											</div>
										<?php endif; ?>
									<?php endif; ?>
									
									<?php if($product->mirror_variant != ""): ?>
										<?php $mirror_variant_exp = explode(",", $product->mirror_variant); ?>
										<?php if(sizeof($mirror_variant_exp) > 0): ?>
											<div class="product-size_box pt-3">
												<span>Mirror</span>
												<div class="button-list">
													<?php for($i = 0; $i <sizeof($mirror_variant_exp); $i++): ?>
														<input id="mirror_variant-<?=$i?>" value="<?=$mirror_variant_exp[$i]?>" type="radio" name="mirror-variant" <?=($i == 0)?"checked":""?>>
														<label for="mirror_variant-<?=$i?>"><?=$mirror_variant_exp[$i]?></label>
													<?php endfor; ?>
												</div>									
											</div>
										<?php endif; ?>
									<?php endif; ?>
									
									<div class="product-size_box pt-3 align-items-start">
										<span>Delivery</span>
										<div class="button-list pin-code">
											
											<input type="number" name="pincode" placeholder="Pincode">
											<button type="button" class="pincode_check">Check</button>
											<small class="hide"></small>
											<p class="m-0 pt-2"><?=$product->shipping_note?></p>
											
										</div>									
									</div>
									
									<?php if($product->in_stock > $product->moq && $product->in_stock != '-1'): ?>
										<input type="hidden" name="product_id" value="<?=$product->id?>"/>
										<div class="product-size_box pt-3 quantity">
											<span>Quantity</span>
											<div class="cart-plus-minus">
												<input class="cart-plus-minus-box" type="number" name="product_quantity" min="<?=($product->moq <= 0)?"1":$product->moq?>" max="<?=($product->in_stock <= 0)?"0":$product->in_stock?>" value="<?=($product->moq <= 0)?"1":$product->moq?>" required>
												<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
												<div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
											</div>
											<div class="additional-btn_area">
												<?php if(isset($_SESSION['is_login'])): ?>
													<button type="submit" class="additional_btn">Add to cart</button>
												<?php else: ?>
													<?php if($product->in_stock > $product->moq && $product->in_stock != '-1'): ?>
														<a title="Add to cart" class="additional_btn" href="javascript:void(0)" data-target="#login" data-toggle="modal">
															Add to cart
														</a>
													<?php endif; ?>
												<?php endif; ?>
											</div>
										</div>
										<?php if($product->moq != 1): ?>
											<br>
											<small>
												(Minimum <?=($product->moq <= 0)?"1":$product->moq?> <?=($product->moq <= 0)?"quantity":"quantities"?> required)
											</small>
										<?php endif; ?>
										<br>
										<small class="text-danger">
											<b>(<?=$product->in_stock?> stock left)</b>
										</small>
										
										<?php if(isset($_SESSION['is_login'])): ?>
											<button type="button" id="buy-now-btn" class="umino-register_btn buy-now-btn">Buy Now</button>
										<?php else: ?>
											<?php if($product->in_stock > $product->moq && $product->in_stock != '-1'): ?>
												<button type="button" class="umino-register_btn buy-now-btn" data-target="#login" data-toggle="modal">
													Buy Now
												</button>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
                                
								</form>
								<div class="qty-btn_area">
                                    <ul>
                                        <li>
											<?php if(isset($_SESSION['is_login'])): ?>
												<?php if(sizeof($this->frontend_model->get_records("tbl_wishlist", "status = '0' and user_id = '$_SESSION[login_id]' and product_id = '" . $product->id . "'")) > 0): ?>
													<a href="javascript:void(0)" class="product-wishlist qty-btn" data-product="<?=$product->id?>">
														<i class="ion-android-favorite-outline"></i> Remove from wishlist
													</a>
												<?php else: ?>
													<a href="javascript:void(0)" class="product-wishlist qty-btn" data-product="<?=$product->id?>">
														<i class="ion-android-favorite-outline"></i> Add to wishlist
													</a>
												<?php endif; ?>
											<?php else: ?>
												<a title="Wishlist" href="javascript:void(0)" class="qty-btn" data-target="#login" data-toggle="modal">
													<i class="ion-android-favorite-outline"></i> Add to wishlist
												</a>
											<?php endif; ?>
										</li>
										<li>
											<a class="qty-btn product-compare" href="javascript: void(0);" data-toggle="tooltip" title="" data-original-title="Compare This Product" data-product="<?=$product->id?>">
												<i class="ion-ios-shuffle-strong"></i> Add To Compare
											</a>
										</li>
                                    </ul>
                                </div>
								
                                <div class="category-list_area">
									<h6>Shipping:</h6>
                                    <ul class="tags-list">
                                        <li>
                                            <a href="javascript:void(0)">
												<?php if($product->shipping_cost != "0"): ?>
													₹ <?=number_format($product->shipping_cost, 2)?>
												<?php else: ?>
													<span class="text-success">Free Shipping</span>
												<?php endif; ?>
											</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="category-list_area">
									<h6>Category:</h6>
                                    <ul class="tags-list">
										<?php
											$cats = explode(',', $product->category);
											foreach($cats as $cat):
										?>
											<li>
												<a href="<?=base_url()?><?=$this->frontend_model->get_record('tbl_category', "status = '0' and id='$cat'", 'slug')?>">
													<?=$this->frontend_model->get_record('tbl_category', "status = '0' and id='$cat'", 'name')?>
												</a>
											</li>
										<?php
											endforeach;
										?>
                                        
                                    </ul>
                                </div>
                                <div class="category-list_area tag-list_area">
                                    <h6>Tags:</h6>
                                    <ul class="tags-list">
										<?php
											$tags = explode(',', $product->tags);
											foreach($tags as $tag):
										?>
											<li>
												<a href="<?=base_url()?>tags/<?=$tag?>" rel="tag">
													<?=ucfirst($tag)?>
												</a> |
											</li>
										<?php
											endforeach;
										?>
                                    </ul>
                                </div>
                                <div class="umino-social_link">
                                    <h6>Share This product:</h6>
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Single Product Area End Here -->




		<div class="shipping-area pt-5  pb-90">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class=" row">
							<?php if($product->badge_title_1 != ""): ?>
								<!-- Single Shipping -->
								<div class="sin-shipping-1 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12">
									<div class="icon float-left"><i class="fa fa-truck" aria-hidden="true"></i>
									</div>
									<div class="content fix">
										<h4><?=$product->badge_title_1?></h4>
										<p><?=$product->badge_description_1?></p>
									</div>
								</div>
							<?php endif; ?>
							<?php if($product->badge_title_2 != ""): ?>
								<!-- Single Shipping -->
								<div class="sin-shipping-1 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12">
									<div class="icon float-left"><i class="fa fa-wrench" aria-hidden="true"></i></i>
									</div>
									<div class="content fix">
										<h4><?=$product->badge_title_2?></h4>
										<p><?=$product->badge_description_2?></p>
									</div>
								</div>
							<?php endif; ?>
							<?php if($product->badge_title_3 != ""): ?>
								<!-- Single Shipping -->
								<div class="sin-shipping-1 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12">
									<div class="icon float-left"><i class="fa fa-life-ring" aria-hidden="true"></i></i>
									</div>
									<div class="content fix">
										<h4><?=$product->badge_title_3?></h4>
										<p><?=$product->badge_description_3?></p>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>




		<div class="sp-area sp-slider_area">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
						<div class="col-lg-12">
							<div class="umino-section_title">
								<h2>Product Dimensions</h2>
							</div>
						</div>
                        <div class="col-md-8 offset-md-2">
                            <div class="sp-slider slider-navigation_style-4">
                                
								<?php
									foreach($this->frontend_model->get_records("tbl_product_dimensions_images", "product_id='" . $product->id . "' and status = '0'") as $product_dimension_image):
								?>
									<div class="slide-item">
										<div class="single-product">
											<div class="product-img">
												<a class="popup-img venobox vbox-item" href="<?=base_url()?>uploads/products/<?=$product_dimension_image->file_name?>" data-gall="myGallery">
													<img src="<?=base_url()?>uploads/products/<?=$product_dimension_image->file_name?>" alt="<?=$product_dimension_image->alt?>">
												</a>
											</div>
										</div>
									</div>
								<?php 
									endforeach;
								?>
								
                            </div>
                        </div>
                        
					</div>
                </div>
            </div>
        </div>


        <!-- Begin  Single Product Tab Area -->
        <div class="sp-tab_area d-none d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sp-product-tab_nav">
                            <div class="product-tab">
                                <ul class="nav product-menu justify-content-center">
                                    <li><a class="active" data-toggle="tab" href="#pc001"><span>Features</span></a></li>
                                    <li><a data-toggle="tab" href="#pc002"><span>Properties</span></a></li>
                                    <li><a data-toggle="tab" href="#pc005"><span>Care Instructions</span></a></li>
                                    <li><a data-toggle="tab" href="#pc004"><span>Warranty</span></a></li>
									<li><a data-toggle="tab" href="#pc006"><span>Returns</span></a></li>
                                    <li><a data-toggle="tab" href="#pc007"><span>Quality Promise</span></a></li>
									<li><a data-toggle="tab" href="#pc003"><span>Reviews</span></a></li>
								
                                </ul>
                            </div>
                            <div class="tab-content umino-tab_content">
                                <div id="pc001" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">
										<?=$product->description?>
                                    </div>
                                </div>
                                <div id="pc004" class="tab-pane" role="tabpanel">
                                    <div class="product-description">
										<?=$product->warranty_description?>
                                    </div>
                                </div>
								<div id="pc002" class="tab-pane" role="tabpanel">
									<div class="product-description">
										<ul class="product-spec">
											<?php foreach($this->frontend_model->get_records("tbl_product_properties", "status = '0' and product_id = '$product->id' order by id asc") as $prop): ?>
												<li>
													<span class="property_key"><b><?=$prop->title?></b></span>
													<span class="property_val"><?=$prop->value?></span>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
								
								<div id="pc005" class="tab-pane" role="tabpanel">
									<div class="product-description">
										<?=$product->care_instructions?>
                                    </div>
								</div>
								
								<div id="pc006" class="tab-pane" role="tabpanel">
									<div class="product-description">
										<?=$product->returns?>
                                    </div>
								</div>
								
								<div id="pc007" class="tab-pane" role="tabpanel">
									<div class="product-description">
										<?=$product->quality_promise?>
                                    </div>
								</div>
								
								<div id="pc003" class="tab-pane" role="tabpanel">
                                    <div class="tab-pane active" id="tab-review">
                                        <?php foreach($this->frontend_model->get_records('tbl_reviews', "review_status = 'approved' and status = '0' and product_id = '$product->id' order by id desc") as $record): ?>
											<form class="form-horizontal" id="form-review">
												<div id="review">
													<table class="table table-striped table-bordered">
														<tbody>
															<tr>
																<td style="width: 50%;">
																	<strong>
																		<?=$this->frontend_model->get_record("tbl_general_users", "id=" . $record->user_id, 'first_name')?> <?=$this->frontend_model->get_record("tbl_general_users", "id=" . $record->user_id, 'last_name')?>
																	</strong>
																</td>
																<td class="text-right">
																	<?php echo date("d M, Y", strtotime($record->date_time)) ?>
																</td>
															</tr>
															<tr>
																<td colspan="2">
																	<p>
																		<?php echo $record->comment ?>
																	</p>
																	<div class="rating-box">
																		<ul>
																			<?php for($i = 1; $i <= $record->ratings; $i++): ?>
																				<li><i class="ion-ios-star"></i></li>
																			<?php endfor; ?>
																			<?php for($i = ($record->ratings + 1); $i < 6 ; $i++): ?>
																				<li><i class="ion-ios-star-outline"></i></li>
																			<?php endfor; ?>
																		</ul>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</form>
										<?php endforeach; ?>
										
										<form class="form-horizontal review-post" id="form-review">
                                            <h2>Write a review</h2>
                                            <div class="form-group last-child required">
                                                <div class="col-sm-12 p-0">
                                                    <div class="your-opinion">
                                                        <label>Your rating for this product</label>
                                                        <span>
                                                        <select class="star-rating" name="ratings">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option selected value="5">5</option>
                                                        </select>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group required second-child">
                                                <div class="col-sm-12 p-0">
                                                    <label class="control-label">Share opinion about your experience</label>
													<input name="product_id" value="<?=$product->id?>" type="hidden">
                                                    <textarea class="review-textarea" id="con_message" name="comment" required></textarea> 
                                                </div>
                                            </div>
                                            <div class="form-group last-child required">
                                                <div class="umino-btn-ps_right">
                                                    <button class="umino-btn umino-btn_dark">Submit</button>
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
        
				
	<div class="main-content_area d-block d-sm-none d-md-none">            
		<div class="accordion-with-testimonials_area ">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="accordion-area">
							<div class="frequently-accordion about-us_accordion">
								<div id="accordion">
								
									<div class="card actives">
										<div class="card-header" id="001">
											<h5 class="mb-0">
												<a href="javascript:void(0)" class="javascript:void(0)" data-toggle="collapse" data-target="#tab1" aria-expanded="true" aria-controls="tab1">
													Features
													<i class="ion-chevron-down"></i>
												</a>
											</h5>
										</div>
										<div id="tab1" class="collapse show" aria-labelledby="001" data-parent="#accordion">
											<div class="card-body">
											   <div class="product-description">
													<?=$product->description?>
												</div>
											</div>
										</div>
									</div>
									
									<div class="card">
										<div class="card-header" id="002">
											<h5 class="mb-0">
												<a href="javascript:void(0)" class="javascript:void(0)" data-toggle="collapse" data-target="#tab2" aria-expanded="true" aria-controls="tab2">
													Properties
													<i class="ion-chevron-down"></i>
												</a>
											</h5>
										</div>
										<div id="tab2" class="collapse" aria-labelledby="002" data-parent="#accordion">
											<div class="card-body">
											   <ul class="product-spec">
													<?php foreach($this->frontend_model->get_records("tbl_product_properties", "status = '0' order by id asc") as $prop): ?>
														<li>
															<span class="property_key"><b><?=$prop->title?></b></span>
															<span class="property_val"><?=$prop->value?></span>
														</li>
													<?php endforeach; ?>
												</ul>
											</div>
										</div>
									</div>
									
									<div class="card">
										<div class="card-header" id="003">
											<h5 class="mb-0">
												<a href="javascript:void(0)" class="javascript:void(0)" data-toggle="collapse" data-target="#tab3" aria-expanded="true" aria-controls="tab3">
													Warranty
													<i class="ion-chevron-down"></i>
												</a>
											</h5>
										</div>
										<div id="tab3" class="collapse" aria-labelledby="003" data-parent="#accordion">
											<div class="card-body">
											   <div class="product-description">
													<?=$product->warranty_description?>
												</div>
											</div>
										</div>
									</div>
									
									<div class="card">
										<div class="card-header" id="007">
											<h5 class="mb-0">
												<a href="javascript:void(0)" class="javascript:void(0)" data-toggle="collapse" data-target="#tab7" aria-expanded="true" aria-controls="tab7">
													Reviews
													<i class="ion-chevron-down"></i>
												</a>
											</h5>
										</div>
										<div id="tab7" class="collapse" aria-labelledby="001" data-parent="#accordion">
											<div class="card-body">
												<div class="sp-tab_area">
												<div class="tab-content">
											   <div class="tab-pane active" id="tab-review">
													<form class="form-horizontal" id="form-review">
														<div id="review">
															<table class="table table-striped table-bordered">
																<tbody>
																	<tr>
																		<td style="width: 50%;"><strong>Customer</strong></td>
																		<td class="text-right">25/06/2020</td>
																	</tr>
																	<tr>
																		<td colspan="2">
																			<p>Good product! Thank you very much</p>
																			<div class="rating-box">
																				<ul>
																					<li><i class="ion-ios-star"></i></li>
																					<li><i class="ion-ios-star"></i></li>
																					<li><i class="ion-ios-star"></i></li>
																					<li class="silver-color"><i class="ion-ios-star-half"></i></li>
																					<li class="silver-color"><i class="ion-ios-star-outline"></i></li>
																				</ul>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
														<h2>Write a review</h2>
														<div class="form-group required">
															<div class="col-sm-12 p-0">
																<label>Your Email <span class="required">*</span></label>
																<input class="review-input" type="email" name="con_email" id="con_email" required>
															</div>
														</div>
														<div class="form-group required second-child">
															<div class="col-sm-12 p-0">
																<label class="control-label">Share your opinion</label>
																<textarea class="review-textarea" name="con_message" id="con_message"></textarea>
																<div class="help-block"><span class="text-danger">Note:</span> HTML is not
																	translated!</div>
															</div>
														</div>
														<div class="form-group last-child required">
															<div class="col-sm-12 p-0">
																<div class="your-opinion">
																	<label>Your Rating</label>
																	<span>
																	<select class="star-rating">
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																	</select>
																</span>
																</div>
															</div>
															<div class="umino-btn-ps_right">
																<a href="javascript:void(0)" class="umino-btn umino-btn_dark">Continue</a>
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
				</div>
			</div>
		</div>
	</div>


		
        <div class="umino-product_area umino-product_area-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="umino-section_title">
                            <h3>Related Products</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="umino-product_slider-2 slider-navigation_style-1">
						
						
							<?php
								$item = 1;
								$products = $this->frontend_model->get_custom_query("select * from tbl_product where product_status = 'approved' and category = '$product->category' and status = '0' and id != '$product->id' order by id desc");
								foreach($products as $product):
									if($item <= $items || $items == 0)
									{
										$data['brand_image'] = $this->frontend_model->get_record('tbl_brands', "id=" . $product->brand_id, 'small');
										$data['product'] = $product;
										echo '<div class="slide-item">';
										$this->load->view('public/sections/includes/single-product.php', $data); 
										echo '</div>';
									}
									$item++;
								endforeach;
								
								if(sizeof($products) == 0)
								{
									?>
									<p class="lead text-center">
										<strong> 
											No products to show.
										</strong>
									</p>
									<?php
								}
							?>
							
						
							
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Product Area Two End Here -->
