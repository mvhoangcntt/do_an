<div class="tab-pane" id="tab_social">
    <div class="box-body">
        <div class="form-group">
            <label><?php echo lang('form_social_fb'); ?></label>
            <input name="social_fb" placeholder="<?php echo lang('form_social_fb'); ?>"
                   class="form-control" type="text"
                   value="<?php echo isset($social_fb) ? $social_fb : ''; ?>"/>
        </div>
        <div class="form-group">
            <label><?php echo lang('form_social_google'); ?></label>
            <input name="social_google"
                   placeholder="<?php echo lang('form_social_google'); ?>"
                   class="form-control" type="text"
                   value="<?php echo isset($social_google) ? $social_google : ''; ?>"/>
        </div>
        <div class="form-group">
            <label>instagram</label>
            <input name="social_instagram"
                   placeholder="instagram"
                   class="form-control" type="text"
                   value="<?php echo isset($social_instagram) ? $social_instagram : ''; ?>"/>
        </div>
        <div class="form-group">
            <label><?php echo lang('form_social_youtube'); ?></label>
            <input name="social_youtube"
                   placeholder="<?php echo lang('form_social_youtube'); ?>"
                   class="form-control" type="text"
                   value="<?php echo isset($social_youtube) ? $social_youtube : ''; ?>"/>
        </div>
        <!--<div class="form-group">
            <label>File CV mẫu</label>
            <div class="input-group">
              <span class="input-group-addon" onclick="chooseFiles('files')"><i class="fa fa-fw fa-file-pdf-o"></i></span>
              <input id="files" name="files" value="<?php /*echo !empty($files) ? $files : '' */?>" placeholder="files" class="form-control" type="text" />
            </div>
        </div>-->

    </div>
</div>