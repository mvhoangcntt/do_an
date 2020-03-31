<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
  table#data-table tr td:nth-child(3) {
    width: 250px;
  }
</style>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <div class="col-sm-7 col-xs-12 ">
            <div class="form-group">
              <select class="form-control gift_box" name="gift_box">
                <option value="0">Lọc trạng thái</option>
                <option value="1">Áp dụng</option>
                <option value="2">Hủy</option>
                <option value="3">Hết hạn</option>
              </select>
            </div>
          </div>
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
            <table id="data-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th>
                <th>ID</th>
                <th>Mã giảm giá</th>
                <th>Event</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Giảm giá</th>
                <th>Số lần sử dụng</th>
                <th>Còn lại</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
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
  <div class="modal-dialog" style="width: 70%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="title-form">Voucher</h3>
      </div>
      <div class="modal-body form">
        <?php echo form_open('', ['id' => 'form', 'class' => '']) ?>
        <input type="hidden" name="id" value="0">
        <!-- Custom Tabs -->
        <div class="box-body">
          <div class="form-group">
            <label>Tên sự kiện</label>
            <input type="text" name="event" placeholder="Tiêu đề sự kiện" class="form-control">
          </div>
          <div class="form-group">
            <label>Mã voucher</label>
            <div class="input-group" style="width: 93%;">

              <input name="code" placeholder="Mã voucher" class="form-control generator_code" type="text" >
              <div class="input-group-addon" style="padding: 0; position: absolute;right: 0;top: 0;">
                <button class="generator btn btn-primary" type="button">Tạo mã</button>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <label>Phần trăm khuyến mại</label>
                <input type="text" min="0" max="99" onkeyup="handleChange(this);" name="percent_sale" class="form-control percent_sale" placeholder="Phần trăm khuyến mại" value="">
              </div>
              <!-- <div class="col-md-6">
                <label>Số tiền khuyến mại</label>
                <input type="text" name="price_sale" class="form-control price_sale" placeholder="Số tiền khuyến mại" value="">
              </div> -->
            </div>
          </div>

          <div class="form-group">
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label>Thời gian bắt đầu</label>
                  <div class="input-group date form_datetime time-start col-md-12" data-link-field="dtp_input1" data-date="<?php echo date('Y-d-m') ?>">
                    <input class="form-control _time" name="start_time" size="16" type="text" id="dtp_input1" value="" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Thời gian kết thúc</label>
                  <div class="input-group date form_datetime time-end col-md-12" data-link-field="dtp_input2" data-date="<?php echo date('Y-d-m') ?>">
                    <input class="form-control _time" name="end_time" size="16" id="dtp_input2" type="text" value="" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                  </div>

                </div>
              </div>


            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label>Số lần sử dụng</label>
                <input min="0" name="total_use" class="form-control numberic" placeholder="Số lần sử dụng">
              </div>
              <div class="col-md-6">
                <label>Trạng thái</label><br>
                <select class="form-control" name="is_status">
                  <option value="1">Áp dụng</option>
                  <option value="2">Hủy</option>
                  <option value="3">Hết hạn</option>
                </select>
              </div>
            </div>
          </div>
          
        </div>
        <!-- nav-tabs-custom -->
        <?php echo form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()"
                class="btn btn-primary pull-left"><?php echo lang('btn_save'); ?></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo lang('btn_cancel'); ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<script>
  var url_ajax_load_category  = '<?php echo site_url('admin/category/ajax_load') ?>';
  var url_ajax_load           = '<?php echo site_url('admin/category/ajax_load') ?>';
  var ajax_check_code         = '<?php echo site_url('admin/voucher/ajax_check_code') ?>';
</script>