<div class="tab-pane" id="tab_branding">
  <ul class="nav nav-tabs">
    <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
      <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>><a
      href="#tab_mvv_<?php echo $lang_code; ?>"
      data-toggle="tab"><img
      src="<?php echo $this->templates_assets; ?>/flag/<?php echo $lang_code ?>.png"> <?php echo $lang_name; ?>
    </a></li>
  <?php } ?>
</ul>
<div class="tab-content">
  <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
    <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>"
     id="tab_mvv_<?php echo $lang_code; ?>">
     <div class="box-body">
      <div class="form-group">
        <label>Tầm nhìn</label>
        <div class="row-fluid">
          <div class="col-md-4" style="padding: 0">
            <input type="text" name="vision[<?php echo $lang_code ?>][title]" value="<?php echo isset($vision[$lang_code]['title']) ? $vision[$lang_code]['title'] : ''; ?>" class="form-control">
          </div>
          <div class="col-md-8">
            <input type="text" name="vision[<?php echo $lang_code ?>][content]" value="<?php echo isset($vision[$lang_code]['content']) ? $vision[$lang_code]['content'] : ''; ?>" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Sứ mệnh</label>
        <div class="row-fluid">
          <div class="col-md-4" style="padding: 0">
            <input type="text" name="mission[<?php echo $lang_code ?>][title]" value="<?php echo isset($mission[$lang_code]['title']) ? $mission[$lang_code]['title'] : ''; ?>" class="form-control">
          </div>
          <div class="col-md-8">
            <input type="text" name="mission[<?php echo $lang_code ?>][content]" value="<?php echo isset($mission[$lang_code]['content']) ? $mission[$lang_code]['content'] : ''; ?>" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Giá trị cốt lõi</label>
        <div class="row-fluid" style="padding-right:15px">
          <input type="text" class="form-control" name="value[<?php echo $lang_code ?>][title]" value="<?php echo isset($value[$lang_code]['title']) ? $value[$lang_code]['title'] : ''; ?>"
          style="margin-bottom: 10px">
          <input type="text" class="form-control" name="value[<?php echo $lang_code ?>][sub]" value="<?php echo isset($value[$lang_code]['sub']) ? $value[$lang_code]['sub'] : ''; ?>" style="margin-bottom: 10px">
          <textarea name="value[<?php echo $lang_code ?>][content]" class="form-control tinymce" cols="30" rows="5"><?php echo isset($value[$lang_code]['content']) ? $value[$lang_code]['content'] : ''; ?></textarea>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

</div>

</div>

