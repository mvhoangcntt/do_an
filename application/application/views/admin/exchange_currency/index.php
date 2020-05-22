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
                    <?php $this->load->view($this->template_path."_block/button", ['display_button' => $display_button]) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th>
                            <th><?php echo lang('text_id');?></th>
                            <th><?php echo lang('text_type');?></th>
                            <th><?php echo lang('text_sell');?></th>
                            <th><?php echo lang('text_created_time');?></th>
                            <th><?php echo lang('text_updated_time');?></th>
                            <th><?php echo lang('text_action');?></th>
                        </tr>
                        </thead>
                    </table>
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
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="type"><?php echo lang('form_type');?></label>
                                <select class="form-control select2" name="type" id="type" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?php echo lang('form_sell');?></label>
                                <input id="sell" name="sell" placeholder="<?php echo lang('form_sell');?>" class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
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
<script>
    var url_ajax_sync_dongabank = '<?php echo site_url('admin/exchange_currency/ajax_sync_dongabank') ?>';
    var url_ajax_sync_vietcombank = '<?php echo site_url('admin/exchange_currency/ajax_sync_vietcombank') ?>';
    var url_ajax_load_currency_code = '<?php echo site_url('admin/exchange_currency/ajax_load_currency_code') ?>';
</script>
