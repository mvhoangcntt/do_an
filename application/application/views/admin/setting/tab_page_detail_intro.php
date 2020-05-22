<div class="tab-pane" id="tab_page_detail_intro">
    <fieldset class="form-group album-contain">
        <legend>Chi tiết giới thiệu công ty</legend>

        <div class="form-group">
            <ul class="nav nav-tabs">
                <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                    <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>><a
                            href="#list_detail_intro1_<?php echo $lang_code; ?>"
                            data-toggle="tab"><img
                                src="<?php echo $this->templates_assets; ?>/flag/<?php echo $lang_code ?>.png"> <?php echo $lang_name; ?>
                        </a></li>
                <?php } ?>
            </ul>

            <div class="tab-content">
                <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                    <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>"
                         id="list_detail_intro1_<?php echo $lang_code; ?>">
                        <div class="form-group">
                            <div class="row _flex">
                                <div class="col-md-12">
                                    <textarea name="list_detail_intro1[<?php echo $lang_code; ?>][desctop]" class="form-control tinymce"
                                              rows="3"
                                              placeholder="Giới thiệu"><?php echo !empty($list_detail_intro1[$lang_code]['desctop']) ? $list_detail_intro1[$lang_code]['desctop'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
        $totalListCustomIntro = 0;
        if (!empty($list_custom_intro)):
            $totalListCustomIntro = getNumberics($list_custom_intro);
//    dd($list_custom_intro);
        endif;
        ?>
        <div data-id="<?php echo $totalListCustomIntro ?>" id="list_custom_intro">
            <?php if (!empty($list_custom_intro)) foreach ($list_custom_intro as $key => $keytem):
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
                                         id="tab_<?php echo $lang_code . $key; ?>">
                                        <fieldset style="width: 100%">
                                            <div class="col-md-4">
                                                <input type="text"
                                                       name="list_custom_intro[<?php echo $key; ?>][<?php echo $lang_code ?>][title]"
                                                       class="form-control"
                                                       placeholder="Tiêu đề"
                                                       value="<?php echo !empty($keytem[$lang_code]['title']) ? $keytem[$lang_code]['title'] : ''; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text"
                                                       name="list_custom_intro[<?php echo $key; ?>][<?php echo $lang_code ?>][link]"
                                                       class="form-control"
                                                       placeholder="Đường dẫn"
                                                       value="<?php echo !empty($keytem[$lang_code]['link']) ? $keytem[$lang_code]['link'] : ''; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input
                                                    id="list_custom_intro_<?php echo $lang_code . $key; ?>"
                                                    name="list_custom_intro[<?php echo $key; ?>][<?php echo $lang_code ?>][img]"
                                                    value="<?php echo !empty($keytem[$lang_code]['img']) ? $keytem[$lang_code]['img'] : ''; ?>"
                                                    class="form-control col-md-6" type="hidden"
                                                    style="width: 50%"/>
                                                <img onclick="chooseImage('list_custom_intro_<?php echo $lang_code . $key; ?>')"
                                                     src="<?php echo isset($keytem[$lang_code]['img']) ? getImageThumb($keytem[$lang_code]['img']) : 'http://via.placeholder.com/100x50'; ?>"
                                                     alt="" width="100">
                                            </div>
                                        </fieldset>
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
                onclick="addInputElementSettings('list_custom_intro',document.getElementById('list_custom_intro').getAttribute('data-id'),null,'ajax_load_item_page_intro_detail')">
            <i class="fa fa-plus"> <?php echo lang('btn_add'); ?>
            </i></button>

        <div class="form-group">
            <ul class="nav nav-tabs">
                <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                    <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>><a
                            href="#list_detail_intro2_<?php echo $lang_code; ?>"
                            data-toggle="tab"><img
                                src="<?php echo $this->templates_assets; ?>/flag/<?php echo $lang_code ?>.png"> <?php echo $lang_name; ?>
                        </a></li>
                <?php } ?>
            </ul>

            <div class="tab-content">
                <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                    <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>"
                         id="list_detail_intro2_<?php echo $lang_code; ?>">
                        <div class="form-group">
                            <div class="row _flex">
                                <div class="col-md-12">
                                    <textarea name="list_detail_intro1[<?php echo $lang_code; ?>][descbottom]" class="form-control tinymce"
                                              rows="3"
                                              placeholder="Giới thiệu"><?php echo !empty($list_detail_intro1[$lang_code]['descbottom']) ? $list_detail_intro1[$lang_code]['descbottom'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="form-group">
            <div class="tab-content">

                <div class="form-group">
                    <div class="row _flex">
                        <div class="col-md-6">
                            <label for="">Vốn điều lệ</label>
                            <input type="number" name="vondienle" class="form-control" value="<?php echo !empty($vondienle) ? $vondienle:0 ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tổng nhân sự</label>
                            <input type="number" name="tongnhansu" class="form-control" value="<?php echo !empty($tongnhansu) ? $tongnhansu:0 ?>">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </fieldset>
</div>