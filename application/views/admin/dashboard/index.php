<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Hướng dẫn sử dụng Backend CMS Apecsoft</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Hướng dẫn quản lý bài viết
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/gWbWVes-frQ" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Hướng dẫn quản lý sản phẩm
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="box-body">
                                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/vyFlPlr6guo" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Hướng dẫn quản lý đơn hàng
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="box-body">
                                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/NAKTpJuXmbU" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="panel box box-warning">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                        Hướng dẫn quản lý thành viên
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="box-body">
                                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/joxWI7UZHaM" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo lang('text_fanpage');?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FApecSoftware%2F&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=602507949853037" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
</section>
<!-- /.content -->
<script>
    var url_ajax_total = '<?php echo site_url("admin/{$this->router->fetch_class()}/ajax_total")?>';
</script>
