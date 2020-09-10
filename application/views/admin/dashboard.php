<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small><?=$this->config->item('app_name')?></small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?=sizeof($this->common_model->get_records("tbl_orders", "status = '0' and is_paid = '1'"))?></h3>
                  <p>Total Paid Orders</p>
                </div>
                <a href="<?=base_url()?>admin/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?=sizeof($this->common_model->get_records("tbl_orders", "status = '0' and is_paid = '0'"))?></h3>
                  <p>Total Unpaid Orders</p>
                </div>
                <a href="<?=base_url()?>admin/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
					<h3>
						₹<?=number_format($this->common_model->get_record("tbl_orders", "status = '0' and is_paid = '1'", "sum(total)"), 2)?>
					</h3>
					<p>Total Paid Orders Worth</p>
                </div>
                <a href="<?=base_url()?>admin/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>
					₹<?=number_format($this->common_model->get_record("tbl_orders", "status = '0' and is_paid = '0'", "sum(total)"), 2)?>
				  </h3>
                  <p>Total Unpaid Orders Worth</p>
                </div>
                <a href="<?=base_url()?>admin/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
		</div>
		<div class="row">
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?=sizeof($this->common_model->get_records("tbl_general_users", "status = '0'"))?></h3>
                  <p>Users</p>
                </div>
                <a href="<?=base_url()?>admin/customers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
		</div>
		<div class="row">
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?=sizeof($countofproduct)?></h3>
                  <p>Total Products</p>
                </div>
                <a href="<?=base_url()?>admin/products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?=sizeof($countofcategory)?></h3>
                  <p>Total Categories</p>
                </div>
                <a href="<?=base_url()?>admin/categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?=sizeof($countofsubcategory)?></h3>
                  <p>Total Sub-Categories</p>
                </div>
                <a href="<?=base_url()?>admin/sub-categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?=sizeof($countofchildcategory)?></h3>
                  <p>Total Child-Categories</p>
                </div>
                <a href="<?=base_url()?>admin/child-categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>
    </section>
</div>