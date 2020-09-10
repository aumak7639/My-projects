
        <!-- Begin  Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li class="active">Compare Products</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Breadcrumb Area End Here -->
		
		<?php if(isset($_SESSION['compare_items']) && sizeof($_SESSION['compare_items']) > 1): ?>
			
			<?php 
				$compare_items = $_SESSION['compare_items'];
				$product1 = $this->frontend_model->get_records("tbl_product", "id=" . $compare_items[0]->product_id)[0];
				$product2 = $this->frontend_model->get_records("tbl_product", "id=" . $compare_items[1]->product_id)[0];
				if(sizeof($_SESSION['compare_items']) > 2)
				{
					$product3 = $this->frontend_model->get_records("tbl_product", "id=" . $compare_items[2]->product_id)[0];
				}
			?>
			
			<div class="compare-area">
				<div class="container">
					<div class="compare-table table-responsive">
						<table class="table table-bordered table-hover mb-0">
							<tbody>
								<tr>
									<th class="compare-column-titles"></th>
									<td class="compare-column-productinfo">
										<div class="compare-pdoduct-image">
											<a target="_blank" href="<?=base_url()?><?=$product1->slug?>">
												<img src="<?=base_url()?>uploads/products/<?=$product1->product_image?>" alt="<?=$product1->name?>">
											</a>
											<?php if($product1->in_stock > 0): ?>
												<form class="single-add-to-cart-form">
													<input type="hidden" name="product_id" value="<?=$product1->id?>"/>
													<input type="hidden" value="<?=($product1->moq <= 0)?"1":$product1->moq?>" name="product_quantity">
													<?php if(isset($_SESSION['is_login'])): ?>
														<a href="javascript:void(0)">
															<?php if($product1->finishing_variant != ""): ?>
																<?php $finishing_variant_exp = explode(",", $product1->finishing_variant); ?>
																<?php if(sizeof($finishing_variant_exp) > 0): ?>
																	<input value="<?=$finishing_variant_exp[0]?>" type="hidden" name="finishing-variant">
																<?php endif; ?>
															<?php endif; ?>
															
															<?php if($product1->loft_variant != ""): ?>
																<?php $loft_variant_exp = explode(",", $product1->loft_variant); ?>
																<?php if(sizeof($loft_variant_exp) > 0): ?>
																	<input value="<?=$loft_variant_exp[0]?>" type="hidden" name="loft-variant">
																<?php endif; ?>
															<?php endif; ?>
															
															<?php if($product1->mirror_variant != ""): ?>
																<?php $mirror_variant_exp = explode(",", $product1->mirror_variant); ?>
																<?php if(sizeof($mirror_variant_exp) > 0): ?>
																	<input value="<?=$mirror_variant_exp[0]?>" type="hidden" name="mirror-variant">
																<?php endif; ?>
															<?php endif; ?>
															
															<button type="submit" class="umino-compare_btn" data-toggle="tooltip" data-placement="top" title="Add To cart">
																<span>ADD TO CART</span>
															</button>
														</a>
													<?php else: ?>
														<a title="Add to cart" href="javascript:void(0)" class="umino-compare_btn" data-target="#login" data-toggle="modal">
															<span>ADD TO CART</span>
														</a>
													<?php endif; ?>
												</form>
											<?php endif; ?>
											<a href="javascript:void(0);" class="product-compare-remove" data-product="<?=$product1->id?>">
												<span>Remove</span>
											</a>
										</div>
									</td>
									<td class="compare-column-productinfo">
										<div class="compare-pdoduct-image">
											<a target="_blank" href="<?=base_url()?><?=$product2->slug?>">
												<img src="<?=base_url()?>uploads/products/<?=$product2->product_image?>" alt="<?=$product2->name?>">
											</a>
											<?php if($product2->in_stock > 0): ?>
												<form class="single-add-to-cart-form">
													<input type="hidden" name="product_id" value="<?=$product2->id?>"/>
													<input type="hidden" value="<?=($product2->moq <= 0)?"1":$product2->moq?>" name="product_quantity">
													<?php if(isset($_SESSION['is_login'])): ?>
														<a href="javascript:void(0)">
															<?php if($product2->finishing_variant != ""): ?>
																<?php $finishing_variant_exp = explode(",", $product2->finishing_variant); ?>
																<?php if(sizeof($finishing_variant_exp) > 0): ?>
																	<input value="<?=$finishing_variant_exp[0]?>" type="hidden" name="finishing-variant">
																<?php endif; ?>
															<?php endif; ?>
															
															<?php if($product2->loft_variant != ""): ?>
																<?php $loft_variant_exp = explode(",", $product2->loft_variant); ?>
																<?php if(sizeof($loft_variant_exp) > 0): ?>
																	<input value="<?=$loft_variant_exp[0]?>" type="hidden" name="loft-variant">
																<?php endif; ?>
															<?php endif; ?>
															
															<?php if($product2->mirror_variant != ""): ?>
																<?php $mirror_variant_exp = explode(",", $product2->mirror_variant); ?>
																<?php if(sizeof($mirror_variant_exp) > 0): ?>
																	<input value="<?=$mirror_variant_exp[0]?>" type="hidden" name="mirror-variant">
																<?php endif; ?>
															<?php endif; ?>
															
															<button type="submit" class="umino-compare_btn" data-toggle="tooltip" data-placement="top" title="Add To cart">
																<span>ADD TO CART</span>
															</button>
														</a>
													<?php else: ?>
														<a title="Add to cart" href="javascript:void(0)" class="umino-compare_btn" data-target="#login" data-toggle="modal">
															<span>ADD TO CART</span>
														</a>
													<?php endif; ?>
												</form>
											<?php endif; ?>
											<a href="javascript:void(0);" class="product-compare-remove" data-product="<?=$product2->id?>">
												<span>Remove</span>
											</a>
										</div>
									</td>
									<?php if(isset($product3)): ?>
										<td class="compare-column-productinfo">
											<div class="compare-pdoduct-image">
												<a target="_blank" href="<?=base_url()?><?=$product3->slug?>">
													<img src="<?=base_url()?>uploads/products/<?=$product3->product_image?>" alt="<?=$product3->name?>">
												</a>
												<?php if($product3->in_stock > 0): ?>
													<form class="single-add-to-cart-form">
														<input type="hidden" name="product_id" value="<?=$product3->id?>"/>
														<input type="hidden" value="<?=($product3->moq <= 0)?"1":$product3->moq?>" name="product_quantity">
														<?php if(isset($_SESSION['is_login'])): ?>
															<a href="javascript:void(0)">
																<?php if($product3->finishing_variant != ""): ?>
																	<?php $finishing_variant_exp = explode(",", $product3->finishing_variant); ?>
																	<?php if(sizeof($finishing_variant_exp) > 0): ?>
																		<input value="<?=$finishing_variant_exp[0]?>" type="hidden" name="finishing-variant">
																	<?php endif; ?>
																<?php endif; ?>
																
																<?php if($product3->loft_variant != ""): ?>
																	<?php $loft_variant_exp = explode(",", $product3->loft_variant); ?>
																	<?php if(sizeof($loft_variant_exp) > 0): ?>
																		<input value="<?=$loft_variant_exp[0]?>" type="hidden" name="loft-variant">
																	<?php endif; ?>
																<?php endif; ?>
																
																<?php if($product3->mirror_variant != ""): ?>
																	<?php $mirror_variant_exp = explode(",", $product3->mirror_variant); ?>
																	<?php if(sizeof($mirror_variant_exp) > 0): ?>
																		<input value="<?=$mirror_variant_exp[0]?>" type="hidden" name="mirror-variant">
																	<?php endif; ?>
																<?php endif; ?>
																
																<button type="submit" class="umino-compare_btn" data-toggle="tooltip" data-placement="top" title="Add To cart">
																	<span>ADD TO CART</span>
																</button>
															</a>
														<?php else: ?>
															<a title="Add to cart" href="javascript:void(0)" class="umino-compare_btn" data-target="#login" data-toggle="modal">
																<span>ADD TO CART</span>
															</a>
														<?php endif; ?>
													</form>
												<?php endif; ?>
												<a href="javascript:void(0);" class="product-compare-remove" data-product="<?=$product3->id?>">
													<span>Remove</span>
												</a>
											</div>
										</td>
									<?php endif; ?>
								</tr>
								<tr>
									<th>Product Name</th>
									<td>
										<h5 class="compare-product-name"><a target="_blank" href="<?=base_url()?><?=$product1->slug?>"><?=$product1->name?></a>
										</h5>
									</td>
									<td>
										<h5 class="compare-product-name"><a target="_blank" href="<?=base_url()?><?=$product2->slug?>"><?=$product2->name?></a></h5>
									</td>
									<?php if(isset($product3)): ?>
										<td>
											<h5 class="compare-product-name"><a target="_blank" href="<?=base_url()?><?=$product3->slug?>"><?=$product3->name?></a></h5>
										</td>
									<?php endif; ?>
								</tr>
								<tr>
									<th>Description</th>
									<td><?=$product1->short_description?></td>
									<td><?=$product2->short_description?></td>
									<?php if(isset($product3)): ?>
										<td><?=$product3->short_description?></td>
									<?php endif; ?>
								</tr>
								<tr>
									<th>Price</th>
									<td>₹<?=number_format($product1->price,2)?></td>
									<td>₹<?=number_format($product2->price,2)?></td>
									<?php if(isset($product3)): ?>
										<td>₹<?=number_format($product3->price,2)?></td>
									<?php endif; ?>
								</tr>
								<tr>
									<th>Color</th>
									<td><img src="<?=base_url()?>uploads/common/<?=$product1->product_color_image?>" alt="<?=$product1->name?>" width="60"></td>
									<td><img src="<?=base_url()?>uploads/common/<?=$product2->product_color_image?>" alt="<?=$product2->name?>" width="60"></td>
									<?php if(isset($product3)): ?>
										<td><img src="<?=base_url()?>uploads/common/<?=$product3->product_color_image?>" alt="<?=$product3->name?>" width="60"></td>
									<?php endif; ?>
								</tr>
								<tr>
									<th>Stock</th>
									<td><?=($product1->in_stock > 0)?"In Stock":"Out of stock"?></td>
									<td><?=($product2->in_stock > 0)?"In Stock":"Out of stock"?></td>
									<?php if(isset($product3)): ?>
										<td><?=($product3->in_stock > 0)?"In Stock":"Out of stock"?></td>
									<?php endif; ?>
								</tr>
								<tr>
									<th>Ratings</th>
									<td>
										<div class="rating-box">
											<ul>
												<?php 
													$review = $this->frontend_model->get_custom_query("select sum(ratings) as rating_tot from tbl_reviews where review_status = 'approved' and status = '0' and product_id = '$product1->id'")[0]->rating_tot; 
													$review_count = sizeof($this->frontend_model->get_records('tbl_reviews', "review_status = 'approved' and status = '0' and product_id = '$product1->id'"));
													if($review_count == 0)
													{
														$rev = 0;
													}
													else
													{
														$rev = round($review / $review_count);
													}
												?>
												<?php for($i = 1; $i <= $rev; $i++): ?>
													<li><i class="ion-ios-star"></i></li>
												<?php endfor; ?>
												<?php for($i = ($rev + 1); $i < 6 ; $i++): ?>
													<li><i class="ion-ios-star-outline"></i></li>
												<?php endfor; ?>
												(<?=$review_count?> ratings)
											</ul>
										</div>
									</td>
									<td>
										<div class="rating-box">
											<ul>
												<?php 
													$review = $this->frontend_model->get_custom_query("select sum(ratings) as rating_tot from tbl_reviews where review_status = 'approved' and status = '0' and product_id = '$product2->id'")[0]->rating_tot; 
													$review_count = sizeof($this->frontend_model->get_records('tbl_reviews', "review_status = 'approved' and status = '0' and product_id = '$product2->id'"));
													if($review_count == 0)
													{
														$rev = 0;
													}
													else
													{
														$rev = round($review / $review_count);
													}
												?>
												<?php for($i = 1; $i <= $rev; $i++): ?>
													<li><i class="ion-ios-star"></i></li>
												<?php endfor; ?>
												<?php for($i = ($rev + 1); $i < 6 ; $i++): ?>
													<li><i class="ion-ios-star-outline"></i></li>
												<?php endfor; ?>
												(<?=$review_count?> ratings)
											</ul>
										</div>
									</td>
									<?php if(isset($product3)): ?>
										<td>
											<div class="rating-box">
												<ul>
													<?php 
														$review = $this->frontend_model->get_custom_query("select sum(ratings) as rating_tot from tbl_reviews where review_status = 'approved' and status = '0' and product_id = '$product3->id'")[0]->rating_tot; 
														$review_count = sizeof($this->frontend_model->get_records('tbl_reviews', "review_status = 'approved' and status = '0' and product_id = '$product3->id'"));
														if($review_count == 0)
														{
															$rev = 0;
														}
														else
														{
															$rev = round($review / $review_count);
														}
													?>
													<?php for($i = 1; $i <= $rev; $i++): ?>
														<li><i class="ion-ios-star"></i></li>
													<?php endfor; ?>
													<?php for($i = ($rev + 1); $i < 6 ; $i++): ?>
														<li><i class="ion-ios-star-outline"></i></li>
													<?php endfor; ?>
													(<?=$review_count?> ratings)
												</ul>
											</div>
										</td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		
        <?php else: ?>
			<div class="error404-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 ml-auto mr-auto text-center">
							<div class="search-error-wrapper">
								<h1>&nbsp;</h1>
								<?php if(isset($_SESSION['compare_items'])){ $cc = sizeof($_SESSION['compare_items']); }else{ $cc = 0; } ?>
								<h2>You have <?=$cc?> products in compare list.</h2>
								<p class="short_desc">Minimum 2 products should be in compare list to compare products.</p>
								<div class="umino-btn-ps_center"></div>
								<br>
								<a href="<?=base_url()?>" class="umino-error_btn">Continue Shopping</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        <?php endif; ?>