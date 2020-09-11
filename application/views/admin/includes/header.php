<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
	<style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jQuery-2.1.4.min.js"></script>
    
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link href="<?php echo base_url(); ?>assets/admin/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/dist/js/select2.full.min.js" charset="utf-8"></script>
	
	<script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-print-1.6.1/rr-1.2.6/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-print-1.6.1/rr-1.2.6/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
  </head>
  <body class="skin-black sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>admin/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?=base_url()?>assets/front/images/logo.jpg" height="50"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="<?=base_url()?>assets/front/images/logo.jpg" height="50"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/admin/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/admin/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>admin/loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>admin/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
				<li class="treeview">
				  <a href="<?php echo base_url(); ?>admin/dashboard">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
				  </a>
				</li>
				<?php
					if($role == ROLE_ADMIN || $role == ROLE_SUPER_ADMIN)
					{
				?>
					<li class="treeview">
					  <a href="javascript:void(0)">
						<i class="fa fa-pencil-square-o"></i>
						<span>Frontend Settings</span>
						<span class="pull-right-container">
						  <i class="fa fa-angle-left pull-right"></i>
						</span>
					  </a>
					  <ul class="treeview-menu">
				        <?php if($role == ROLE_SUPER_ADMIN): ?>
						<li><a href="<?=base_url()?>admin/top-header"><i class="fa fa-circle-o"></i> Top Header</a></li>
						<li><a href="<?=base_url()?>admin/bottom-footer"><i class="fa fa-circle-o"></i> Bottom Footer</a></li>
						<?php endif; ?>
						<li><a href="<?=base_url()?>admin/header-menu"><i class="fa fa-circle-o"></i> Header Menu</a></li>
					  </ul>
					</li>
				<?php 
					}
				?>
				<li class="treeview">
				  <a href="javascript:void(0)">
					<i class="fa fa-clipboard"></i>
					<span>Pages</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="<?=base_url()?>admin/new-page"><i class="fa fa-circle-o"></i> New Page</a></li>
					<li><a href="<?=base_url()?>admin/pages"><i class="fa fa-circle-o"></i> Pages</a></li>
					<?php if($role == ROLE_SUPER_ADMIN): ?>
						<li><a href="<?=base_url()?>admin/sections"><i class="fa fa-circle-o"></i> Sections</a></li>
					<?php endif; ?>
				  </ul>
				</li>
				<li class="treeview">
				  <a href="javascript:void(0)">
					<i class="fa fa-clipboard"></i>
					<span>Contact</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="<?=base_url()?>admin/contact_list"><i class="fa fa-circle-o"></i> Contact list</a></li>
					
				  </ul>
				</li>
				<li class="treeview">
				  <a href="javascript:void(0)">
					<i class="fa fa-barcode"></i>
					<span>Products</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="<?=base_url()?>admin/add-product"><i class="fa fa-circle-o"></i> New Product</a></li>
					<li><a href="<?=base_url()?>admin/products"><i class="fa fa-circle-o"></i> Products</a></li>
					<li><a href="<?=base_url()?>admin/related-products"><i class="fa fa-circle-o"></i> Related Products</a></li>
				  
					<li><a href="<?=base_url()?>admin/properties-master"><i class="fa fa-circle-o"></i> Properties Master</a></li>
				  </ul>
				</li>
				<li class="treeview">
				  <a href="javascript:void(0)">
					<i class="fa fa-code"></i>
					<span>Categories</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="<?=base_url()?>admin/categories"><i class="fa fa-circle-o"></i> Categories</a></li>
					<li><a href="<?=base_url()?>admin/sub-categories"><i class="fa fa-circle-o"></i> Sub-Categories</a></li>
					<li><a href="<?=base_url()?>admin/child-categories"><i class="fa fa-circle-o"></i> Child-Categories</a></li>
					<li><a href="<?=base_url()?>admin/brands"><i class="fa fa-circle-o"></i> Brands</a></li>
				  </ul>
				</li>
				<li class="treeview">
				  <a href="javascript:void(0)">
					<i class="fa fa-ticket"></i>
					<span>Tickets</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="<?=base_url()?>admin/contact-form"><i class="fa fa-circle-o"></i> Contact Form</a></li>
					<?php if(0 == 1): ?>
						<li><a href="<?=base_url()?>admin/order-help-center"><i class="fa fa-circle-o"></i> Order Help Center</a></li>
						<li><a href="<?=base_url()?>admin/product-enquiry"><i class="fa fa-circle-o"></i> Product Enquiry</a></li>
					<?php endif; ?>
				  </ul>
				</li>
            <?php
            if($role == ROLE_ADMIN || $role == ROLE_SUPER_ADMIN || $role == ROLE_MANAGER)
            {
            ?>
				<li class="treeview">
				  <a href="<?=base_url()?>admin/orders" >
					<i class="fa fa-file"></i>
					<span>Orders</span>
				  </a>
				</li>
				<li class="treeview">
				  <a href="<?=base_url()?>admin/orders-transactions" >
					<i class="fa fa-money"></i>
					<span>Transactions</span>
				  </a>
				</li>
				<li class="treeview">
				  <a href="<?=base_url()?>admin/customers" >
					<i class="fa fa-users"></i>
					<span>Customers</span>
				  </a>
				</li>
            <?php
            }
            if($role == ROLE_ADMIN || $role == ROLE_SUPER_ADMIN)
            {
            ?>
				<li class="treeview">
				  <a href="<?=base_url()?>admin/userListing" >
					<i class="fa fa-users"></i>
					<span>Users</span>
				  </a>
				</li>
				<li class="treeview">
				  <a href="javascript:void(0)">
					<i class="fa fa-file-text-o"></i>
					<span>Reports</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="<?=base_url()?>admin/customers-report"><i class="fa fa-circle-o"></i> Customers</a></li>
					<li><a href="<?=base_url()?>admin/orders-report"><i class="fa fa-circle-o"></i> Orders</a></li>
					<li><a href="<?=base_url()?>admin/products-report"><i class="fa fa-circle-o"></i> Products</a></li>
				  </ul>
				</li>
				<?php if(0 == 1): ?>
				<li class="treeview">
				  <a href="<?=base_url()?>admin/coupons" >
					<i class="fa fa-bitcoin"></i>
					<span>Coupons</span>
				  </a>
				</li>		
				<?php endif; ?>
			<?php
            }
            ?>
			
			<li class="treeview">
			  <a href="javascript:void(0)">
				<i class="fa fa-book"></i>
				<span>Blogs</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="<?=base_url()?>admin/new-blog"><i class="fa fa-circle-o"></i> New Blog</a></li>
				<li><a href="<?=base_url()?>admin/list-blogs"><i class="fa fa-circle-o"></i> All Blogs</a></li>
			  </ul>
			</li>
			<li class="treeview">
			  <a href="<?=base_url()?>admin/newsletter" >
				<i class="fa fa-newspaper-o"></i>
				<span>Newsletter Subscribers</span>
			  </a>
			</li>
			<li class="treeview">
			  <a href="<?=base_url()?>admin/pincodes" >
				<i class="fa fa-phone"></i>
				<span>Pincodes</span>
			  </a>
			</li>
			<li class="treeview">
			  <a href="<?=base_url()?>admin/reviews" >
				<i class="fa fa-star"></i>
				<span>Reviews</span>
			  </a>
			</li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>