<?php if (isset($data['id'])) $id = $data['id']; ?>
<?php if (isset($data['meta_key'])) $meta_key = $data['meta_key'];
?>
<fieldset>
  <div class="col-md-12">
    <div class="tab-content">
      <div class="tab-pane active">
        <div class="row _flex" style="">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Ngân hàng"
                     name="<?php echo $meta_key; ?>[<?php echo $meta_key . $id ?>][code]" id=""
                     value="<?php echo !empty($item->code) ? $item->code : ''; ?>">
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <textarea name="<?php echo $meta_key; ?>[<?php echo $meta_key . $id ?>][content]" class="form-control tinymce" ><?php echo !empty($item->content) ? $item->content : ''; ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <i class="glyphicon glyphicon-trash removeInput" onclick="removeInputImage(this)"></i>

</fieldset>