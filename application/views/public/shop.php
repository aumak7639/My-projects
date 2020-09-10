<?php include("header.php") ?>


        
        <!-- Page Header Section Start Here -->
        <section class="page-header bg_img padding-tb">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header-content-area">
                    <h4 class="ph-title"> All Products</h4>
                    <ul class="lab-ul">
                        <li><a href="index.php">Home</a></li>
                        <li><a class="active">Shop</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Page Header Section Ending Here -->



		
        <!-- shop page Section Start Here -->
        <div class="shop-page padding-tb bg-ash">
            <div class="container">
                <div class="section-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-7 col-12">
                            <aside>
							
								<div class="widget widget-category">
                                    <div class="widget-header">
                                        <h5>Price</h5>
                                    </div>
                                    <div class="widget-wrapper">
										<div class="row">
										<div class="col-6">
											<div class="form-group">
											<label for="exampleFormControlSelect1">Minimum</label>
											<select class="form-control" id="min" onchange="price()" value="<?=$_SESSION['min']?>">
                                            
											<option value="100">100</option>
											<option value="200">200</option>
											<option value="300">300</option>
											<option value="400">400</option>
											<option value="500">500</option>
											</select>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
											<label for="exampleFormControlSelect1">Maximum</label>
											<select class="form-control" id="max" onchange="price()" value="<?=$_SESSION['max']?>">
                                             
											<option value="500">500</option>
                                            <option value="100">100</option>
											<option value="200">200</option>
											<option value="300">300</option>
											<option value="400">400</option>
											</select>
											</div>
										</div>
										</div>
                                    </div>
                                </div>

                               

                                <div class="widget widget-category">
                                    <div class="widget-header">
                                        <h5 for="name">All Categories </h5>
                                    </div>
                                    <div class="widget-wrapper">
                                        <ul class="lab-ul shop-menu">
                                        <?php $records=$this->frontend_model->get_records('tbl_category', "status = '0'order by date_time asc");?>
                                                        <ul>
                                                            <?php foreach($records as $record):?>
                                                            
                                                              <div>  <li>
                                                           <a href="<?=base_url()?>shops/<?=$record->id?>">
                                                               <?= $record->name;?> </a>
                                                            </li> </div>
                                                           
                                                            <?php endforeach;?>
                                                        </ul>

                                    </div>
                                </div>

            
                                <div class="widget widget-post">
                                    <div class="widget-header">
                                        <h5>Latest Products</h5>
                                    </div>
                                    <ul class="lab-ul widget-wrapper">
                                    <?php $records = $this->frontend_model->get_records('tbl_product',"status='0'order by date_time desc limit 0, 4");?>
                                    <?php foreach($records as $record):?>
                                
                                        <li class="d-flex flex-wrap justify-content-between">
                                            <div class="post-thumb">

                                                <img src="<?=base_url()?>assets/front/images/product/<?=$record->product_image?>" alt=thumb>

                                   

                                            </div>
                                            <div class="post-content">

                                            <a href="<?=base_url()?>seaproduct/<?=$record->id?>"><?=$record->name; ?> </a>
											<p>₹ <?=$record->price?></p>
                                            </div>
										</li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </aside>
                        </div>
						
						<div class="col-lg-9 col-12">
                            <article>
                                <div class="shop-title d-flex flex-wrap justify-content-between align-items-center">
                                       <p>  Showing <?php if($rows==0){echo "0";}else if($page == 0){ echo "1"; }else{ echo $res*($page-1); } ?>-<?php  if($page == 0 && $rows<20){echo $rows;}else if($page == 0 && $rows>=20){echo $res;}else{if(($res*$page)>$rows){echo $rows;}else{echo $res*$page;}} ?> of <?=$rows?> Results
                                    </p>
                    
                                    <div class="product-view-mode">
                                        <div class="form-group m-0">										
											<select class="form-control" id="sort">
												<option value="">Sort items</option>
												<option value="order by name">Sort by name</option>
												<option value="order by price asc">Sort by price: low to high</option>
												<option value="order by price desc">Sort by price: high to low</option>
											</select>
										</div>
                                    </div>
                                </div>

                                <div class="shop-product-wrap grids row justify-content-center">
                              <?php  foreach($products as $product){?>


                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <img src="<?=base_url()?>uploads/products/<?=$product->product_image?>" alt="shope">
                                                <div class="product-action-link">
                                                    <a href="<?=base_url()?>uploads/products/<?=$product->product_image?>" data-rel="lightcase"><i class="icofont-eye"></i></a>
                                                    <!-- <a href="#"><i class="icofont-heart-alt"></i></a> -->
                                                    <a href="javascript:(0)" onclick="wishlist(<?=$product->id?>)"><i class="icofont-heart-alt" id="heart<?=$product->id?>" <?php if($checked){ echo "style='color:red'";}?>></i></a>
                                                  <form class="single-add-to-cart-form" id="form-id">
                                                    <input type="hidden" name="product_id" value="<?=$product->id?>"/>
                                                    <input type="hidden" name="product_quantity" class="variation_id" value="1"/>
                            
                                                <a href="javascript:void(0)" onclick="$(this).closest('form').submit()"><i class="icofont-cart-alt"></i></a>
                                            </form>
                                            </div>
                                            </div>
                                            <div class="product-content">
                                                <h6><a href="<?=base_url()?>seaproduct/<?=$product->id?>"><?= $product->name ?></a></h6>
                                                <h6>₹<?= $product->price?></h6>
                                            </div>
                                        </div>                                        
									</div> <?php } ?>                                </div>
                                
                                <div class="paginations">
                                        
                                    <?=$links;?>
                                </div>
                            </article>
                        </div>
                        
					</div>
                </div>
            </div>
        </div>
        <!-- shop page Section ENding Here -->
        






<script>
    $("#sort").change(function(){
        var value=$(this).val();
        $.ajax({
                type: 'POST',
                url:baseURL+'sort',
                data:{value:value},
                dataType: "json",
                
                success: function(response){
                    console.log(response)
                    if(response.result == 1)
                    {
                        location.reload();
                    }
                    else
                    {
                        toastr.error('Something went wrong! Please try again later!');
                        $(this_id + ' input[type=submit]').removeAttr('disabled');
                    }
                }
            });
        });
    </script>
<?php include("footer.php") ?>
	
