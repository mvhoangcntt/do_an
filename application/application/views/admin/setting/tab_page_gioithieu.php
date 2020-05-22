<div class="tab-pane" id="tab_page_intro">
    <fieldset class="album-contain">
        <div class="form-group">
            <legend for="">Giới thiệu chung</legend>
            <ul class="nav nav-tabs">
                <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                    <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>><a
                            href="#tab_page_intro_<?php echo $lang_code; ?>"
                            data-toggle="tab"><img
                                src="<?php echo $this->templates_assets; ?>/flag/<?php echo $lang_code ?>.png"> <?php echo $lang_name; ?>
                        </a></li>
                <?php } ?>
            </ul>

            <div class="tab-content">
                <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
                    <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>"
                         id="tab_page_intro_<?php echo $lang_code; ?>">
                        <div class="form-group">
                            <div class="row _flex">
                                <div class="col-md-8">
                                    <textarea name="intro_page[<?php echo $lang_code; ?>][desc]" class="form-control"
                                              rows="3"
                                              placeholder="Giới thiệu"><?php echo !empty($intro_page[$lang_code]['desc']) ? $intro_page[$lang_code]['desc'] : ''; ?></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input name="intro_page[<?php echo $lang_code; ?>][link]"
                                           class="form-control" type="text"
                                           value="<?php echo !empty($intro_page[$lang_code]['link']) ? $intro_page[$lang_code]['link'] : ''; ?>"
                                           placeholder="Đường dẫn"/>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <input
                    id="img_intro_page"
                    name="img_intro_page"
                    value="<?php echo !empty($img_intro_page) ? $img_intro_page : ''; ?>"
                    onclick="chooseImage('img_intro_page')"
                    class="form-control" type="text" style="width: 50%; margin-right: 2%;float: left"/>

                <img onclick="chooseImage('img_intro_page')" style="float: left"
                     src="<?php echo isset($img_intro_page) ? getImageThumb($img_intro_page) : 'http://via.placeholder.com/100x50'; ?>"
                     alt="" width="100">
            </div>
        </div>
    </fieldset>
    <fieldset class="album-contain">
        <legend for="">Trang con</legend>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <select name="page_child[1]" id="" class="form-control">
                        <option value="">Chọn trang</option>
                        <?php
                        if (!empty($allPage)) foreach ($allPage as $item) {
                            $selected = ((isset($page_child[1])) && $page_child[1] == $item->id) ? 'selected' : '';
                            echo "<option value='" . $item->id . "' " . $selected . ">" . $item->title . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="page_child[2]" id="" class="form-control">
                        <option value="">Chọn trang</option>
                        <?php
                        if (!empty($allPage)) foreach ($allPage as $item) {
                            $selected = ((isset($page_child[2])) && $page_child[2] == $item->id) ? 'selected' : '';
                            echo "<option value='" . $item->id . "' " . $selected . ">" . $item->title . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="page_child[3]" id="" class="form-control">
                        <option value="">Chọn trang</option>
                        <?php
                        if (!empty($allPage)) foreach ($allPage as $item) {
                            $selected = ((isset($page_child[3])) && $page_child[3] == $item->id) ? 'selected' : '';
                            echo "<option value='" . $item->id . "' " . $selected . ">" . $item->title . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="page_child[4]" id="" class="form-control">
                        <option value="">Chọn trang</option>
                        <?php
                        if (!empty($allPage)) foreach ($allPage as $item) {
                            $selected = ((isset($page_child[4])) && $page_child[4] == $item->id) ? 'selected' : '';
                            echo "<option value='" . $item->id . "' " . $selected . ">" . $item->title . "</option>";
                        }
                        ?>
                    </select>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <select name="page_child[5]" id="" class="form-control">
                        <option value="">Chọn trang</option>
                        <?php
                        if (!empty($allPage)) foreach ($allPage as $item) {
                            $selected = ((isset($page_child[5])) && $page_child[5] == $item->id) ? 'selected' : '';
                            echo "<option value='" . $item->id . "' " . $selected . ">" . $item->title . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="page_child[6]" id="" class="form-control">
                        <option value="">Chọn trang</option>
                        <?php
                        if (!empty($allPage)) foreach ($allPage as $item) {
                            $selected = ((isset($page_child[6])) && $page_child[6] == $item->id) ? 'selected' : '';
                            echo "<option value='" . $item->id . "' " . $selected . ">" . $item->title . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="page_child[7]" id="" class="form-control">
                        <option value="">Chọn trang</option>
                        <?php
                        if (!empty($allPage)) foreach ($allPage as $item) {
                            $selected = ((isset($page_child[7])) && $page_child[7] == $item->id) ? 'selected' : '';
                            echo "<option value='" . $item->id . "' " . $selected . ">" . $item->title . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="page_child[8]" id="" class="form-control">
                        <option value="">Chọn trang</option>
                        <?php
                        if (!empty($allPage)) foreach ($allPage as $item) {
                            $selected = ((isset($page_child[8])) && $page_child[8] == $item->id) ? 'selected' : '';
                            echo "<option value='" . $item->id . "' " . $selected . ">" . $item->title . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </fieldset>
</div>