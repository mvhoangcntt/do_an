<div class="tab-pane" id="tab_email">
    <div class="box-body">
        <div class="form-group">
            <label><?php echo lang('form_address_mail'); ?></label>
            <input name="address_mail"
                   placeholder="<?php echo lang('form_address_mail'); ?>"
                   class="form-control" type="text"
                   value="<?php echo isset($address_mail) ? $address_mail : ''; ?>"/>
        </div>
    </div>
</div>
