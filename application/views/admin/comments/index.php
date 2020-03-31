<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
  .btn-success,.dataTables_filter{
    display: none;
  }
</style>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">

                  <div class="col-sm-7 col-xs-12">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-filter"></i></span>
                        <select class="form-control select2 account_id" name="account_id"
                        style="width: 100%;" tabindex="-1" aria-hidden="true">
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-filter"></i></span>
                      <select class="form-control select2 course_id" name="course_id"
                      style="width: 100%;" tabindex="-1" aria-hidden="true">
                    </select>
                  </div>
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
                        <input type="hidden" value="0" name="msg" />
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select_all" value="1" id="data-table-select-all"></th>
                                    <th>ID</th>
                                    <th><?php echo lang('text_title');?></th>
                                    <th>Khóa học</th>
                                    <th>Nội dung</th>
                                    <th><?php echo lang('text_status');?></th>
                                    <th><?php echo lang('text_created_time');?></th>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h3 class="modal-title" id="title-form">Xem bình luận</h3>
      </div>
      <div class="modal-body form modalbody">

          <div class="comments-container">
           <ul id="comments-list" class="comments-list">
            <li>
             <div class="comment-main-level">
              <!-- Avatar -->
              <div class="comment-avatar"><img src="https://gravatar.com/avatar/412c0b0ec99008245d902e6ed0b264ee?s=80" alt=""></div>
              <!-- Contenedor del Comentario -->
              <div class="comment-box">
               <div class="comment-head">
                <h6 class="comment-name by-author" name="account_id"></h6>
                <span name="created_time"></span>
            </div>
            <div class="comment-content" name="content">
            </div>
            <div class="ctrl">
                <a class="smooth reply-btn" data-id="12" onclick="repcomments()" style="padding-left: 12px;">Trả lời</a> 
            </div>
            <form class="form-input form-input2 upload_comments" style="display: none" action="javascript:void(0);" role="form" method="POST" enctype="multipart/form-data">
                <textarea placeholder="Mời bạn để lại bình luận" class="binhluan" data-id="" data-course=""></textarea>
                <div class="fr-photo"></div>
                <div class="fr-ctrl">

                    <a class="smooth" style="visibility: hidden;">Quy định đăng bình luận</a>
                    <button type="submit" class="smooth send rep_cm">Gửi</button>
                </div>
            </form>
        </div>

    </div>
    <!-- Respuestas de los comentarios -->
    <ul class="comments-list reply-list"><li id="list">
      <div class="comment-avatar"><img src="https://gravatar.com/avatar/412c0b0ec99008245d902e6ed0b264ee?s=80" alt=""></div>
      <div class="comment-box">
        <div class="comment-head">
          <h6 class="comment-name by-reply"><a href="javascript:;"></a></h6>
          <span name="created_time">1 tháng trước </span>
          <a href="javascript:;" ><i class="fa fa-trash"></i></a>                        

      </div>
      <div class="comment-content">
      </div>
  </div>
</li>
</ul>
</li>

</ul>


</div>
<!-- nav-tabs-custom -->
</div>
<div class="modal-footer modal-footer-top-button">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
</div>
</div>
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
.modal-body{
    padding-bottom: 50px;
}
.ctrl{
    cursor: pointer;
}
.upload_comments{
  padding-top: 10px;
} 
.input-group .form-control._time {
  background: #FFF;
}
.form-input textarea{
    border: solid 1px #ccc;
    height: 80px;
    width: 100%;
    display: block;
    font-family: inherit;
}
.fr-ctrl{
    border: solid 1px #ccc;
    border-top: none;
    padding: 10px 100px 10px 15px;
    color: #20609d;
    position: relative;
}
.fr-ctrl .send {
    background: #f26522;
    color: #fff;
    border-radius: 5px;
    padding: 2px 25px;
    font-size: 18px;
    line-height: 27px;
    position: absolute;
    right: 10px;
    top: 50%;
    margin-top: -16px;
    border: none;
}
.fr-photo:empty {
    padding: 0;
    border: none;
}
</style>
<script>
    var url_ajax_repcomment = '<?php echo site_url('admin/comments/ajax_ListRepCommnet') ?>';
    var url_ajax_rep        = '<?php echo site_url('admin/comments/ajax_ListRep') ?>';
    var url_load_account    = '<?php echo site_url('admin/comments/load_account') ?>';
    var url_load_course     = '<?php echo site_url('admin/comments/load_course') ?>';
</script>
