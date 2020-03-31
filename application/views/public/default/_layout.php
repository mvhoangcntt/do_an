<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$controller = $this->router->fetch_class();
$method = $this->router->fetch_method();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo !empty($heading_title) ? $heading_title : 'Hoàn Tuyết' ?> | Thái Nguyên</title>
  <link rel="icon"
        href="<?php echo !empty($this->settings['favicon']) ? getImageThumb($this->settings['favicon']) : base_url("/public/favicon.ico"); ?>"
        sizes="32x32">
  <link rel="icon"
        href="<?php echo !empty($this->settings['favicon']) ? getImageThumb($this->settings['favicon'], 32, 32) : base_url("/public/favicon.ico"); ?>"
        sizes="32x32">
  <link rel="icon"
        href="<?php echo !empty($this->settings['favicon']) ? getImageThumb($this->settings['favicon'], 192, 192) : base_url("/public/favicon.ico"); ?>"
        sizes="192x192">
  <link rel="apple-touch-icon-precomposed"
        href="<?php echo !empty($this->settings['favicon']) ? getImageThumb($this->settings['favicon'], 180, 180) : base_url("/public/favicon.ico"); ?>">
  <meta name="msapplication-TileImage"
        content="<?php echo !empty($this->settings['favicon']) ? getImageThumb($this->settings['favicon'], 270, 270) : base_url("/public/favicon.ico"); ?>">
        
  <!-- từ đây -->
  <?php $asset_css[] = 'css/bootstrap.min.css'; ?>
  <?php $asset_css[] = 'css/animate.css'; ?>
  <?php $asset_css[] = 'css/owl.carousel.min.css'; ?>
  <?php $asset_css[] = 'css/fancybox.css'; ?>
  <?php $asset_css[] = 'css/slick.css'; ?>
  <?php $asset_css[] = 'css/main.css'; ?>
  <?php $asset_css[] = 'fonts/font-awesome/css/font-awesome.min.css'; ?>
  <?php $asset_css[] = 'fonts/elegantIcon/elegantIcon.css'; ?>
  <?php $asset_css[] = 'js/toastr/toastr.min.css'; ?>
  <?php $asset_css[] = 'css/product.css'; ?>
  <?php $asset_css[] = 'css/swiper.min.css'; ?>

  <?php $this->minify->css($asset_css);
  echo $this->minify->deploy_css(); ?>


<script type="text/javascript">
  <?php if(!empty($controller)): ?>
    var url_save = '<?php echo site_url("$controller/post_contact"); ?>';
  <?php endif; ?>
</script>

</head>
<body >
<div class="wrap">
    <?php
      $this->load->view($this->template_path . '_header2');
      echo !empty($main_content) ? $main_content : '';
      $this->load->view($this->template_path . '_footer');
    ?>
</div>



<?php $asset_js[] = 'js/jquery.js'; ?>
<?php $asset_js[] = 'js/bootstrap.min.js'; ?>
<?php $asset_js[] = 'js/owl.carousel.min.js'; ?>
<?php $asset_js[] = 'js/slick.min.js'; ?>
<?php $asset_js[] = 'js/wow.min.js'; ?>
<?php $asset_js[] = 'js/scrollspy.js'; ?>
<?php $asset_js[] = 'js/fancybox.js'; ?>
<?php $asset_js[] = 'js/jquery.sticky-kit.js'; ?>
<?php $asset_js[] = 'js/script.js'; ?>
<?php $asset_js[] = 'js/page-contact.js'; ?>
<?php $asset_js[] = 'js/toastr/toastr.min.js'; ?>
<?php $asset_js[] = 'js/swiper.min.js'; ?>


<?php $this->minify->js($asset_js);
echo $this->minify->deploy_js(); ?>


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