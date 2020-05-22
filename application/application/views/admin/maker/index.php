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
                    <?php $this->load->view($this->template_path."_block/button",array('display_button'=>array('add'))) ?>
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
                                    <th nowrap><?php echo lang('name-maker');?></th>
                                    <th nowrap><?php echo lang('content');?></th>
                                    <th nowrap><?php echo lang('created');?></th>
                                    <th nowrap><?php echo lang('created_time');?></th>
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
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="title-form"><?php echo lang('heading_title_add');?></h3>
            </div>
            <div class="modal-body form">
                <?php echo form_open('',['id'=>'form','class'=>'']) ?>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_info" data-toggle="tab"><?php echo lang('tab_info');?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_info">
                            <div class="box-body">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label><?php echo lang('from_maker');?></label>
                                        <input type="text" name="name_maker" class="form-control" placeholder="Nhập tên nhà sản xuất !">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo lang('from_content');?></label>
                                        <textarea id="content" name="content" class="tinymce form-control" rows="10" placeholder="Nhập nội dung chi tiết"></textarea>  
                                    </div>
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
