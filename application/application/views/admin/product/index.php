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
                    <form action="" id="form-table  formhoang" method="post">
                        <input type="hidden" value="0" name="msg" />
                        <table id="data-table" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th>
                                    <th>ID</th>
                                    <th nowrap><?php echo lang('text_title');?></th>
                                    <!-- <th nowrap><?php //echo lang('text_content');?></th> -->
                                    <th nowrap><?php echo lang('text_catalog');?></th>
                                    <th nowrap><?php echo lang('text_image');?></th>
                                    <th nowrap><?php echo lang('text_size');?></th>
                                    <th nowrap><?php echo lang('text_maker');?></th>
                                    <th nowrap><?php echo lang('text_price');?></th>
                                    <th nowrap><?php echo lang('text_date');?></th>
                                    <th nowrap><?php echo lang('text_total');?></th>
                                    <th nowrap><?php echo lang('text_action');?></th>
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
                <!-- <input type="hidden" name="id" value="0"> -->
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_language" data-toggle="tab"><?php echo lang('tab_language');?></a></li>
                        <li><a href="#tab_info" data-toggle="tab"><?php echo lang('tab_info');?></a></li>
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

                                                    <!-- <div class="form-group">
                                                        <label><?php echo lang('form_description');?></label>
                                                        <textarea id="description_<?php echo $lang_code;?>" name="description[<?php echo $lang_code;?>]" placeholder="<?php echo lang('form_description');?>" class="form-control"></textarea>
                                                    </div> -->


                                                    <div class="form-group">
                                                        <label><?php echo lang('from_content');?></label>
                                                        <textarea id="content_<?php echo $lang_code;?>" name="content[<?php echo $lang_code;?>]" class="tinymce form-control" rows="10"></textarea>
                                                        
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
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label><?php echo lang('from_category');?></label>
                                        <select class="form-control select2 filter_catalog" title="filter_catalog_id" name="catalog" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        </select>
                                    </div>
                                    <div class="">
                                        <div>
                                            <label class="totong"><?php echo lang('form_size');?> (Số lượng, size, màu sắc) Chú ý nhập size theo màu</label>
                                            <div class="form_size">
                                                <div class="input_left form-group">
                                                    <input name="quantity[0]" placeholder="<?php echo lang('form_quantity');?>" class="form-control quantity" type="text"/>
                                                </div>
                                                <div class="input_right form-group">
                                                    <input name="textsize[0]" placeholder="<?php echo lang('form_text_size');?>" class="form-control" type="text" />
                                                </div>
                                                <div class="input_right form-group">
                                                    <input name="textcoler[0]" placeholder="<?php echo lang('form_text_coler');?>" class="form-control" type="text" />
                                                </div>
                                                <div>
                                                    <i class="fa fa-times"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add_size" id="0">+ Thêm ...</div>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo lang('form_maker');?></label>
                                        <select class="form-control select2 filter_maker_id" title="filter_maker_id" name="maker_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo lang('form_price');?></label>
                                        <input id="title_<?php echo $lang_code;?>" name="price" placeholder="<?php echo lang('form_price');?>" class="form-control" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo lang('form_discount');?></label>
                                        <input id="title_<?php echo $lang_code;?>" value="0" name="discount" placeholder="<?php echo lang('form_discount');?>" class="form-control" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo lang('form_total');?></label>
                                        <input id="title_<?php echo $lang_code;?>" name="total" placeholder="<?php echo lang('form_total');?>" class="form-control" type="text" readonly="readonly" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label><?php echo lang('form_masp');?></label>
                                        <input id="title_<?php echo $lang_code;?>" name="masp" placeholder="<?php echo lang('form_masp');?>" class="form-control" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo lang('form_status');?></label>
                                        <select class="form-control" name="is_status">
                                            <option value="0"><?php echo lang('text_status_0');?></option>
                                            <option value="1" selected><?php echo lang('text_status_1');?></option>
                                            <option value="2"><?php echo lang('text_status_2');?></option>
                                        </select>
                                    </div>
                                    <?php $this->load->view($this->template_path. '_block/input_media') ?>
                                    <?php $this->load->view($this->template_path. '_block/input_multiple_media'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class=" save btn btn-primary pull-left"><?php echo lang('btn_save');?></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('btn_cancel');?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
