<div class="tab-pane" id="tab_contact">

    <ul class="nav nav-tabs">
        <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
            <li<?php echo ($lang_code == 'vi') ? ' class="active"' : ''; ?>>
                <a href="#tab_contact1_<?php echo $lang_code; ?>" data-toggle="tab">
                    <img src="<?php echo $this->templates_assets; ?>/flag/<?php echo $lang_code ?>.png"> <?php echo $lang_name; ?>
                </a>
            </li>
        <?php } ?>
    </ul>

    <div class="tab-content">
        <?php foreach ($this->config->item('cms_language') as $lang_code => $lang_name) { ?>
            <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : ''; ?>"
                 id="tab_contact1_<?php echo $lang_code; ?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên công ty</label>
                                <input name="contact[<?php echo $lang_code; ?>][company]"
                                       placeholder="Tên công ty"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['company']) ? $contact[$lang_code]['company'] : ''; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Trụ sở 1</label>
                                <input name="contact[<?php echo $lang_code; ?>][address]"
                                       placeholder="Địa chỉ"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['address']) ? $contact[$lang_code]['address'] : ''; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Trụ sở 2</label>
                                <input name="contact[<?php echo $lang_code; ?>][address1]"
                                       placeholder="Địa chỉ"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['address1']) ? $contact[$lang_code]['address1'] : ''; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Trụ sở 3</label>
                                <input name="contact[<?php echo $lang_code; ?>][address2]"
                                       placeholder="Địa chỉ"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['address2']) ? $contact[$lang_code]['address2'] : ''; ?>"/>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vận chuyển trong tỉnh</label>
                                <input name="contact[<?php echo $lang_code; ?>][ship]"
                                       placeholder="Địa chỉ"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['ship']) ? $contact[$lang_code]['ship'] : ''; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Vận chuyển ngoài tỉnh</label>
                                <input name="contact[<?php echo $lang_code; ?>][shiper]"
                                       placeholder="Địa chỉ"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['shiper']) ? $contact[$lang_code]['shiper'] : ''; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Website </label>
                                <input name="contact[<?php echo $lang_code; ?>][website]"
                                       placeholder="Địa chỉ"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['website']) ? $contact[$lang_code]['website'] : ''; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input name="contact[<?php echo $lang_code; ?>][phone]"
                                       placeholder="Điện thoại"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['phone']) ? $contact[$lang_code]['phone'] : ''; ?>"/>
                            </div>
                            
                           
                        </div>
                        <div class="col-md-12">
                          <!-- <div class="form-group">
                                <label>MST</label>
                                <input name="contact[<?php echo $lang_code; ?>][mst]"
                                       placeholder="mst"
                                       class="form-control" type="text"
                                       value="<?php echo !empty($contact[$lang_code]['mst']) ? $contact[$lang_code]['mst'] : ''; ?>"/>
                            </div> -->
                        </div>
                      </div>

                </div>
            </div>
        <?php } ?>
        <!-- <div class="form-group">
            <label>Địa chỉ Google maps (Nhập kinh độ và vĩ độ)</label>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <input name="contact[maps_latitude]"
                           placeholder="Kinh độ (latitude)"
                           class="form-control" type="text"
                           value="<?php echo !empty($contact['maps_latitude']) ? $contact['maps_latitude'] : ''; ?>"/>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <input name="contact[maps_longitude]"
                           placeholder="Vĩ độ (longitude)"
                           class="form-control" type="text"
                           value="<?php echo !empty($contact['maps_longitude']) ? $contact['maps_longitude'] : ''; ?>"/>
                </div>
            </div>
        </div> -->

    </div>
</div>
