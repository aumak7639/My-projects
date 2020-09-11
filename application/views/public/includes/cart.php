<a href="<?=base_url()?>cart">
	<div class="minicart-icon">
		<i class="ion-bag"></i>
		<span class="item-count">
			<?php
				$cart_count = 0;
				if(isset($_SESSION['cart_items']))
				{
					foreach($_SESSION['cart_items'] as $item):
						$cart_count = $cart_count + $item->product_quantity;
					endforeach;
				}
				echo $cart_count;
			?>
		</span>
	</div>
</a>
<ul class="minicart-body">
	
	<?php $no_cart = 1; ?>
	<?php if(isset($_SESSION['cart_items'])): ?>
		<?php if(sizeof($_SESSION['cart_items']) > 0): ?>
			<?php $no_cart = 0; ?>
			<?php $i = 0; ?>
			<?php foreach($_SESSION['cart_items'] as $item): ?>
				<?php $pr_id = $item->product_id; ?>
				<?php $item_det = $this->frontend_model->get_records('tbl_product', "status = '0' and id = '$pr_id'")[0]; ?>
				<?php if($i < 3): ?>
					<li class="minicart-item_area cart_item_parent" pr-id="<?=$item_det->id?>">
						<div class="minicart-single_item">
							<div class="product-item_remove">
								<span class="ion-android-close cart_remove_btn" title="Remove This Item"></span>
							</div>
							<div class="minicart-img">
								<a href="<?=base_url()?><?=$item_det->slug?>">
									<img src="<?=base_url()?>uploads/products/<?=$item_det->product_image?>" alt="<?=$item_det->name?>">
								</a>
							</div>
							<div class="minicart-content">
								<div class="product-name">
									<h6>
										<a href="<?=base_url()?><?=$item_det->slug?>">
											<?=$item_det->name?>
										</a>
									</h6>
								</div>
								<span class="product-quantity">Qty <?=$item->product_quantity?></span>
								<div class="price-box">
									<span class="new-price">₹<?=number_format($item_det->price,2)?></span>
								</div>
							</div>
						</div>
					</li>
				<?php else: ?>
					<li class="mini_cart_item">
						<a href="<?=base_url()?>cart"> See More</a>
					</li>
				<?php endif; ?>
				<?php $i++; ?>
			<?php endforeach; ?>
			<li>
				<div class="minicart-button">
					<a class="umino-btn umino-btn_fullwidth" href="<?=base_url()?>checkout">Checkout</a>
				</div>
			</li>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if($no_cart == 1): ?>
		<li class="mini_cart_item">
			No products in cart.
		</li>
	<?php endif; ?>
</ul>