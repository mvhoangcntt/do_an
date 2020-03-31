<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <?php $this->load->view($this->template_path."_block/where_datatables") ?>
                    <?php $this->load->view($this->template_path."_block/button") ?>
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
                                <th nowrap><?php echo lang('from_media');?></th>
                                <th nowrap><?php echo lang('text_status');?></th>
                                <th nowrap><?php echo lang('text_created_time');?></th>
                                <th nowrap><?php echo lang('text_updated_time');?></th>
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
    <div class="modal-dialog" style="width: 80%">
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
                    <div class="tab-content">
                        <div class="box-body">
                            <?php $this->load->view($this->template_path. '_block/input_media') ?>
                            <div class="form-group">
                                <label>Link video youtube</label>
                                <input name="href_video" placeholder="Link" class="form-control" type="text" />
                            </div>
                            <div class="form-group">
                                <label><?php echo lang('form_status');?></label>
                                <select class="form-control" name="is_status">
                                    <option value="0"><?php echo lang('text_status_0');?></option>
                                    <option value="1" selected><?php echo lang('text_status_1');?></option>
                                    <option value="2"><?php echo lang('text_status_2');?></option>
                                </select>
                            </div>
                            <div class="form-group" style="color: red">
                                Nếu không hiện hình ảnh có thể do lỗi của đường dẫn video !<br/>
                                Hoặc do lỗi hiển thị ảnh đại diện. Hãy check giao diện người dùng !
                            </div>
                        </div>
                        
                    </div>

                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary pull-left"><?php echo lang('btn_save');?></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('btn_cancel');?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<script type="text/javascript">
    var category_type = '<?php echo !empty($category_type) ? $category_type : '' ?>';
    url_ajax_load = '<?php echo base_url('admin/category/ajax_load/') ?>'+ category_type;
</script>