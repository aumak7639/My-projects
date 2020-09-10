
        <!-- Begin  Breadcrumb Area
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?=base_url()?>">Home</a></li> 
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!--  Breadcrumb Area End Here -->
        <div class="umino-latest-blog_area blog-grid-view_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2">
                        <div class="umino-blog-sidebar-wrapper">
                            
                            <div class="umino-blog-sidebar">
                                <h4 class="umino-blog-sidebar-title">Recent Posts</h4>
                                
								<?php foreach($this->frontend_model->get_records("tbl_blogs", "status = '0' order by id desc limit 4") as $recent_blog): ?>
									<div class="recent-post">
										<div class="recent-post_thumb">
											<a href="<?=base_url()?>blog/<?=$recent_blog->id?>/<?=$tis->slugify($recent_blog->title)?>">
												<img class="img-full" src="<?=base_url()?>uploads/common/<?=$recent_blog->image?>" alt="<?=$recent_blog->meta_title?>">
											</a>
										</div>
										<div class="recent-post_desc">
											<span>
												<a href="<?=base_url()?>blog/<?=$recent_blog->id?>/<?=$tis->slugify($recent_blog->title)?>">
													<?=$recent_blog->title?>
												</a>
											</span>
											<span class="post-date"><?=date('d M, Y', strtotime($recent_blog->date))?></span>
										</div>
									</div>
									<hr>
								<?php endforeach; ?>
								
                            </div>
                            <div class="umino-blog-sidebar">
                                <h4 class="umino-blog-sidebar-title">Tags</h4>
                                <ul class="umino-tags_list">
                                    <li><a href="javascript:void(0)">Growth</a></li>
                                    <li><a href="javascript:void(0)">Health</a></li>
                                    <li><a href="javascript:void(0)">Nutrients</a></li>
                                    <li><a href="javascript:void(0)">Nutrition</a></li>
                                    <li><a href="javascript:void(0)">Travel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-1">
                        <div class="row blog-item_wrap">
							<?php $inc = 1; ?>
							<?php foreach($records as $record): ?>
								<div class="col-lg-6">
									<div class="blog-item">
										<div class="blog-img">
											<a href="<?=base_url()?>blog/<?=$record->id?>/<?=$tis->slugify($record->title)?>">
												<img class="img-full" src="<?=base_url()?>uploads/common/<?=$record->image?>" alt="<?=$record->meta_title?>">
											</a>
										</div>
										<div class="blog-content">
											<div class="blog-text_area">
												<div class="title">
													<h3>
														<a href="<?=base_url()?>blog/<?=$record->id?>/<?=$tis->slugify($record->title)?>">
															<?=$record->title?>
														</a>
													</h3>
												</div>
												<div class="meta">
													<span>Date <strong> <?=date('d M, Y', strtotime($record->date))?></strong></span>
												</div>
												<div class="short-desc">
													<p><?=$record->short_description?></p>
												</div>
												<div class="umino-btn-ps_left">
													<a class="umino-btn_dark" href="<?=base_url()?>blog/<?=$record->id?>/<?=$tis->slugify($record->title)?>">Read More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php if($inc % 2 == 0): ?>
									</div>
									<div class="row blog-item_wrap">
								<?php endif; ?>
								<?php $inc++; ?>
							<?php endforeach; ?>
						</div>
						<?php if(isset($_GET['page'])): ?>
						<?php
							$total_pages = ceil($totalBlogs / 10);
						?>
							<?php if($total_pages > 1): ?>
								<div class="row">
									<div class="col-lg-12">
										<div class="umino-paginatoin-area">
											<div class="row">
												<div class="col-lg-12">
													<ul class="umino-pagination-box">
														<li>
															<a href="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>?page=<?=($_GET['page'] - 1)?>">
																Previous Page
															</a>
														</li>
														
														<?php for($pages = 1; $pages <= $total_pages; $pages++){ ?>
															<li class="<?=($_GET['page']==$pages)?"active":""?>">
																<a href="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>?page=<?=$pages?>">
																	<?=$pages?>
																</a>
															</li>
														<?php } ?>
														
														<?php if($total_pages > $_GET['page']): ?>
															<li>
																<a href="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>?page=<?=($_GET['page'] + 1)?>">
																	Next Page
																</a>
															</li>
														<?php endif; ?>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php else: ?>
							<?php if($total_pages > 1): ?>
							<div class="row">
								<div class="col-lg-12">
									<div class="umino-paginatoin-area">
										<div class="row">
											<div class="col-lg-12">
												<ul class="umino-pagination-box">
									
													<?php for($pages = 1; $pages <= $total_pages; $pages++){ ?>
														<li class="<?=($pages==1)?"active":""?>">
															<a href="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>?page=<?=$pages?>">
																<?=$pages?>
															</a>
														</li>
													<?php } ?>
										
													<li>
														<a href="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>?page=2">
															Next Page
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>