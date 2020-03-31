<div class="tab-pane" id="tab_cat_fix">
    <fieldset class="form-group album-contain">
        <legend for="">Danh mục nổi bật tin tức</legend>
        <?php
        $totalCatFeatured = 0;
        if (!empty($cat_featured)):
            $totalCatFeatured = getNumberics($cat_featured);
        endif;
        ?>
        <div data-id="<?php echo $totalCatFeatured ?>" id="cat_featured">
            <?php if (!empty($cat_featured)) foreach ($cat_featured as $i => $item):
                ?>
                <fieldset>
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="row _flex" style="">
                                    <div class="col-md-5">
                                        <input type="text"
                                               name="cat_featured[<?php echo $i; ?>][name]"
                                               class="form-control"
                                               placeholder="Link"
                                               value="<?php echo !empty($item['name']) ? $item['name'] : ''; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <select name="cat_featured[<?php echo $i; ?>][link]"
                                                class="select2 form-control" style="width: 100% !important;">
                                            <?php
                                            if (!empty($list_cat)) foreach ($list_cat as $v) {
                                                $lelected = ($item['link'] == $v->id) ? 'selected' : '';
                                                echo '<option value="' . $v->id . '" ' . $lelected . '>' . $v->title . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input
                                                id="cat_featured_<?php echo $i; ?>"
                                                name="cat_featured[<?php echo $i; ?>][img]"
                                                value="<?php echo !empty($item['img']) ? $item['img'] : ''; ?>"
                                                class="form-control col-md-6" type="hidden"
                                                style="width: 50%"/>
                                        <img onclick="chooseImage('cat_featured_<?php echo $i; ?>')"
                                             src="<?php echo isset($item['img']) ? getImageThumb($item['img']) : 'http://via.placeholder.com/100x50'; ?>"
                                             alt="" width="100">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <i class="glyphicon glyphicon-trash removeInput" onclick="removeInputImage(this)"></i>
                </fieldset>
            <?php endforeach; ?>
        </div>
        <button type="button" class="btn btn-primary btnAddMore"
                                 onclick="addInputElementSettings('cat_featured',document.getElementById('cat_featured').getAttribute('data-id'),null,'ajax_load_cat_featured')">
            <i class="fa fa-plus"> <?php echo lang('btn_add'); ?>
            </i></button>
    </fieldset>
</div>
