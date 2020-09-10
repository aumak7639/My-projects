<div class="umino-sidebar-catagories_area">
	<div class="umino-sidebar_categories">
		<div class="umino-categories_title first-child">
			<h5>Filter by price</h5>
		</div>
		<div class="price-filter">
			<form method="get">
				<div id="slider-range"></div>
				<div class="price-slider-amount">
					<div class="label-input">
						<label>price : </label>
						<input type="text" id="amount" placeholder="Add Your Price" class="w-100" />
						<input type="hidden" name="sort-by" value="<?php if(isset($_GET['sort-by'])){ echo $_GET['sort-by']; } ?>">
						<input type="hidden" name="price-from" value="<?php if(isset($_GET['price-from'])){ echo $_GET['price-from']; }else{ echo "25000"; } ?>">
						<input type="hidden" name="price-to" value="<?php if(isset($_GET['price-to'])){ echo $_GET['price-to']; }else{ echo "120000"; } ?>">
						<button class="umino-btn umino-btn_dark umino-btn_yellow pull-right" type="submit">Filter</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="umino-sidebar_categories category-module">
		<div class="umino-categories_title">
			<h5>Product Categories</h5>
		</div>
		<div class="sidebar-categories_menu">
			<ul>
				<?php foreach($this->frontend_model->get_records('tbl_category', "status = '0' order by name asc") as $menu_cat): ?>
					<li class="has-sub">
						<a href="<?=base_url()?><?=$menu_cat->slug?>">
							<?=$menu_cat->name?> <i class="ion-chevron-right"></i>
						</a>
						<ul>
							<?php foreach($this->frontend_model->get_records('tbl_sub_category', "status = '0' and category_id = '$menu_cat->id' order by name asc") as $menu_sub_cat): ?>
								<li>
									<a href="<?=base_url()?><?=$menu_sub_cat->slug?>">
										<?=$menu_sub_cat->name?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="umino-sidebar_categories umino-banner_area sidebar-banner_area">
		<?php if($category_image != "default-image.jpg" && $category_image != ""): ?>
			<a href="<?=$category_ad_link?>" target="_blank">
				<img src="<?=base_url()?>uploads/category/<?=$category_image?>">
			</a>
		<?php endif; ?>
	</div>
	<div class="umino-sidebar_categories">
		<div class="umino-categories_title umino-tags_title">
			<h5>Popular Tags</h5>
		</div>
		<ul class="umino-tags_list">
			<li><a href="javascript:void(0)">Tags 1</a></li>
			<li><a href="javascript:void(0)">Tags 2</a></li>
			<li><a href="javascript:void(0)">Tags 3</a></li>
			<li><a href="javascript:void(0)">Tags 4</a></li>
			<li><a href="javascript:void(0)">Tags 5</a></li>
			<li><a href="javascript:void(0)">Tags 6</a></li>
			<li><a href="javascript:void(0)">Tags 7</a></li>
			<li><a href="javascript:void(0)">Tags 8</a></li>
		</ul>
	</div>
</div>
