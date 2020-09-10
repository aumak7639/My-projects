<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3>Guide</h3>
		</div>
	</div>
	
	<div class="box-body">
		<img src="<?=base_url()?>uploads/sections/<?=$this->common_model->get_record('tbl_sections', "section_code='$section_code'", "guide_image")?>" class="w--100">
	</div>
</div>
<?php $arr = array(); ?>
<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/1.jpg" width="50"> Title</h3>
			<hr>
		</div>
	</div>
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['title'] = "Title";
		$arr['option_name'] = "row_title";
		$tis->load->view('admin/sections/includes/title-input.php', $arr); 
	?>
	
</div>
<?php $arr = array(); ?>
<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/2.jpg" width="50"> Tab 1</h3>
			<hr>
		</div>
	</div>
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['title'] = "Tab 1 Title";
		$arr['option_name'] = "tab1_title";
		$tis->load->view('admin/sections/includes/title-input.php', $arr); 
	?>
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['tab_name'] = "tab1";
		$tis->load->view('admin/sections/includes/product-listing-input.php', $arr); 
	?>
	
	
</div>

<?php $arr = array(); ?>

<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/2.jpg" width="50"> Tab 2</h3>
			<hr>
		</div>
	</div>
	
	
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['title'] = "Tab 2 Title";
		$arr['option_name'] = "tab2_title";
		$tis->load->view('admin/sections/includes/title-input.php', $arr); 
	?>
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['tab_name'] = "tab2";
		$tis->load->view('admin/sections/includes/product-listing-input.php', $arr); 
	?>
	
	
	
</div>


<?php $arr = array(); ?>

<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/2.jpg" width="50"> Tab 3</h3>
			<hr>
		</div>
	</div>
	
	
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['title'] = "Tab 3 Title";
		$arr['option_name'] = "tab3_title";
		$tis->load->view('admin/sections/includes/title-input.php', $arr); 
	?>
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['tab_name'] = "tab3";
		$tis->load->view('admin/sections/includes/product-listing-input.php', $arr); 
	?>
	
	
	
</div>

<?php $arr = array(); ?>

<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/2.jpg" width="50"> Tab 4</h3>
			<hr>
		</div>
	</div>
	
	
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['title'] = "Tab 4 Title";
		$arr['option_name'] = "tab4_title";
		$tis->load->view('admin/sections/includes/title-input.php', $arr); 
	?>
	
	<?php
		$arr['page_section_id'] = $page_section_id;
		$arr['tab_name'] = "tab4";
		$tis->load->view('admin/sections/includes/product-listing-input.php', $arr);  
	?>
	
	
	
</div>

	