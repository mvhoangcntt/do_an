<div class="tab-pane" id="tab_feedback">

  <fieldset class="form-group album-contain">
    <legend>Ý kiến khách hàng</legend>
    <?php
    $totalFeedback = 0;
    if (!empty($feedback)):
      $totalFeedback = getNumberics($feedback);
//    dd($_certificate);
    endif;
    ?>
    <div data-id="<?php echo $totalFeedback ?>" id="feedback">
      <?php if (!empty($feedback)) foreach ($feedback as $key => $item):
        ?>
        <fieldset>
          <div class="tab-pane _flex" id="tab_history">
            <div class="col-md-12">
              <ul class="nav nav-tabs">
                <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                  <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>>
                    <a href="#tab_<?php echo $lang_code . $key; ?>" data-toggle="tab">
                      <?php echo $lang_name; ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
              <div class="tab-content">
                <?php
                foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                  <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>"
                       id="tab_<?php echo $lang_code . $key ?>">
                    <div class="row" style="">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control"
                                 name="feedback[<?php echo $key ?>][<?php echo $lang_code ?>][name]" id=""
                                 value="<?php echo !empty($item[$lang_code]['name']) ? $item[$lang_code]['name'] : ''; ?>">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control"
                                 name="feedback[<?php echo $key ?>][<?php echo $lang_code ?>][position]" id=""
                                 value="<?php echo !empty($item[$lang_code]['position']) ? $item[$lang_code]['position'] : ''; ?>">
                        </div>
                        <input type="text" class="form-control"
                               name="feedback[<?php echo $key ?>][<?php echo $lang_code ?>][company]" id=""
                               value="<?php echo !empty($item[$lang_code]['company']) ? $item[$lang_code]['company'] : ''; ?>">
                      </div>

                      <div class="col-md-6">
                        <textarea class="form-control" rows="6"
                                  name="feedback[<?php echo $key ?>][<?php echo $lang_code ?>][content]"
                                  placeholder="Nội dung"><?php echo !empty($item[$lang_code]['content']) ? $item[$lang_code]['content'] : ''; ?></textarea>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <i class="glyphicon glyphicon-trash removeInput" onclick="removeInputImage(this)"></i>
        </fieldset>
      <?php endforeach; ?>
    </div>
    <button type="button" class="btn btn-primary btnAddMore"
            onclick="addInputElementSettings('feedback',document.getElementById('feedback').getAttribute('data-id'),null,'ajax_load_feedback')">
      <i class="fa fa-plus"> <?php echo lang('btn_add'); ?>
      </i></button>
  </fieldset>

  <fieldset class="form-group album-contain">
    <legend for="">Chứng nhận</legend>
    <?php
    $totalItemSlide = 0;
    if (!empty($_certificate)):
      $totalItemSlide = getNumberics($_certificate);
    endif;
    ?>
    <div data-id="<?php echo $totalItemSlide ?>" id="_certificate">
      <?php if (!empty($_certificate)) foreach ($_certificate as $i => $item):
        ?>
        <fieldset>
          <div class="tab-pane" id="tab_store">
            <ul class="nav nav-tabs">
              <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>>
                  <a href="#tab_<?php echo $lang_code . $i; ?>" data-toggle="tab">
                    <?php echo $lang_name; ?>
                  </a>
                </li>
              <?php } ?>
            </ul>
            <div class="tab-content">
              <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>"
                     id="tab_<?php echo $lang_code . $i; ?>">
                  <fieldset style="width: 100%">
                    <div class="row _flex">
                      <div class="col-md-7">
                        <input type="text"
                               name="_certificate[<?php echo $i; ?>][<?php echo $lang_code ?>][title]"
                               class="form-control"
                               placeholder="Tiêu đề"
                               value="<?php echo !empty($item[$lang_code]['title']) ? $item[$lang_code]['title'] : ''; ?>">
                      </div>

                      <div class="col-md-5 _flex">
                        <input onclick="chooseImage('_certificate_<?php echo $lang_code . $i; ?>')"
                               id="_certificate_<?php echo $lang_code . $i; ?>"
                               name="_certificate[<?php echo $i; ?>][<?php echo $lang_code ?>][img]"
                               value="<?php echo !empty($item[$lang_code]['img']) ? $item[$lang_code]['img'] : ''; ?>"
                               class="form-control" type="" style="width: 70%;float: left" />
                        <img onclick="chooseImage('_certificate_<?php echo $lang_code . $i; ?>')"
                             src="<?php echo isset($item[$lang_code]['img']) ? getImageThumb($item[$lang_code]['img']) : 'http://via.placeholder.com/100x50'; ?>"
                             alt="" height="50" style="float: right;margin-left: 15px">
                      </div>
                    </div>
                  </fieldset>
                </div>
              <?php } ?>
            </div>
          </div>

          <i class="glyphicon glyphicon-trash removeInput" onclick="removeInputImage(this)"></i>
        </fieldset>
      <?php endforeach; ?>
    </div>
    <button type="button" class="btn btn-primary btnAddMore"
            onclick="addInputElementSettings('_certificate',document.getElementById('_certificate').getAttribute('data-id'),null,'ajax_load_item_certificate')">
      <i class="fa fa-plus"> <?php echo lang('btn_add'); ?>
      </i></button>
  </fieldset>
</div>