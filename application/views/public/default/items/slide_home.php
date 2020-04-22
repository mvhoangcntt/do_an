<html lang="en"><head>
  <meta charset="utf-8">
  <title>Slide home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link href="<?php echo base_url() ?>public/css/swiper.min.css" rel="stylesheet" type="text/css" />

  <!-- Demo styles -->
  <style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    .swiper-slide img{
      width: 100%;
    }
  </style>
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1 <?php echo $abc; ?></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/media/img-about2.jpg" alt="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018"></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/slide-home.jpg" alt="THÔNG BÁO ĐÓNG CỬA TOMITA MART - TRUNG HÒA TỪ NGÀY 28/07/2018"></div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div>
            <div class="swiper-slide">Slide 10</div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
  <!-- Swiper JS -->
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper_home = new Swiper('.swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 5500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
  </script>


</body>
</html>