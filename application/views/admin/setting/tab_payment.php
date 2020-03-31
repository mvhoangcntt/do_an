<div class="tab-pane" id="tab_payment">

  <fieldset class="form-group album-contain">
    <legend for="">Thông tin thẻ ngân hàng</legend>
    <?php
    $totalListPayment = 0;
    if (!empty($listpayment)):
      $totalListPayment = getNumberics($listpayment);
    endif;
    ?>
    <div data-id="<?php echo $totalListPayment ?>" id="listpayment">
      <?php if (!empty($listpayment)) foreach ($listpayment as $i => $item):
        ?>
        <fieldset>
          <div class="col-md-12">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="row _flex" style="">
                  <div class="col-md-4">
                    <div class="form-group">
                      
                    </div>
                    <input type="text"
                           name="listpayment[<?php echo $i; ?>][code]"
                           class="form-control"
                           placeholder="Ngân hàng"
                           value="<?php echo !empty($item['code']) ? $item['code'] : ''; ?>">
                  </div>
                  <div class="col-md-8">
                    <textarea name="listpayment[<?php echo $i; ?>][content]" class="form-control tinymce" ><?php echo !empty($item['content']) ? $item['content'] : ''; ?></textarea>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <i class="glyphicon glyphicon-trash removeInput" onclick="removeInputImage(this)"></i>
        </fieldset>
      <?php endforeach; ?>
    </div>
    <button type="button" class="btn btn-primary btnAddMore"
            onclick="addInputElementSettings('listpayment',document.getElementById('listpayment').getAttribute('data-id'),null,'ajax_load_listpayment','tinymce')">
      <i class="fa fa-plus"> <?php echo lang('btn_add'); ?>
      </i></button>
  </fieldset>
</div>