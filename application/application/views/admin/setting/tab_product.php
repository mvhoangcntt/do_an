<div class="tab-pane" id="tab_product">
    <fieldset class="form-group album-contain">
        <legend>Danh sách</legend>
        <?php
        $total_list_product_page = 0;
        if (!empty($list_product_page)):
            $total_list_product_page = getNumberics($list_product_page);
//    dd($list_product_page);
        endif;
        ?>
        <div data-id="<?php echo $total_list_product_page ?>" id="list_product_page">
            <?php if (!empty($list_product_page)) foreach ($list_product_page as $key => $keytem):
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
                                            <div class="col-md-3">
                                                <input type="text"
                                                       name="list_product_page[<?php echo $key; ?>][<?php echo $lang_code ?>][title]"
                                                       class="form-control"
                                                       placeholder="Tiêu đề"
                                                       value="<?php echo !empty($keytem[$lang_code]['title']) ? $keytem[$lang_code]['title'] : ''; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text"
                                                       name="list_product_page[<?php echo $key; ?>][<?php echo $lang_code ?>][link]"
                                                       class="form-control"
                                                       placeholder="Đường dẫn"
                                                       value="<?php echo !empty($keytem[$lang_code]['link']) ? $keytem[$lang_code]['link'] : ''; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <textarea
                                                    name="list_product_page[<?php echo $key; ?>][<?php echo $lang_code ?>][desc]"
                                                    id="" cols="30" rows="4" class="form-control" placeholder="mô tả">
                                                <?php echo !empty($keytem[$lang_code]['desc']) ? $keytem[$lang_code]['desc'] : ''; ?></textarea>
                                            </div>
                                            <div class="col-md-2">
                                                <input
                                                    id="list_product_page_<?php echo $lang_code . $key; ?>"
                                                    name="list_product_page[<?php echo $key; ?>][<?php echo $lang_code ?>][img]"
                                                    value="<?php echo !empty($keytem[$lang_code]['img']) ? $keytem[$lang_code]['img'] : ''; ?>"
                                                    class="form-control col-md-6" type="hidden"
                                                    style="width: 50%"/>
                                                <img
                                                    onclick="chooseImage('list_product_page_<?php echo $lang_code . $key; ?>')"
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
                onclick="addInputElementSettings('list_product_page',document.getElementById('list_product_page').getAttribute('data-id'),null,'ajax_load_item_list_product_page')">
            <i class="fa fa-plus"> <?php echo lang('btn_add'); ?>
            </i></button>
    </fieldset>
</div>