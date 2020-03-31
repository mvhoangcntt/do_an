<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
?>
<div class="col-sm-7 col-xs-12">
  <?php
  if (in_array($controller, ['orders','myproduct','category', 'post', 'product', 'banner', 'tour', 'voucher', 'project', 'report', 'course'])):

    ?>
    <?php if ($controller != 'myproduct' && $controller != 'orders') { ?>
		<div class="col-md-4">
			<div class="form-group">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-filter"></i></span>
				<select class="form-control select2 filter_category" title="filter_category_id" name="category_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
				  <option value="0"><?php echo lang('from_category'); ?></option>
				</select>
			  </div>
			</div>
		</div>
	<?php } ?>

	<?php if ($controller == 'orders') { ?>
		<div class="col-md-4">
			<div class="form-group">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-filter"></i></span>
				<select class="form-control select2 filter_category" title="filter_category_id" name="category_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
				  <option value="0"><?php echo lang('form_trangthai'); ?></option>
				</select>
			  </div>
			</div>
		</div>
	<?php } ?>
	<?php if ($controller == 'myproduct') { ?>
		<div class="col-md-4">
			<div class="form-group">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-filter"></i></span>
				<select class="form-control select2 filter_catalog catalog" title="filter_category_id" name="filter_catalog" style="width: 100%;" tabindex="-1" aria-hidden="true">
				  <option value="0"><?php echo lang('form_catalog'); ?></option>
				</select>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-filter"></i></span>
				<select class="form-control select2 filter_maker_id maker" title="filter_category_id" name="filter_maker_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
				  <option value="0"><?php echo lang('form_maker'); ?></option>
				</select>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			  <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-filter"></i></span>
				<select class="form-control select2 filter_category" title="filter_category_id" name="filter_size" style="width: 100%;" tabindex="-1" aria-hidden="true">
				  <option value="0"><?php echo lang('form_size'); ?></option>
				</select>
			  </div>
			</div>
		</div>
	<?php } ?>
  <?php endif; ?>
</div>
