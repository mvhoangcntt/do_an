<div class="tab-pane" id="tab_homepage">
   <ul class="nav nav-tabs">
        <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
            <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>><a
                href="#tab1_<?php echo $lang_code; ?>"
                data-toggle="tab"><img
                      src="<?php echo $this->templates_assets; ?>/flag/<?php echo $lang_code ?>.png"> <?php echo $lang_name; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="tab-content">

        <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
            <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>" id="tab1_<?php echo $lang_code; ?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Hình slide 1 (1920 x 880px):</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon" onclick="chooseImage('home1')"><i class="fa fa-fw fa-image"></i><?php echo lang('btn_select_image');?></span>
                                <input id="home1"
                                onclick="chooseImage('home1')" 
                                name="home[<?php echo $lang_code; ?>][image_home1]" 
                                placeholder="Ảnh slide 1" class="form-control" 
                                type="text" 
                                value="<?php echo isset($home[$lang_code]['image_home1']) ? $home[$lang_code]['image_home1'] : ''; ?>"/>
                                <span class="input-group-addon" style="padding: 0;">
                                    <a href="<?php echo getImageThumb(isset($home[$lang_code]['image_home1']) ? $home[$lang_code]['image_home1'] : ''); ?>" class="fancybox"><img src="<?php echo getImageThumb(isset($home[$lang_code]['image_home1']) ? $home[$lang_code]['image_home1'] : ''); ?>" width="44" height="44"></a></span>
                            </div>
                            <label>Title :</label>
                            <textarea id="content_<?php echo $lang_code;?>" name="home[<?php echo $lang_code; ?>][title1]" placeholder="Giới thiệu" class="tinymce form-control" rows="10"><?php echo isset($home[$lang_code]['title1']) ? $home[$lang_code]['title1'] : ''; ?></textarea>
                            <label>Href :</label>
                            <input name="home[<?php echo $lang_code; ?>][home_link1]"
                               placeholder="Link đường dẫn"
                               class="form-control" type="text"
                               value="<?php echo !empty($home[$lang_code]['home_link1']) ? $home[$lang_code]['home_link1'] : ''; ?>"/>
                        </div>
                        <div class="col-md-6">
                            <label>Hình slide 2 (1920 x 880px):</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon" onclick="chooseImage('home2')"><i class="fa fa-fw fa-image"></i><?php echo lang('btn_select_image');?></span>
                                <input id="home2" 
                                onclick="chooseImage('home2')" 
                                name="home[<?php echo $lang_code; ?>][image_home2]" 
                                placeholder="Ảnh slide 2" class="form-control" 
                                type="text" 
                                value="<?php echo isset($home[$lang_code]['image_home2']) ? $home[$lang_code]['image_home2'] : ''; ?>"/>
                                <span class="input-group-addon" style="padding: 0;">
                                    <a href="<?php echo getImageThumb(isset($home[$lang_code]['image_home2']) ? $home[$lang_code]['image_home2'] : ''); ?>" class="fancybox"><img src="<?php echo getImageThumb(isset($home[$lang_code]['image_home2']) ? $home[$lang_code]['image_home2'] : ''); ?>" width="44" height="44"></a></span>
                            </div>
                            <label>Title :</label>
                            <textarea id="content_<?php echo $lang_code;?>" name="home[<?php echo $lang_code; ?>][title2]" placeholder="Giới thiệu" class="tinymce form-control" rows="10"><?php echo isset($home[$lang_code]['title2']) ? $home[$lang_code]['title2'] : ''; ?></textarea>
                            <label>Href :</label>
                            <input name="home[<?php echo $lang_code; ?>][home_link2]"
                               placeholder="Link đường dẫn"
                               class="form-control" type="text"
                               value="<?php echo !empty($home[$lang_code]['home_link2']) ? $home[$lang_code]['home_link2'] : ''; ?>"/>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Hình slide 3 (1920 x 880px):</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon" onclick="chooseImage('home3')"><i class="fa fa-fw fa-image"></i><?php echo lang('btn_select_image');?></span>
                                <input id="home3" 
                                onclick="chooseImage('home3')" 
                                name="home[<?php echo $lang_code; ?>][image_home3]" 
                                placeholder="Ảnh slide 3" class="form-control" 
                                type="text" 
                                value="<?php echo isset($home[$lang_code]['image_home3']) ? $home[$lang_code]['image_home3'] : ''; ?>"/>
                                <span class="input-group-addon" style="padding: 0;">
                                    <a href="<?php echo getImageThumb(isset($home[$lang_code]['image_home3']) ? $home[$lang_code]['image_home3'] : ''); ?>" class="fancybox"><img src="<?php echo getImageThumb(isset($home[$lang_code]['image_home3']) ? $home[$lang_code]['image_home3'] : ''); ?>" width="44" height="44"></a></span>
                            </div>
                            <label>Title :</label>
                            <textarea id="content_<?php echo $lang_code;?>" name="home[<?php echo $lang_code; ?>][title3]" placeholder="Giới thiệu" class="tinymce form-control" rows="10"><?php echo isset($home[$lang_code]['title3']) ? $home[$lang_code]['title3'] : ''; ?></textarea>
                            <label>Href :</label>
                            <input name="home[<?php echo $lang_code; ?>][home_link3]"
                               placeholder="Link đường dẫn"
                               class="form-control" type="text"
                               value="<?php echo !empty($home[$lang_code]['home_link3']) ? $home[$lang_code]['home_link3'] : ''; ?>"/>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea id="content_<?php echo $lang_code;?>" name="home[<?php echo $lang_code; ?>][lecturers]" placeholder="Giới thiệu" class="tinymce form-control" rows="10"><?php echo isset($home[$lang_code]['lecturers']) ? $home[$lang_code]['lecturers'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tầm nhìn</label>
                                <textarea id="content_<?php echo $lang_code;?>" name="home[<?php echo $lang_code; ?>][course]" placeholder="Tầm nhìn" class="tinymce form-control" rows="10"><?php echo isset($home[$lang_code]['course']) ? $home[$lang_code]['course'] : ''; ?></textarea>
                            </div>
                        </div>
                    </div> 
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sứ mệnh</label>
                                <textarea id="content_<?php echo $lang_code;?>" name="home[<?php echo $lang_code; ?>][t_course]" placeholder="Sứ mệnh" class="tinymce form-control" rows="10"><?php echo isset($home[$lang_code]['t_course']) ? $home[$lang_code]['t_course'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                <label>Giá trị cốt lõi</label>
                                <textarea id="content_<?php echo $lang_code;?>" name="home[<?php echo $lang_code; ?>][t_lecturers]" placeholder="Gía trị cốt lõi>" class="tinymce form-control" rows="10"><?php echo isset($home[$lang_code]['t_lecturers']) ? $home[$lang_code]['t_lecturers'] : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div> 
            </div> 
        <?php } ?>
    </div>

</div>