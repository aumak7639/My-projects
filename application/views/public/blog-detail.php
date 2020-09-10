
        <!-- Begin  Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li class="active"><?=$record->title?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Breadcrumb Area End Here -->
        <div class="umino-latest-blog_area umino-blog-details">
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
                    <div class="col-lg-9 order-1 order-lg-1">
                        <div class="blog-item">
                            <div class="blog-img img-hover_effect">
                                <img src="<?=base_url()?>uploads/common/<?=$record->image?>" alt="<?=$record->meta_title?>">
                            </div>
                            <div class="blog-content">
                                <div class="blog-text_area">
                                    <div class="title">
                                        <h3>
											<?=$record->title?>
                                        </h3>
                                    </div>
                                    <div class="short-desc">
                                        <p>
											<?=$record->short_description?>
										</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-additional_information">
                            <?=$record->description?>
                        </div>
						<hr>
                        <div class="umino-social_link">
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
						<hr>
                    </div>
					
                </div>
            </div>
        </div>
        