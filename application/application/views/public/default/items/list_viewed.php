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
    border-radius: 70px;
  }


@media (max-width: 760px) {
  .swiper-button-next {
    right: 20px;
    transform: rotate(90deg);
  }

  .swiper-button-prev {
    left: 20px;
    transform: rotate(90deg);
  }
}
  </style>
  <base href="your_domain/" target="_PARENT">
</head>
<body>
  <!-- Swiper -->
  <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php //var_dump($viewed); ?>
            <?php foreach ($viewed as $news_item): ?>
            <div class="swiper-slide">
              <a href="<?php echo $news_item->url; ?>" title="<?php echo $news_item->title; ?>">
                <img src="<?php echo getImageThumb($news_item->thumbnail, 360, 360); ?>" alt="<?php echo $news_item->title; ?>">
              </a>
            </div>
            <?php endforeach; ?>
            <!-- <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img2.jpg" alt="">
            </div>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>public/images/img1.jpg" alt=""></div> -->
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
  <!-- Swiper JS -->
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/swiper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>public/js/fancybox.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
          slidesPerView: 10,
          direction: getDirection(),
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          on: {
            resize: function () {
              swiper.changeDirection(getDirection());
            }
          }
        });

        function getDirection() {
          var windowWidth = window.innerWidth;
          var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
          return direction;
        }


  </script>


</body>
</html>