<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo !empty($heading_title) ? $heading_title : 'CMS' ?> | Apecsoft CMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo $this->templates_assets.'/favicon.ico'?>" type="image/x-icon">
  <?php $asset_css[] = '../bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/font-awesome/css/font-awesome.min.css'; ?>
  <?php $asset_css[] = '../bower_components/Ionicons/css/ionicons.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bs-iconpicker/css/bootstrap-iconpicker.min.css'; ?>
  <?php $asset_css[] = '../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/datatables.net-rowreorder-bs/css/rowReorder.bootstrap.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-daterangepicker/daterangepicker.css'; ?>
  <?php $asset_css[] = '../bower_components/fancybox/dist/jquery.fancybox.min.css'; ?>
  <?php $asset_css[] = '../plugins/pace/pace.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-sweetalert/dist/sweetalert.css'; ?>
  <?php $asset_css[] = '../bower_components/toastr/toastr.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-daterangepicker/daterangepicker.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'; ?>
  <?php $asset_css[] = '../css/bootstrap-datetimepicker.min.css'; ?>
  <?php $asset_css[] = '../bower_components/select2/dist/css/select2.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css'; ?>
  <?php $asset_css[] = '../bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'; ?>
  <?php $asset_css[] = 'AdminLTE.min.css'; ?>
  <?php $asset_css[] = 'skins/_all-skins.min.css'; ?>
  <?php $asset_css[] = 'custom.css'; ?>
  <?php $asset_css[] = 'myproduct.css'; ?>
  <?php $asset_css[] = 'orders.css'; ?>
  <?php
  minifyCSS($asset_css, $this->templates_assets, false, true);
  ?>
    <?php if (!empty($controller) && file_exists($this->templates_assets . "css/pages/$controller.css")): ?>
        <link href="<?php echo $this->templates_assets . "css/pages/$controller.css" ?>" rel="stylesheet"
              type="text/css">
    <?php endif; ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<script>
  var base_url = '<?php echo base_url();?>',
    current_url = '<?php echo current_url(); ?>',
    path_media = '<?php echo MEDIA_PATH; ?>',
    script_name = '<?php echo BASE_SCRIPT_NAME; ?>', //Tên sub-folder chạy site
    media_name = '<?php echo MEDIA_NAME; ?>',
    media_url = '<?php echo MEDIA_URL; ?>',
    language = {},
    lang_cnf = {}
  ;
  <?php if(!empty($controller)): ?>
  var url_ajax_list = '<?php echo site_url("admin/$controller/ajax_list")?>',
    url_ajax_load = '<?php echo site_url("admin/$controller/ajax_load")?>',
    url_ajax_add = '<?php echo site_url("admin/$controller/ajax_add")?>',
    url_ajax_copy = '<?php echo site_url("admin/$controller/ajax_copy")?>',
    url_ajax_edit = '<?php echo site_url("admin/$controller/ajax_edit")?>',
    url_ajax_update = '<?php echo site_url("admin/$controller/ajax_update")?>',
    url_ajax_update_field = '<?php echo site_url("admin/$controller/ajax_update_field")?>',
    url_ajax_delete = '<?php echo site_url("admin/$controller/ajax_delete")?>';
    url_ajax_detail = '<?php echo site_url("admin/$controller/ajax_detail")?>';
    url_ajax_update_filter = '<?php echo site_url("admin/$controller/ajax_update_filter")?>';
    url_ajax_detail_product = '<?php echo site_url("admin/$controller/ajax_detail_product")?>';
  <?php endif; ?>
  <?php if(!empty($this->config->item('cms_language'))) foreach ($this->config->item('cms_language') as $lang_code => $lang_name){ ?>
  lang_cnf['<?php echo $lang_code;?>'] = '<?php echo $lang_name;?>';
  <?php } ?>
</script>
<div class="wrapper">
  <?php $this->load->view($this->template_path . '_header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view($this->template_path . '_sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo !empty($heading_title) ? $heading_title : '' ?>
        <small><?php echo !empty($heading_description) ? $heading_description : '' ?></small>
      </h1>
      <?php echo !empty($breadcrumbs) ? $breadcrumbs : ''; ?>
    </section>
    <?php echo !empty($main_content) ? $main_content : ''; ?>
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view($this->template_path . '_footer') ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!--<script type="text/javascript" src="--><?php //echo base_url('/public/admin/').'bower_components/jquery/dist/jquery.min.js' ?><!--"></script>-->
<!--<script type="text/javascript" src="--><?php //echo base_url('/public/admin/').'bower_components/jquery-ui/jquery-ui.min.js' ?><!--"></script>-->
<?php //$asset_jquery[] = '../bower_components/jquery/dist/jquery.min.js'; ?>
<?php //$asset_jquery[] = '../bower_components/jquery-ui/jquery-ui.min.js'; ?>
<?php //minifyJS($asset_jquery) ?>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<?php $asset_js[] = '../bower_components/jquery/dist/jquery.min.js'; ?>
<?php $asset_js[] = '../bower_components/jquery-ui/jquery-ui.min.js'; ?>
<?php $asset_js[] = '../bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net/js/jquery.dataTables.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net-rowreorder/js/dataTables.rowReorder.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net-buttons/js/dataTables.buttons.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net-buttons/js/buttons.print.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net-buttons/js/buttons.html5.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net-buttons/js/buttons.flash.min.js'; ?>
<?php $asset_js[] = '../bower_components/datatables.net-buttons/js/buttons.colVis.min.js'; ?>
<?php $asset_js[] = '../bower_components/moment/min/moment.min.js'; ?>
<?php $asset_js[] = '../bower_components/bootstrap-daterangepicker/daterangepicker.js'; ?>
<?php $asset_js[] = '../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'; ?>
<?php $asset_js[] = '../bower_components/select2/dist/js/select2.min.js'; ?>
<?php $asset_js[] = '../bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js'; ?>
<?php $asset_js[] = '../bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'; ?>
<?php $asset_js[] = 'jquery.nestable.js'; ?>
<?php $asset_js[] = '../bower_components/jquery-slimscroll/jquery.slimscroll.min.js'; ?>
<?php $asset_js[] = '../bower_components/bootstrap-daterangepicker/daterangepicker.js'; ?>
<?php $asset_js[] = '../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'; ?>
<?php $asset_js[] = '../js/bootstrap-datetimepicker.min.js'; ?>
<?php $asset_js[] = '../bower_components/fancybox/dist/jquery.fancybox.min.js'; ?>
<?php $asset_js[] = '../bower_components/PACE/pace.min.js'; ?>
<?php $asset_js[] = '../bower_components/toastr/toastr.min.js'; ?>
<?php $asset_js[] = '../bower_components/bootstrap-sweetalert/dist/sweetalert.min.js'; ?>
<?php $asset_js[] = 'adminlte.min.js'; ?>
<?php $asset_js[] = '../plugins/tinymce/tinymce.min.js'; ?>
<?php $asset_js[] = '../plugins/chart/chart.min.js'; ?>
<?php $asset_js[] = '../plugins/moxiemanager/js/moxman.loader.min.js'; ?>
<?php $asset_js[] = '../bower_components/bs-iconpicker/js/iconset/iconset-fontawesome-4.7.0.js'; ?>
<?php $asset_js[] = '../bower_components/bs-iconpicker/js/bootstrap-iconpicker.min.js'; ?>
<?php $asset_js[] = 'jquery-menu-editor.js'; ?>
<?php $asset_js[] = '../bower_components//jquery-number/jquery.number.min.js'; ?>
<?php $asset_js[] = 'jq-ajax-progress.min.js'; ?>
<?php $asset_js[] = 'main.js'; ?>
<?php minifyJS($asset_js, $this->templates_assets, false, true) ?>

<?php if (!empty($controller)): ?>
    <script type="text/javascript" src="<?php echo $this->templates_assets. 'js/pages/'.$controller.'.js'?>"></script>
    <?php $asset_js[] = 'pages/'.$controller.'.js'; ?>
<?php endif; ?>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script type="text/javascript">
    toastr.options.escapeHtml = true;
    toastr.options.closeButton = true;
    toastr.options.positionClass = "toast-bottom-right";
    toastr.options.timeOut = 5000;
    toastr.options.showMethod = 'fadeIn';
    toastr.options.hideMethod = 'fadeOut';
    toastr.options.progressBar = true;
    <?php if(!empty($this->session->flashdata('message'))): $message = $this->session->flashdata('message'); ?>
    toastr.<?php echo $message['type']; ?>('<?php echo trim(strip_tags($message['message'])); ?>');
    <?php endif; ?>
</script>

</body>
</html>
