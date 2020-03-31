<div class="tab-pane" id="tab_image">
    <div class="box-body">
        <div class="form-group">
            <label><?php echo lang('form_favicon'); ?></label>
            <div class="input-group input-group-lg">
                                        <span class="input-group-addon" onclick="chooseImage('favicon')"
                                              data-toggle="tooltip" title="<?php echo lang('btn_select_image'); ?>"><i
                                                class="fa fa-fw fa-image"></i></span>
                <input id="favicon" name="favicon"
                       value="<?php echo isset($favicon) ? $favicon : ''; ?>"
                       placeholder="<?php echo lang('form_favicon'); ?>" class="form-control"
                       type="text"/>
                <span class="input-group-addon"><a class="fancybox"
                                                   href="<?php echo getImageThumb(isset($favicon) ? $favicon : '') ?>"
                                                   title="Click để xem ảnh"> <img
                            src="<?php echo getImageThumb(isset($favicon) ? $favicon : '') ?>"
                            width="30"></a> </span>
            </div>
        </div>
        <div class="form-group">
            <label><?php echo lang('form_logo'); ?></label>
            <div class="input-group input-group-lg">
                                        <span class="input-group-addon" onclick="chooseImage('logo')"
                                              data-toggle="tooltip" title="<?php echo lang('btn_select_image'); ?>"><i
                                                class="fa fa-fw fa-image"></i></span>
                <input id="logo" name="logo" value="<?php echo isset($logo) ? $logo : ''; ?>"
                       placeholder="<?php echo lang('form_logo'); ?>" class="form-control"
                       type="text"/>
                <span class="input-group-addon"><a class="fancybox"
                                                   href="<?php echo getImageThumb(isset($logo) ? $logo : '') ?>"
                                                   title="Click để xem ảnh"> <img
                            src="<?php echo getImageThumb(isset($logo) ? $logo : '', 64, 45) ?>"
                            width="30"> </a></span>
            </div>
        </div>
        <div class="form-group">
            <label>Logo Footer</label>
            <div class="input-group input-group-lg">
                                        <span class="input-group-addon" onclick="chooseImage('logo_footer')"
                                              data-toggle="tooltip" title="<?php echo lang('btn_select_image'); ?>"><i
                                                class="fa fa-fw fa-image"></i></span>
                <input id="logo_footer" name="logo_footer"
                       value="<?php echo isset($logo_footer) ? $logo_footer : ''; ?>"
                       placeholder="Logo Footer"
                       class="form-control" type="text"/>
                <span class="input-group-addon"><a class="fancybox"
                                                   href="<?php echo getImageThumb(isset($logo_footer) ? $logo_footer : '') ?>"
                                                   title="Click để xem ảnh"> <img
                            src="<?php echo getImageThumb(isset($logo_footer) ? $logo_footer : '', 64, 45) ?>"
                            width="30"> </a></span>
            </div>
        </div>
    </div>
</div>