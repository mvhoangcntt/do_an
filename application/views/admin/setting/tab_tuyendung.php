<div class="tab-pane" id="tab_tuyendung">
  <div class="box-body">
    <fieldset class="form-group album-contain">
      <div class="row">
        <div class="col-md-12">
          <label>Quy trình tuyển dụng</label>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-6 ">
              <input type="text" name="link_quy_trinh_tuyen_dung" value="<?php echo !empty($link_quy_trinh_tuyen_dung)?$link_quy_trinh_tuyen_dung:'' ?>" class="form-control " style="height: 46px;"
                     placeholder="Link Quy trình">
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-lg ">
        <span class="input-group-addon" onclick="chooseImage('thumb_td1')"
              data-toggle="tooltip" title="<?php echo lang('btn_select_image'); ?>">
          <i class="fa fa-fw fa-image"></i>
        </span>
                <input id="thumb_td1" name="thumb_td1" value="<?php echo isset($thumb_td1) ? $thumb_td1 : ''; ?>"
                       placeholder="Ảnh đại diện" class="form-control"
                       type="text"/>
                <span class="input-group-addon">
          <a class="fancybox" href="<?php echo getImageThumb(isset($thumb_td1) ? $thumb_td1 : '') ?>"
             title="Click để xem ảnh"> <img
                src="<?php echo getImageThumb(isset($thumb_td1) ? $thumb_td1 : '', 64, 45) ?>"
                width="30">
          </a>
              </span>
              </div>
            </div>

          </div>
        </div>

        <div class="col-md-12">
          <label>Tại sao chọn TLE</label>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-6 ">
              <input type="text" name="link_tao_sao_chon_tle" value="<?php echo !empty($link_tao_sao_chon_tle)?$link_tao_sao_chon_tle:'' ?>" class="form-control " style="height: 46px;"
                     placeholder="Link Tại sao chọn TLE">
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-lg ">
        <span class="input-group-addon" onclick="chooseImage('thumb_td2')"
              data-toggle="tooltip" title="<?php echo lang('btn_select_image'); ?>">
          <i class="fa fa-fw fa-image"></i>
        </span>
                <input id="thumb_td2" name="thumb_td2" value="<?php echo isset($thumb_td2) ? $thumb_td2 : ''; ?>"
                       placeholder="Ảnh đại diện" class="form-control"
                       type="text"/>
                <span class="input-group-addon">
          <a class="fancybox" href="<?php echo getImageThumb(isset($thumb_td2) ? $thumb_td2 : '') ?>"
             title="Click để xem ảnh"> <img
                src="<?php echo getImageThumb(isset($thumb_td2) ? $thumb_td2 : '', 64, 45) ?>"
                width="30"> </a></span>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-12">
          <label>Câu hỏi thường gặp</label>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-6 ">
              <input type="text" name="cauhoithuonggap" value="<?php echo !empty($cauhoithuonggap)?$cauhoithuonggap:'' ?>" class="form-control " style="height: 46px;"
                     placeholder="Link Câu hỏi thường gặp">
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-lg ">
        <span class="input-group-addon" onclick="chooseImage('thumb_td3')"
              data-toggle="tooltip" title="<?php echo lang('btn_select_image'); ?>">
          <i class="fa fa-fw fa-image"></i>
        </span>
                <input id="thumb_td3" name="thumb_td3" value="<?php echo isset($thumb_td3) ? $thumb_td3 : ''; ?>"
                       placeholder="Ảnh đại diện" class="form-control"
                       type="text"/>
                <span class="input-group-addon">
          <a class="fancybox" href="<?php echo getImageThumb(isset($thumb_td3) ? $thumb_td3 : '') ?>"
             title="Click để xem ảnh"> <img
                src="<?php echo getImageThumb(isset($thumb_td3) ? $thumb_td3 : '', 64, 45) ?>"
                width="30"> </a></span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </fieldset>
  </div>
</div>
