<div class="tab-pane" id="tab_footer">

  <div class="row">
    <div class="col-xs-12">
      <div class="form-group">
        <label>Tên công ty</label>
        <input name="name_company" class="form-control" placeholder="Tên công ty"
        value="<?php echo !empty($name_company) ? $name_company : ''; ?>">
      </div>
      <div class="form-group">
        <label>Hotline</label>
        <input name="hotline" class="form-control" placeholder="Số điện thoại"
        value="<?php echo !empty($hotline) ? $hotline : ''; ?>">
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input name="phone" class="form-control" placeholder="Số điện thoại"
        value="<?php echo !empty($phone) ? $phone : ''; ?>">
      </div>
      <div class="form-group">
        <label>Fax</label>
        <input name="fax" class="form-control" placeholder="Số điện thoại"
        value="<?php echo !empty($fax) ? $fax : ''; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input name="email" class="form-control" placeholder="Email"
        value="<?php echo !empty($email) ? $email : ''; ?>">
      </div>
      <div class="form-group">
        <label>Trụ sở</label>
        <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
          <input name="truso[<?php echo $lang_code ?>]" class="form-control" placeholder="<?php echo $lang_name?>"
          value="<?php echo !empty($truso[$lang_code]) ? $truso[$lang_code] : ''; ?>" style="margin-bottom: 10px">

        <?php } ?>
        
      </div>
      <div class="form-group">
        <label>Website</label>
        <input name="website" class="form-control" placeholder="Website"
        value="<?php echo !empty($website) ? $website : ''; ?>">
      </div>
      <div class="form-group">
        <label>Link map</label>
        <input name="link_map" class="form-control" placeholder="Link tới google map"
        value="<?php echo !empty($link_map) ? $link_map : ''; ?>">
      </div>
      <div class="form-group">
        <label>Fanpage</label>
        <textarea name="fanpage" id="" class="form-control"
        style="height: 70px"><?php echo isset($fanpage) ? trim($fanpage) : ''; ?></textarea>
      </div>
    </div>
  </div>
</div>
