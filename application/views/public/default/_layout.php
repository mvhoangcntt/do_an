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
  <meta property = "fb: app_id" content = "{528812527778564}" />
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
  <?php $asset_css[] = 'css/select2.min.css'; ?>
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
  const base_url = '<?php echo base_url(); ?>';
  
  
</script>
<!-- settings account -->
<?php if (!empty($this->session->account['settings']) && $this->session->account['settings'] == 1) { ?>
  <style type="text/css" media="screen">
    .item-news .ct .time{
      display: none;
    }
  </style>
<?php } ?>
<?php if (!empty($this->session->account['settings']) && $this->session->account['settings'] == 2) { ?>
  <style type="text/css" media="screen">
    .discount-pt{
      display: none;
    }
  </style>
<?php } ?>
<?php if (!empty($this->session->account['settings']) && $this->session->account['settings'] == 3) { ?>
  <style type="text/css" media="screen">
    .item-news .ct{
      display: none;
    }
  </style>
<?php } ?>
</head>
<body >
<div class="wrap">
    <?php
      $this->load->view($this->template_path . '_header');
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
<?php $asset_js[] = 'js/save_page_ajax.js'; ?>
<?php $asset_js[] = 'js/select2.min.js'; ?>
<?php //$asset_js[] = 'js/login-facebook.js'; ?>
<?php $asset_js[] = 'js/page-contact.js'; ?>
<?php $asset_js[] = 'js/toastr/toastr.min.js'; ?>
<?php $asset_js[] = 'js/swiper.min.js'; ?>
<?php $asset_js[] = 'js/cart.js'; ?>
<?php if ($controller == 'account') {
  $asset_js[] = 'js/account.js';
} ?>


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

<!-- to top : lên đầu trang -->
<button onclick="topFunction()" id="myBtn" title="Lên đầu trang"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>
<style type="text/css">
#myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 99;
    font-size: 35px;
    border: none;
    outline: none;
    background-color: red;
    color: white;
    cursor: pointer;
    padding: 10px;
    border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
</script>
<!-- end to top -->

<!-- cập nhật lượt xem mỗi ngày -->
<script language="javascript">
  // var d = new Date();
  // alert(d.getMinutes());
  var interval_obj = setInterval(function(){
    var d = new Date();
    if (d.getHours() === '23' && d.getMinutes() === '59') {
      <?php
      if (date('H:i') == '23:59') {
        $this->db = mysqli_connect("localhost","root","","hoan_tuyet");
        $this->utf8 = mysqli_set_charset($this->db,"utf8");
        $sql1 = "UPDATE ap_count_views SET alltime = alltime + day, year = year + day, month = month + day, week = week + day, yesterday = day, day = 0";
        // var_dump($sql1); exit();
        $this->db->query($sql1);
        $time = time();
        if(date('z', $time) == '0') {
          //Ngày đầu tiên trong năm
          $sql = "UPDATE count_views SET year = 0, month = 0, week = 0";
          $this->db->query($sql);
        }else {
          if(date('j', $time) == '1') {
            //Ngày đầu tiên trong tháng
            $sql = "UPDATE count_views SET month = 0, week = 0";
            $this->db->query($sql);
          }else {
            if(date('D', $timestamp) == 'Mon') {
              //Ngày đầu tiên trong tuần (Thứ hai)
              $sql = "UPDATE count_views SET week = 0";
              $this->db->query($sql);
            }
          }
        }
      }
      ?>
    }
  }, 30000);
</script>
</body>
</html>