<div class="single-product">
	<div class="product-img">
		<?php if($product->highlight == "sale" || $product->highlight == "offer"):?>
			<div class="sale-flag-discount">
				<span class="sale-text"> 
					<?=ucfirst($product->highlight)?>
				</span>
			</div>
		<?php endif; ?>
		<?php if($product->highlight == "deal"):?>
			<div class="ribbon">
				<span>
					DEALS
				</span>
			</div>
		<?php endif; ?>	
		<a href="<?=base_url()?><?=$product->slug?>">
			<img src="<?=base_url()?>uploads/products/<?=$product->product_image?>" alt="<?=ucfirst($product->name)?>">
		</a>
		<div class="add-actions">
			<ul>
				<li>
					<?php if($product->in_stock > 0): ?>
						<form class="single-add-to-cart-form">
							<input type="hidden" name="product_id" value="<?=$product->id?>"/>
							<input type="hidden" value="<?=($product->moq <= 0)?"1":$product->moq?>" name="product_quantity">
							<?php if(isset($_SESSION['is_login'])): ?>
								<a href="javascript:void(0)">
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
									
									<button type="submit" data-toggle="tooltip" data-placement="top" title="Add To cart">
										<i class="ion-bag"></i>
									</button>
								</a>
							<?php else: ?>
								<a title="Add to cart" href="javascript:void(0)" data-target="#login" data-toggle="modal">
									<span data-toggle="tooltip" data-placement="top" title="Add To cart">
										<i class="ion-bag"></i>
									</span>
								</a>
							<?php endif; ?>
						</form>
					<?php endif; ?>
				</li>
				<li>
					<?php if(isset($_SESSION['is_login'])): ?>
						<?php if(sizeof($this->frontend_model->get_records("tbl_wishlist", "status = '0' and user_id = '$_SESSION[login_id]' and product_id = '" . $product->id . "'")) > 0): ?>
							<a href="javascript:void(0)" class="product-wishlist" data-product="<?=$product->id?>" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
								<i class="ion-ios-heart-outline"></i>
							</a>
						<?php else: ?>
							<a href="javascript:void(0)" class="product-wishlist" data-product="<?=$product->id?>" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
								<i class="ion-ios-heart-outline"></i>
							</a>
						<?php endif; ?>
					<?php else: ?>
						<a href="javascript:void(0)" data-target="#login" data-toggle="modal">
							<i class="ion-ios-heart-outline" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"></i>
						</a>
					<?php endif; ?>
					<li>
						<a href="javascript: void(0);" data-toggle="tooltip" data-placement="top" class="product-compare" data-product="<?=$product->id?>" tabindex="0" data-original-title="Add To Compare">
							<i class="fa fa-chart-bar"></i>
						</a>
					</li>
					<li class="quick-view-btn" data-toggle="modal" data-target="#quickViewModal" onclick="quickViewModal(<?=$product->id?>);">
						<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Quick View">
							<i class="ion-ios-search"></i>
						</a>
					</li>
				</li>
			</ul>
		</div>
	</div>
	<div class="product-content">
		<div class="product-desc_info">
			<h6 class="product-name text-center">
				<a href="<?=base_url()?><?=$product->slug?>">
					<?=ucfirst($product->name)?>
				</a>
			</h6>
			<div class="price-box">
				<span class="made-by">by Furn2Fit</span>													
				<?php if($product->shipping_note != ""): ?>
					<span class="delivery"><i class="fa fa-truck" aria-hidden="true"></i> <?=$product->shipping_note?></span>
				<?php endif; ?>
			</div>
			<div class="price-box">
				<span class="new-price">₹<?=number_format($product->price, 2)?></span>
				<?php if($product->selling_price != $product->price && $product->selling_price != 0): ?>
					<span class="old-price"> ₹<?=number_format($product->selling_price, 2)?></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>