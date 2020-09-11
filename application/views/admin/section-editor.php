<?php $record = $records[0]; ?>
<div class="content-wrapper">
    
    <section class="content">
		<div class="row">
			<div class="col-md-12"> 
				<div class="card">
					<div class="card-header">
						<div class="box box-primary">
							<div class="box-body">
								<div class="col-md-6 text-left">
									<h4>Section Order</h4>
								</div>
								<div class="col-md-6 text-right">
									<a class="btn btn-primary btn-sm" id="btnsave"> Update</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-block">
						<div class="row">
							<div class="col-md-12">
								<form name="page_section_form" action="#">
									<input type="hidden" value="<?=$record->id?>" name="page_id">
									<ul id="sortable" class="list-group">
										<?php foreach($page_sections as $page_section): ?>
											<li class="list-group-item">
												<div class="col-md-9">
													<span> <?php echo $page_section->section_code; ?> - <?php echo $this->common_model->get_section_name($page_section->section_code); ?> </span>
													<input type="hidden" value="<?=$page_section->section_code?>" name="section_code[]">
													<input type="hidden" value="<?=$page_section->id?>" name="row_id[]">
												</div>
												<div class="col-md-3 text-right">
													<a class="btn btn-sm btn-warning" target="_blank" href="<?=base_url()?>admin/page/section/<?=$page_section->page_id?>/<?=$page_section->section_code?>">Edit <i class="fa fa-external-link"></i></a>
													<span class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-close"></i></span>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</form>
							</div>
						</div>
					</div>
					<div class="card-header">
						
					</div>
				</div> 
			</div>  
        </div>  
    </section>
</div>

<a style="bottom: 80px;right: 20px;position: fixed;" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i></a>


	<div class="modal fade" id="modal-default">
	  <div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="#" this_id="form-002" class="add_section" method="post" role="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Add Section</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<?php foreach($sections as $section): ?>
							<div class="well" onclick="$('input[name=section_code1]').val('<?=$section->section_code?>');$('input[name=section_name2]').val('<?=$section->name?>');$('.well').removeClass('focusClass');$(this).addClass('focusClass');">
								<img class="w--100" src="<?=base_url()?>uploads/sections/<?=$section->image?>">
								<span><?=$section->section_code?> - <?=$section->name?></span>
							</div>
						<?php endforeach; ?>
						<input type="hidden" value="" name="section_code1">
						<input type="hidden" value="" name="section_name2">
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default pull-left" data-dismiss="modal" value="Close">
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>
	

	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js" charset="utf-8"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(function(){
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	});
  
	$('.add_section').submit(function(e){
		e.preventDefault();
		
		$('#sortable').append('	<li class="list-group-item">'+
									'<div class="col-md-9">'+
										'<span> ' + $("input[name=section_code1]").val() + ' - ' + $( "input[name=section_name2]" ).val() + ' </span>'+
										'<input type="hidden" value="' + $("input[name=section_code1]").val() + '" name="section_code[]">'+
										'<input type="hidden" value="0" name="row_id[]">'+
									'</div>'+
									'<div class="col-md-3 text-right">'+
										'<span class="btn btn-sm btn-danger" onclick="removebtn(this)"><i class="fa fa-close"></i></span>'+
									'</div>'+
								'</li>');
		toastr.success('Menu added!');
		$(".select2").val('').trigger('change')
		
	});
  
	function removebtn(tis)
	{
		$(tis).parents('li').remove();
	}
	
	$('#btnsave').click(function(){
		
		if($('#sortable li').length > 0)
		{
			$.ajax({
				type: 'POST',
				url: baseURL + "admin/update_page_sections",
				data: $('form[name=page_section_form]').serialize(),
				dataType: "json",
				beforeSend: function() {
					$('#btnsave').attr('disabled', 'true');
				},
				success: function(response){
					console.log(response)
					if(response.result == 1)
					{
						toastr.success('Success!');
						$('#btnsave').removeAttr('disabled');
					}
					else
					{
						toastr.error('Something went wrong! Please try again later!');
						$('#btnsave').removeAttr('disabled');
					}
				}
			});
		}
		else
		{
			toastr.error('Add at least one!');
		}
	});
	
</script>