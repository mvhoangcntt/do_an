<html lang="en"><head>
  <meta charset="utf-8">
  <title>Slide home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link href="<?php echo base_url() ?>public/css/swiper.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>public/css/fancybox.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>public/css/main.css" rel="stylesheet" type="text/css" />

  <!-- Demo styles -->
  <style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #000;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }
    .swiper-slide {
      background-size: cover;
      background-position: center;
    }
    .gallery-top {
      height: 80%;
      width: 100%;
    }
    .gallery-thumbs {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }
    .gallery-thumbs .swiper-slide-thumb-active {
      opacity: 1;
    }
  </style>
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)">
        <div class="item-album" style="height: 100%">
          <div class="gallery-img">
            <a href="http://localhost/tomita/public/media/thumb/item-abum1-370x240.jpg" class="fancy" data-fancybox="album1"><img style="display: none;" src="http://localhost/tomita/public/media/thumb/item-abum1-370x240.jpg" alt=""></a>
            </div>
        </div>
      </div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)">
        <div class="item-album" style="height: 100%">
          <div class="gallery-img">
            <a href="http://localhost/tomita/public/media/thumb/item-abum2-370x240.jpg" class="fancy" data-fancybox="album1"><img style="display: none;" src="http://localhost/tomita/public/media/thumb/item-abum2-370x240.jpg" alt=""></a>
            </div>
        </div>
      </div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
    </div>
    <!-- Add Arrows -->
    <!-- <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div> -->
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img1.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>public/images/img2.jpg)"></div>
    </div>
  </div>
  <!-- Swiper JS -->
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/swiper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/fancybox.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });


  </script>


</body>
</html>