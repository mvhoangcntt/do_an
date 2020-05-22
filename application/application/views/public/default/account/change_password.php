<section class="banner-cate v2">
    <div class="bn-img" style="background-image: url(<?php echo base_url('public/images/prf-banner.jpg'); ?>)">
    </div>
    <div class="bn-content">
        <div class="container">
            <nav aria-label="breadcrumb">
                <?php echo !empty($breadcrumbs)? $breadcrumbs :  ''; ?>
            </nav>
            <h2 class="heading"><?php echo !empty($heading_title)?$heading_title:''; ?></h2>
        </div>
    </div>
</section>
<section class="profile-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <?php $this->load->view($this->template_path . '_block/sidebar_menu_account'); ?>
            </div>
            <div class="col-xl-9">
                <div class="prf-content">
                    <div class="prf-head">
                        <h2 class="title"><?php echo lang('change_the_password') ?></h2>
                        <p><?php echo lang('t_change_the_password') ?></p>
                    </div>
                    <form class="prf-setting" id="change_password" action="javascript:;">
                        <div class="prf-box">
                            <div class="row col-mar-15">
                                <div class="col-md-6 offset-md-3">
                                    <div class="input_form">
                                        <input type="password" class="input" name="pass_old" placeholder="<?php echo lang('old_password') ?>">
                                    </div>
                                    <div class="input_form">
                                        <input type="password" class="input" name="password" placeholder="<?php echo lang('new_password') ?>">
                                    </div>
                                    <div class="input_form">
                                        <input type="password" class="input" name="pass" placeholder="<?php echo lang('re-password') ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/><br/><br class="d-none d-md-block"/><br class="d-none d-md-block"/><br class="d-none d-md-block"/>
                        <div class="ctrl">
                            <button class="submit smooth change_password" type="submit"><?php echo lang('save_change') ?><span class="icon_load"><i class="fa fa-spinner fa-spin" style="font-size: 18px"></i></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
