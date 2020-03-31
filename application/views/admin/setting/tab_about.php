<div class="tab-pane" id="tab_about">
   <ul class="nav nav-tabs">
        <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
            <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>><a
                href="#tab2_<?php echo $lang_code; ?>"
                data-toggle="tab"><img
                      src="<?php echo $this->templates_assets; ?>/flag/<?php echo $lang_code ?>.png"> <?php echo $lang_name; ?>
                </a>
            </li>
        <?php } ?>
    </ul>

    <div class="tab-content">
        <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
            <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>" id="tab2_<?php echo $lang_code; ?>">
                <!-- id="tab2_" vì không để trùng các tab khác có thể thay đổi tùy ý -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_gioithieu" data-toggle="tab">Giới thiệu</a></li>
                    <li><a href="#tab_tamnhin" data-toggle="tab">Tầm nhìn</a></li>
                    <li><a href="#tab_sumenh" data-toggle="tab">Sứ mệnh</a></li>
                    <li><a href="#tab_giatri" data-toggle="tab">Giá trị cốt lõi</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_gioithieu">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hình banner 670 x 300(px)</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" onclick="chooseImage('gioithieu')"><i class="fa fa-fw fa-image"></i><?php echo lang('btn_select_image');?></span>
                                            <input id="gioithieu" 
                                            onclick="chooseImage('gioithieu')" 
                                            name="about[<?php echo $lang_code; ?>][image_gioithieu]" 
                                            placeholder="Ảnh đại diện" class="form-control" 
                                            type="text" 
                                            value="<?php echo isset($about[$lang_code]['image_gioithieu']) ? $about[$lang_code]['image_gioithieu'] : ''; ?>"/>
                                            <span class="input-group-addon" style="padding: 0;">
                                                <a href="<?php echo getImageThumb(isset($about[$lang_code]['image_gioithieu']) ? $about[$lang_code]['image_gioithieu'] : ''); ?>" class="fancybox"><img src="<?php echo getImageThumb(isset($about[$lang_code]['image_gioithieu']) ? $about[$lang_code]['image_gioithieu'] : ''); ?>" width="44" height="44"></a></span>
                                        </div>
                                        <textarea id="content_<?php echo $lang_code;?>" name="about[<?php echo $lang_code; ?>][gioithieu]" placeholder="Giới thiệu" class="tinymce form-control" rows="10"><?php echo isset($about[$lang_code]['gioithieu']) ? $about[$lang_code]['gioithieu'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                
                    <div class="tab-pane" id="tab_tamnhin">                    
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hình banner 1170 x 360(px)</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" onclick="chooseImage('tamnhin')"><i class="fa fa-fw fa-image"></i><?php echo lang('btn_select_image');?></span>
                                            <input id="tamnhin" 
                                            onclick="chooseImage('tamnhin')" 
                                            name="about[<?php echo $lang_code; ?>][image_tamnhin]" 
                                            placeholder="Ảnh đại diện" class="form-control" 
                                            type="text" 
                                            value="<?php echo isset($about[$lang_code]['image_tamnhin']) ? $about[$lang_code]['image_tamnhin'] : ''; ?>"/>
                                            <span class="input-group-addon" style="padding: 0;">
                                                <a href="<?php echo getImageThumb(isset($about[$lang_code]['image_tamnhin']) ? $about[$lang_code]['image_tamnhin'] : ''); ?>" class="fancybox"><img src="<?php echo getImageThumb(isset($about[$lang_code]['image_tamnhin']) ? $about[$lang_code]['image_tamnhin'] : ''); ?>" width="44" height="44"></a></span>
                                        </div>
                                        <textarea id="content_<?php echo $lang_code;?>" name="about[<?php echo $lang_code; ?>][tamnhin1]" placeholder="Giới thiệu" class="tinymce form-control" rows="10"><?php echo isset($about[$lang_code]['tamnhin1']) ? $about[$lang_code]['tamnhin1'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div> 
                
                    <div class="tab-pane" id="tab_sumenh">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hình banner 1170 x 360(px)</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" onclick="chooseImage('sumenh')"><i class="fa fa-fw fa-image"></i><?php echo lang('btn_select_image');?></span>
                                            <input id="sumenh" 
                                            onclick="chooseImage('sumenh')" 
                                            name="about[<?php echo $lang_code; ?>][image_sumenh]" 
                                            placeholder="Ảnh đại diện" class="form-control" 
                                            type="text" 
                                            value="<?php echo isset($about[$lang_code]['image_sumenh']) ? $about[$lang_code]['image_sumenh'] : ''; ?>"/>
                                            <span class="input-group-addon" style="padding: 0;">
                                                <a href="<?php echo getImageThumb(isset($about[$lang_code]['image_sumenh']) ? $about[$lang_code]['image_sumenh'] : ''); ?>" class="fancybox"><img src="<?php echo getImageThumb(isset($about[$lang_code]['image_sumenh']) ? $about[$lang_code]['image_sumenh'] : ''); ?>" width="44" height="44"></a></span>
                                        </div>
                                        <textarea id="content_<?php echo $lang_code;?>" name="about[<?php echo $lang_code; ?>][sumenh1]" placeholder="Sứ mệnh 1" class="tinymce form-control" rows="10"><?php echo isset($about[$lang_code]['sumenh1']) ? $about[$lang_code]['sumenh1'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
    
                    <div class="tab-pane" id="tab_giatri">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                        <label>Hình banner 1170 x 360(px)</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" onclick="chooseImage('cotloi')"><i class="fa fa-fw fa-image"></i><?php echo lang('btn_select_image');?></span>
                                            <input id="cotloi" 
                                            onclick="chooseImage('cotloi')" 
                                            name="about[<?php echo $lang_code; ?>][image_cotloi]" 
                                            placeholder="Ảnh đại diện" class="form-control" 
                                            type="text" 
                                            value="<?php echo isset($about[$lang_code]['image_cotloi']) ? $about[$lang_code]['image_cotloi'] : ''; ?>"/>
                                            <span class="input-group-addon" style="padding: 0;">
                                                <a href="<?php echo getImageThumb(isset($about[$lang_code]['image_cotloi']) ? $about[$lang_code]['image_cotloi'] : ''); ?>" class="fancybox"><img src="<?php echo getImageThumb(isset($about[$lang_code]['image_cotloi']) ? $about[$lang_code]['image_cotloi'] : ''); ?>" width="44" height="44"></a></span>
                                        </div>
                                        <label>Cột 1</label>
                                        <textarea id="content_<?php echo $lang_code;?>" name="about[<?php echo $lang_code; ?>][cotloi1]" placeholder="Gía trị cốt lõi 1" class="tinymce form-control" rows="10"><?php echo isset($about[$lang_code]['cotloi1']) ? $about[$lang_code]['cotloi1'] : ''; ?></textarea>
                                        <label>Cột 2</label>
                                        <textarea id="content_<?php echo $lang_code;?>" name="about[<?php echo $lang_code; ?>][cotloi2]" placeholder="Gía trị cốt lõi 2" class="tinymce form-control" rows="10"><?php echo isset($about[$lang_code]['cotloi2']) ? $about[$lang_code]['cotloi2'] : ''; ?></textarea>
                                        <label>Cột 3</label>
                                        <textarea id="content_<?php echo $lang_code;?>" name="about[<?php echo $lang_code; ?>][cotloi3]" placeholder="Gía trị cốt lõi 3" class="tinymce form-control" rows="10"><?php echo isset($about[$lang_code]['cotloi3']) ? $about[$lang_code]['cotloi3'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div><hr>
                        </div>
                    </div>
                </div> 
            </div> 
        <?php } ?>
    </div>

</div>