<?php
	$product_id = $this->input->post('product_id');
	$product = $this->frontend_model->get_records("tbl_product", "status = '0' and id = '$product_id'")[0];
?>
	<div class="col-lg-5">
		<div class="sp-img_area">
			<img src="<?=base_url()?>uploads/products/<?=$product->product_image?>" class="w-100">
		</div>
	</div>
	<div class="col-xl-7 col-lg-6">
		<div class="sp-content">
			<div class="sp-heading">
				<h5>
					<a href="<?=base_url()?><?=$product->slug?>">
						<?=$product->name?>
					</a>
				</h5>
			</div>
			<div class="price-box">
				<span class="new-price">₹<?=number_format($product->price, 2)?></span>
				<?php if($product->selling_price != $product->price && $product->selling_price != 0): ?>
					<span class="old-price"> ₹<?=number_format($product->selling_price, 2)?></span>
				<?php endif; ?>
			</div>
			<div class="features">
				<a href="<?=base_url()?><?=$product->slug?>">
					See all features
				</a>
			</div>
			<?php if($product->in_stock > 0): ?>
				<form class="single-add-to-cart-form">
					<div class="quantity-area">
						<div class="quantity">
							<label>Quantity</label>
							<div class="cart-plus-minus">
								<input class="cart-plus-minus-box" type="number" name="product_quantity" min="<?=($product->moq <= 0)?"1":$product->moq?>" max="<?=($product->in_stock <= 0)?"0":$product->in_stock?>" value="<?=($product->moq <= 0)?"1":$product->moq?>" required>
								<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
								<div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
							</div>
						</div>
						<div class="quantity-btn">
							<ul>
								<input type="hidden" name="product_id" value="<?=$product->id?>"/>
								<?php if(isset($_SESSION['is_login'])): ?>
									<?php if($product->finishing_variant != ""): ?>
										<?php $finishing_variant_exp = explode(",", $product->finishing_variant); ?>
										<?php if(sizeof($finishing_variant_exp) > 0): ?>
											<input value="<?=$finishing_variant_exp[0]?>" type="hidden" name="finishing-variant">
										<?php endif; ?>
									<?php endif; ?>
									
									<?php if($product->loft_variant != ""): ?>
										<?php $loft_variant_exp = explode(",", $product->loft_variant); ?>
										<?php if(sizeof($loft_variant_exp) > 0): ?>
											<input value="<?=$loft_variant_exp[0]?>" type="hidden" name="loft-variant">
										<?php endif; ?>
									<?php endif; ?>
									
									<?php if($product->mirror_variant != ""): ?>
										<?php $mirror_variant_exp = explode(",", $product->mirror_variant); ?>
										<?php if(sizeof($mirror_variant_exp) > 0): ?>
											<input value="<?=$mirror_variant_exp[0]?>" type="hidden" name="mirror-variant">
										<?php endif; ?>
									<?php endif; ?>
									
									<button type="submit" class="add-to_cart" data-toggle="tooltip" data-placement="top" title="Add To cart">
										Add to cart
									</button>
								<?php else: ?>
									<a title="Add to cart" class="add-to_cart" href="javascript:void(0)" data-target="#login" data-toggle="modal">
										Add to cart
									</a>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</form>
			<?php endif; ?>
			<div class="umino-social_link">
				<div class="social-title">
					<h3>Share This Product</h3>
				</div>
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
					<li class="youtube">
						<a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
							<i class="fab fa-youtube"></i>
						</a>
					</li>
					<li class="google-plus">
						<a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
							<i class="fab fa-google-plus"></i>
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