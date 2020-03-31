<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <!-- Modal body -->
        <div class="modal-body">
            <h3 class="heading"><?php echo lang('change_new_password') ?></h3>
            <div class="form-top reset_">
                <?php if(!empty($user_id)): ?>
                    <form class="form-reset-password">
                        <div class="form-group">
                            <?php echo form_input($new_password);?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input($new_password_confirm);?>
                        </div>
                        <?php echo form_input($user_id);?>
                        <?php echo form_hidden($csrf); ?>
                        <input type="hidden" name="key_forgotten" value="<?php echo $code; ?>">
                        <button class="btn btn-block btn-login c_reset" type="button"><?php echo lang('change') ?>
                            <span class="icon_load">
                                <i class="fa fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </form>
                <?php else: ?>
                    <p><?php echo lang('link_reset') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>