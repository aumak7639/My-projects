<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body table-responsive">
                  <table class="table table-hover data_table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone Number</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th class="text-center">Created On</th>
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
					            <a target="_blank" href="<?=base_url()?><?=$record->slug?>">
                                 <?= $record->email?>
			                    </a>
                            </td>
                            <td>
					            <a target="_blank" href="<?=base_url()?><?=$record->slug?>">
                                 <?= $record->phone_number?>
			                    </a>
                            </td>		
                            <td>
					            <a target="_blank" href="<?=base_url()?><?=$record->slug?>">
                                 <?= $record->subject?>
			                    </a>
                            </td>
                            <td>
					            <a target="_blank" href="<?=base_url()?><?=$record->slug?>">
                                 <?= $record->message?>
			                    </a>
                            </td>
                            <td>
					            <a target="_blank" href="<?=base_url()?><?=$record->slug?>">
                                 <?= $record->date_time?>
			                    </a>
                            </td>

							<!-- <td class="text-center">
								<a class="btn btn-sm btn-info" href="<?=base_url()?>admin/product/<?=$record->id?>"><i class="fa fa-pencil"></i></a>
							</td>-->
                            <td class="text-center">
								<form class="update_data" reload-action="true" this_id="form-990<?=uniqid()?>">
									<input type="hidden" value="<?=$record->id?>" name="row_id">
									<input type="hidden" value="tbl_contact_form" name="table_name">
									<input type="hidden" value="1" name="status">
									<button class="btn btn-sm btn-danger">Delete</button>
								</form>
							</td>
							<td class="text-center">
								<form id="status_form_<?=$inc?>" class="update_data">
									<select class="form-control" name="status" onchange="$('#status_form_<?=$inc?>').submit();">
										<option <?=($record->ticket_status=="pending"?"selected":"")?> value="pending"> Inactive</option>
										<option <?=($record->ticket_status=="approved"?"selected":"")?> value="approved"> Active</option>
									</select>
									<input value="tbl_contact_form" name="table_name" type="hidden">
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
