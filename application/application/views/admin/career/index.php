<?php

defined('BASEPATH') OR exit('No direct script access allowed');?>
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
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th>
                            <th>Tên</th>
                            <th>Công việc</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>CV</th>
                            <th>Thue</th>
                            <th>Ngày gửi</th>
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
<script>
    var textConfirm = 'đơn tuyển dụng';
</script>
<style>
    .btn-success{
        display: none;
    }
</style>