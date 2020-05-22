<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$display_button = !empty($display_button) ? $display_button : array();
$controller = $this->router->fetch_class();
?>
<div class="col-sm-5 col-xs-12 text-right">
    <?php if(in_array('import',$display_button)): ?>
        <button class="btn btn-primary" onclick="import_excel()">
            <i class="fa fa-upload"></i> Import <i class="fa fa-spinner fa-spin" style="display: none"></i>
        </button>
        <input name="importExcel" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" style="display:none;"/>
        <button class="btn btn-primary" onclick="location.href='<?php echo site_url('admin/account/export_excel') ?>'">
            <i class="fa fa-download"></i> Tải mẫu <i class="fa fa-spinner fa-spin" style="display: none"></i>
        </button>
    <?php endif; ?>

    <?php if (in_array($controller, ['course'])): ?>
        <button class="btn btn-warning" onclick="add_gift_course()">
            <i class="glyphicon glyphicon-cog"></i> <?php echo lang('btn_add_gift_course');?>
        </button>
    <?php endif; ?>
    <?php if(in_array('add',$display_button) || empty($display_button)): ?>
        <button class="btn btn-success" onclick="add_form()">
            <i class="glyphicon glyphicon-plus"></i> <?php echo lang('btn_add');?>
        </button>
    <?php endif; ?>
    <?php if(in_array('delete',$display_button) || empty($display_button)): ?>
        <button class="btn btn-danger" onclick="delete_multiple()">
            <i class="glyphicon glyphicon-trash"></i> <?php echo lang('btn_remove');?>
        </button>
    <?php endif; ?>
    <?php if(in_array('sync_vietcombank',$display_button)): ?>
        <button class="btn btn-info" onclick="sync_vietcombank()">
            <i class="glyphicon glyphicon-circle-arrow-down"></i> <?php echo lang('btn_sync_vietcombank');?>
        </button>
    <?php endif; ?>
    <?php if(in_array('sync_dongabank',$display_button)): ?>
        <button class="btn btn-warning" onclick="sync_dongabank()">
            <i class="glyphicon glyphicon-circle-arrow-down"></i> <?php echo lang('btn_sync_dongabank');?>
        </button>
    <?php endif; ?>
    <?php if(in_array('copy',$display_button)): ?>

        <button class="btn btn-info" onclick="copy_multiple()">
            <i class="fa fa-fw fa-copy"></i> <?php echo lang('btn_copy');?>
        </button>
    <?php endif; ?>
    <button class="btn btn-default" onclick="reload_table()">
        <i class="glyphicon glyphicon-refresh"></i> <?php echo lang('btn_reload');?>
    </button>
</div>