<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$controller = $this->router->fetch_class();
// dd($controller);
$method = $this->router->fetch_method();
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <?php $this->load->view($this->template_path."_block/where_datatables") ?>
                    <?php $this->load->view($this->template_path."_block/button",array('display_button'=>array('add','delete'))) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <form action="" id="form-table" method="post">
                        <input type="hidden" value="0" name="msg" />
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th>
                                    <th>ID</th>
                                    <th><?php echo lang('text_title');?></th>
                                    <th><?php echo lang('text_featured');?></th>
                                    <th><?php echo lang('text_status');?></th>
                                    <th><?php echo lang('text_created_time');?></th>
                                    <th><?php echo lang('text_updated_time');?></th>
                                    <th><?php echo lang('text_action');?></th>
                                </tr>
                            </thead>
                        </table>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="title-form"><?php echo lang('heading_title_add');?></h3>
            </div>
            <div class="modal-body form">
                <?php echo form_open('',['id'=>'form','class'=>'']) ?>
                <input type="hidden" name="id" value="0">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_language" data-toggle="tab">Nội dung</a></li>
                        <li><a href="#tab_info" data-toggle="tab"><?php echo lang('tab_info');?></a></li>
                        <li><a href="#tab_image" data-toggle="tab"><?php echo lang('tab_image');?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_language">
                            <ul class="nav nav-pills">
                                <?php if(!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name){ ?>
                                    <li<?php echo ($lang_code == 'vi') ? ' class="active"' : '';?>><a href="#tab_<?php echo $lang_code;?>" data-toggle="tab"><?php echo $lang_name;?></a></li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content">
                                <?php if(!empty($this->config->item('cms_language')))  foreach ($this->config->item('cms_language') as $lang_code => $lang_name){ ?>
                                    <div class="tab-pane <?php echo ($lang_code == 'vi') ? 'active' : '';?>" id="tab_<?php echo $lang_code;?>">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label><?php echo lang('form_title');?></label>
                                                        <input id="title_<?php echo $lang_code;?>" name="title[<?php echo $lang_code;?>]" placeholder="<?php echo lang('form_title');?>" class="form-control" type="text" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label><?php echo lang('form_description');?></label>
                                                        <textarea id="description_<?php echo $lang_code;?>" name="description[<?php echo $lang_code;?>]" placeholder="<?php echo lang('form_description');?>" class="form-control"></textarea>
                                                    </div>
													<div class="form-group">
														<label><?php echo lang('form_content');?></label>
														<textarea id="content_<?php echo $lang_code;?>" name="content[<?php echo $lang_code;?>]" placeholder="<?php echo lang('from_content');?>" class="tinymce form-control content_post" rows="10"></textarea>
													</div>

                                                </div>
                                                <div class="col-sm-6 col-xs-12">
													<?php $this->load->view($this->template_path.'_block/seo_meta',['lang_code'=>$lang_code]) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_info">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input name="model" placeholder="Mã sản phẩm" class="form-control" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo lang('from_category');?></label>
                                            <select data-placeholder="<?php echo lang('from_category');?>" class="form-control select2" name="category_id[]"  style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>

                                        <div class="form-group">
                                            <label>Họa tiết</label>
                                            <select data-placeholder="Chọn họa tiết" class="form-control select2 look" name="property[look]" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>

                                        <div class="form-group">
                                            <label>Màu sắc</label>
                                            <select data-placeholder="Chọn màu sắc" class="form-control select2 color" name="property[color]" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>

										<div class="form-group">
											<label><?php echo lang('from_date_show');?></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input name="displayed_time" placeholder="<?php echo lang('from_date_show');?>" class="form-control datepicker" type="text" />
											</div>
										</div>
										<div class="form-group">
											<label><?php echo lang('form_status');?></label>
											<select class="form-control" name="is_status">
												<option value="0"><?php echo lang('text_status_0');?></option>
												<option value="1" selected><?php echo lang('text_status_1');?></option>
												<option value="2"><?php echo lang('text_status_2');?></option>
											</select>
										</div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Nhãn hàng</label>
                                            <select data-placeholder="Nhãn hàng" class="form-control select2 brand" name="property[brand]" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>

                                        <div class="form-group">
                                            <label>Dòng sản phẩm</label>
                                            <select data-placeholder="Chọn Dòng sản phẩm" class="form-control select2 code" name="property[code]" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kích thước</label>
                                            <select data-placeholder="Chọn Kích thước" class="form-control select2 size" name="property[size]" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>
                                        <div class="form-group">
                                            <label>Chủng loại</label>
                                            <select data-placeholder="Chọn Chủng loại" class="form-control select2 material" name="property[material]"  style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bề mặt</label>
                                            <select data-placeholder="Chọn Bề mặt" class="form-control select2 surface" name="property[surface]"  style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mài</label>
                                            <select data-placeholder="Mài" class="form-control select2 rectifi" name="property[rectifi]" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>
                                        <div class="form-group">
                                            <label>Công nghệ</label>
                                            <select data-placeholder="Chọn Công nghệ" class="form-control select2 tech" name="property[tech]"  style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ứng dụng</label>
                                            <select data-placeholder="Chọn Ứng dụng" class="form-control select2 appli" name="property[appli]"  style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>
                                        <div class="form-group">
                                            <label>Thông tin đóng gói - VI</label>
                                            <input name="packing[vi]" placeholder="Thông tin đóng gói - VI" class="form-control" type="text" />
                                        </div>
                                        <div class="form-group">
                                            <label>Thông tin đóng gói - EN</label>
                                            <input name="packing[en]" placeholder="Thông tin đóng gói - EN" class="form-control" type="text" />
                                        </div>

                                        <div class="form-group">
                                            <label>File ảnh Feature</label>
                                            <select data-placeholder="Chọn Feature" class="form-control select2 feature" name="property[feature][]" style="width: 100%;" tabindex="-1" aria-hidden="true"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_image">
                            <div class="box-body">
                                <?php $this->load->view($this->template_path. '_block/input_media') ?>
                                <?php $this->load->view($this->template_path. '_block/input_multiple_media'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer"><!-- window.location.reload() -->
                <button type="button" id="btnSave" onclick="save();" class="btn btn-primary pull-left"><?php echo lang('btn_save');?></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('btn_cancel');?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->



<script>
    var rootpath                          = '<?php echo MEDIA_PATH ?>';
    var url_ajax_load_category            = '<?php echo site_url('admin/category/ajax_load/product') ?>';
    var url_ajax_load_brand               = '<?php echo site_url('admin/property/ajax_load/brand') ?>';
    var url_ajax_load_code                = '<?php echo site_url('admin/property/ajax_load/code') ?>';
    var url_ajax_load_surface             = '<?php echo site_url('admin/property/ajax_load/surface') ?>';
    var url_ajax_load_material            = '<?php echo site_url('admin/property/ajax_load/material') ?>';
    var url_ajax_load_size                = '<?php echo site_url('admin/property/ajax_load/size') ?>';
    var url_ajax_load_rectification       = '<?php echo site_url('admin/property/ajax_load/rectifi') ?>';
    var url_ajax_load_technology          = '<?php echo site_url('admin/property/ajax_load/tech') ?>';
    var url_ajax_load_application         = '<?php echo site_url('admin/property/ajax_load/appli') ?>';

    var url_ajax_load                     = '<?php echo site_url('admin/category/ajax_load/product') ?>';
</script>
