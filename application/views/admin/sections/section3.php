<div class="box box-primary">
	<div class="row">
		<div class="col-md-12 text-center">
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
			<?php
				$arr['page_section_id'] = $page_section_id;
				$arr['title'] = "Title";
				$arr['option_name'] = "tab1_title";
				$tis->load->view('admin/sections/includes/title-input.php', $arr); 
			?>
		</div>
	</div>
</div>

<?php $arr = array(); ?>

<div class="box box-primary">
	<div class="row">
		<div class="col-md-12">
			<h3><img src="<?=base_url()?>uploads/numbers/2.jpg" width="50"> Blocks</h3>
			<hr>
		</div>
	</div>
	<?php
		$arr['page_section_id'] = $page_section_id;
		$tis->load->view('admin/sections/includes/image-with-text-link-form.php', $arr); 
	?>
	<div class="box-body" data-table="tbl_image_with_link2" data-page-section-id="<?=$page_section_id?>">
		<?php
			$arr['page_section_id'] = $page_section_id;
			$tis->load->view('admin/sections/includes/list-image_with_text_link.php', $arr); 
		?>
	</div>
</div>
