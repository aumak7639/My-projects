<div class="content-wrapper">
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table">
					<thead>
						<tr>
							<th>Sl. No.</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Price</th>
							<th class="text-center">Top Selling Products</th>
							<th class="text-center">Actions</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($records))
						{
							$inc = 1;
							foreach($records as $record)
							{
						?>
						<tr>
							<td><?php echo $inc; ?></td>
							<td>
								<a target="_blank" href="<?=base_url()?><?=$record->slug?>">
									<?php echo $record->name ?>
								</a>
							</td>
							<td>
								<ul>
									<li>
										<a target="_blank" href="<?=base_url()?><?=$this->common_model->get_record("tbl_category", "id='" . $record->category . "'", "slug")?>">
											<?php echo $this->common_model->get_category_name($record->category) ?>
										</a>
										(Parent)
									</li>
									<li>
										<a target="_blank" href="<?=base_url()?><?=$this->common_model->get_record("tbl_sub_category", "id='" . $record->sub_category . "'", "slug")?>">
											<?php echo $this->common_model->get_sub_category_name($record->sub_category) ?> 
										</a>
										(Sub)
									</li>
									<li>
										<a target="_blank" href="<?=base_url()?><?=$this->common_model->get_record("tbl_child_category", "id='" . $record->child_category . "'", "slug")?>">
											<?php echo $this->common_model->get_child_category_name($record->child_category) ?> 
										</a>
										(Child)
									</li>
								</ul>
							</td>
							<td>₹ <?php echo $record->price ?></td>
							<td>
							<a class="btn btn-sm <?php if($record->is_topselling=='0'){echo "btn-success";}else{echo "btn-danger ";}?>" onclick="statusChange(this,<?= $record->id;?>,<?=$record->is_topselling?>,'is_topselling','tbl_product')"
                                           href="#"
                                            data-table="tbl_product" data-id="<?php echo $record->id; ?>"><i
                                                class="fa <?php if($record->is_featured=='0'){echo "fa-check";}else{echo "fa-times";}?>"></i></a>
							</td>

							<td class="text-center">
								<a class="btn btn-sm btn-info" href="<?=base_url()?>admin/product/<?=$record->id?>"><i class="fa fa-pencil"></i></a>
							</td>
							<td class="text-center">
								<form id="product_status_form_<?=$inc?>" class="update_data">
									<select class="form-control" name="product_status" onchange="$('#product_status_form_<?=$inc?>').submit();">
										<option <?=($record->product_status=="pending"?"selected":"")?> value="pending"> Inactive</option>
										<option <?=($record->product_status=="approved"?"selected":"")?> value="approved"> Active</option>
									</select>
									<input value="tbl_product" name="table_name" type="hidden">
									<input value="<?=$record->id?>" name="row_id" type="hidden">
								</form>
							</td>
						</tr>
						<?php
							$inc++;
							}
						}
						?>
					</tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>