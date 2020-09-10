<div class="header-bottom_area">
	<div class="container">
		<div class="row">                        
			<div class="col-lg-12 d-none d-lg-block position-static">
				<div class="main-menu_area">
					<nav class="main_nav">
						<ul>
							<li class="dropdown-holder">
								<a href="javascript:void(0);">All Categories</a>
								<ul class="hm-dropdown">
									<?php foreach($this->frontend_model->get_records('tbl_category', "status = '0' order by name asc") as $menu_cat): ?>
										<li>
											<a href="<?=base_url()?><?=$menu_cat->slug?>">
												<?=$menu_cat->name?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
							<?php foreach($this->frontend_model->get_records('tbl_header_menu', "status = '0' and sub_id = '0' and parent_id='0' order by menu_order + 0 asc") as $header_menu): ?>
				
					
								<?php
									if($header_menu->cat_type == 'category'){
										$name2 = $this->frontend_model->get_category_name($header_menu->cat_id);
										$link2 = $this->frontend_model->get_record('tbl_category', "id=" . $header_menu->cat_id, "slug");
										$status = $this->frontend_model->get_record('tbl_category', "id=" . $header_menu->cat_id, "status");
									}
									elseif($header_menu->cat_type == 'sub_category'){
										$name2 = $this->frontend_model->get_sub_category_name($header_menu->cat_id);
										$link2 = $this->frontend_model->get_record('tbl_sub_category', "id=" . $header_menu->cat_id, "slug");
										$status = $this->frontend_model->get_record('tbl_sub_category', "id=" . $header_menu->cat_id, "status");
									}
									elseif($header_menu->cat_type == 'child_category'){
										$name2 = $this->frontend_model->get_child_category_name($header_menu->cat_id);
										$link2 = $this->frontend_model->get_record('tbl_child_category', "id=" . $header_menu->cat_id, "slug");
										$status = $this->frontend_model->get_record('tbl_child_category', "id=" . $header_menu->cat_id, "status");
									}
								?>
								<?php if($status == '0'): ?>
								
									<li class="megamenu-holder">
										<a href="<?=base_url()?><?=$link2?>">
											<?=$name2?>
										</a>
										<ul class="umino-megamenu">
											<?php $parent_id = $header_menu->id; ?>
											<?php foreach($this->frontend_model->get_records('tbl_header_menu', "status = '0' and sub_id = '0' and parent_id='$parent_id' order by menu_order + 0 asc") as $subs): ?>
															
												
												<?php
													if($subs->cat_type == 'category'){
														$name1 = $this->frontend_model->get_category_name($subs->cat_id);
														$link1 = $this->frontend_model->get_record('tbl_category', "id=" . $subs->cat_id, "slug");
														$status1 = $this->frontend_model->get_record('tbl_category', "id=" . $subs->cat_id, "status");
													}
													elseif($subs->cat_type == 'sub_category'){
														$name1 = $this->frontend_model->get_sub_category_name($subs->cat_id);
														$link1 = $this->frontend_model->get_record('tbl_sub_category', "id=" . $subs->cat_id, "slug");
														$status1 = $this->frontend_model->get_record('tbl_sub_category', "id=" . $subs->cat_id, "status");
													}
													elseif($subs->cat_type == 'child_category'){
														$name1 = $this->frontend_model->get_child_category_name($subs->cat_id);
														$link1 = $this->frontend_model->get_record('tbl_child_category', "id=" . $subs->cat_id, "slug");
														$status1 = $this->frontend_model->get_record('tbl_child_category', "id=" . $subs->cat_id, "status");
													}
												?>
												<?php if($status1 == '0'): ?>
													<li>
														<span class="megamenu-title">
															<a href="<?=base_url()?><?=$link1?>"><?=$name1?></a>
														</span>
														<ul>
															<?php $sub_id = $subs->id; ?>
															<?php foreach($this->frontend_model->get_records('tbl_header_menu', "status = '0' and sub_id = '$sub_id' and parent_id='$parent_id' order by menu_order + 0 asc") as $childs): ?>
																
																<?php
																	if($childs->cat_type == 'category'){
																		$name = $this->frontend_model->get_category_name($childs->cat_id);
																		$link = $this->frontend_model->get_record('tbl_category', "id=" . $childs->cat_id, "slug");
																		$status2 = $this->frontend_model->get_record('tbl_category', "id=" . $childs->cat_id, "status");
																	}
																	elseif($childs->cat_type == 'sub_category'){
																		$name = $this->frontend_model->get_sub_category_name($childs->cat_id);
																		$link = $this->frontend_model->get_record('tbl_sub_category', "id=" . $childs->cat_id, "slug");
																		$status2 = $this->frontend_model->get_record('tbl_sub_category', "id=" . $childs->cat_id, "status");
																	}
																	elseif($childs->cat_type == 'child_category'){
																		$name = $this->frontend_model->get_child_category_name($childs->cat_id);
																		$link = $this->frontend_model->get_record('tbl_child_category', "id=" . $childs->cat_id, "slug");
																		$status2 = $this->frontend_model->get_record('tbl_child_category', "id=" . $childs->cat_id, "status");
																	}
																?>
																<?php if($status2 == '0'): ?>
																	<li>
																		<a href="<?=base_url()?><?=$link?>">
																			<?=$name?>
																		</a>
																	</li>
																<?php endif; ?>
															<?php endforeach; ?>
														</ul>
													</li>
												<?php endif; ?>
											<?php endforeach; ?>
											<?php if($header_menu->image != "default-image.jpg" && $header_menu->image != ""): ?>
												<li>
													<div class="menu-image">
														<a href="<?=$header_menu->image_link?>">
															<img src="<?=base_url()?>uploads/header-menu/<?=$header_menu->image?>" alt="<?=$name2?>" class="imd-fluid">
														</a>
													</div>
												</li>
											<?php endif; ?>
										</ul>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
							<li>
								<a href="<?=base_url()?>how-it-works">How it works</a>
							</li>
							<li>
								<a href="#">Customized Designs</a>
							</li>
						</ul>
						
					</nav>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="mobile-menu_wrapper" id="mobileMenu">
	<div class="offcanvas-menu-inner">
		<div class="container">
			<a href="#" class="btn-close"><i class="ion-android-close"></i></a>
			<div class="offcanvas-inner_search">
				<form action="#" class="hm-searchbox">
					<input type="text" placeholder="Search for item...">
					<button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
				</form>
			</div>
			<nav class="offcanvas-navigation">
				<ul class="mobile-menu">
					<li><a href="#0">All Category  </a></li>										
					<li class="menu-item-has-children">
						<a href=""><span class="mm-text">T.V.Unit</span></a>
						<ul class="sub-menu">										
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
							<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
						</ul>
					</li>
					<li class="menu-item-has-children">
						<a href="#">
							<span class="mm-text">Wardrobe</span>
						</a>
						<ul class="sub-menu">
							<li class="menu-item-has-children">
								<a href="#">
									<span class="mm-text">Category Name</span>
								</a>
								<ul class="sub-menu">
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
								</ul>
							</li>
							<li class="menu-item-has-children">
								<a href="#">
									<span class="mm-text">Category Name</span>
								</a>
								<ul class="sub-menu">
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
								</ul>
							</li>
							<li class="menu-item-has-children">
								<a href="#">
									<span class="mm-text">Category Name</span>
								</a>
								<ul class="sub-menu">
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
									<li><a href="#"><span class="mm-text">Menu Here</span></a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="#0"><span class="mm-text">Wall Shelves </span></a></li>
					<li><a href="#0"><span class="mm-text">Utility Units </span></a></li>
					<li><a href="#0"><span class="mm-text">How Its Works </span></a></li>
					<li><a href="#0"><span class="mm-text">Home Decor</span></a></li>
					<li><a href="#0"><span class="mm-text">Customized Designs</span></a></li>
					
				</ul>
			</nav>
			<nav class="offcanvas-navigation user-setting_area">
				<ul class="mobile-menu">
					<li><a href="#0"><span class="mm-text">My Account </span></a></li>
					<li><a href="#0"><span class="mm-text">Login | Register </span></a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>