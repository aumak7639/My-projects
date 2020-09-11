	<form this_id="form-00<?=uniqid()?>" class="update_data" method="post" role="form" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="slug">Highlight Product</label>
					<select class="form-control" name="highlight">
						<option <?php if("no" == $record->highlight){ echo "selected"; } ?> value="active">No Hightlight</option>
						<option <?php if("featured" == $record->highlight){ echo "selected"; } ?> value="featured">Featured</option>
						<option <?php if("sale" == $record->highlight){ echo "selected"; } ?> value="sale">Sale</option>
						<option <?php if("offer" == $record->highlight){ echo "selected"; } ?> value="offer">Offer</option>
						<option <?php if("deal" == $record->highlight){ echo "selected"; } ?> value="deal">Deal</option>
					</select>
					<span class="text-danger error-span">This input is required.</span>
					<input type="hidden" value="tbl_product" name="table_name">
					<input type="hidden" value="<?=$record->id?>" name="row_id">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="badge_title_1"><i class="fa fa-truck" aria-hidden="true"></i> Title</label>
					<input class="form-control" name="badge_title_1" type="text" value="<?=$record->badge_title_1?>">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="badge_description_1"><i class="fa fa-truck" aria-hidden="true"></i> Short Description</label>
					<input class="form-control" name="badge_description_1" type="text" value="<?=$record->badge_description_1?>">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="badge_title_2"><i class="fa fa-wrench" aria-hidden="true"></i> Title</label>
					<input class="form-control" name="badge_title_2" type="text" value="<?=$record->badge_title_2?>">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="badge_description_2"><i class="fa fa-wrench" aria-hidden="true"></i> Short Description</label>
					<input class="form-control" name="badge_description_2" type="text" value="<?=$record->badge_description_2?>">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="badge_title_3"><i class="fa fa-life-ring" aria-hidden="true"></i> Title</label>
					<input class="form-control" name="badge_title_3" type="text" value="<?=$record->badge_title_3?>">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="badge_description_3"><i class="fa fa-life-ring" aria-hidden="true"></i> Short Description</label>
					<input class="form-control" name="badge_description_3" type="text" value="<?=$record->badge_description_3?>">
					<span class="text-danger error-span">This input is required.</span>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary pull-right">Save</button>
			</div>
		</div>
	</form>
