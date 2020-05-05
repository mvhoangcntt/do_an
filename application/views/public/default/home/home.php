<?php 
$slide1 = getImageThumb($this->settings['home'][$this->session->public_lang_code]['image_home1'],1920,880);
$title1 = !empty($this->settings['home'][$this->session->public_lang_code]['title1']) ? $this->settings['home'][$this->session->public_lang_code]['title1'] : '' ;
$home_link1 = !empty($this->settings['home'][$this->session->public_lang_code]['home_link1']) ? $this->settings['home'][$this->session->public_lang_code]['home_link1'] : '' ;

$slide2 = getImageThumb($this->settings['home'][$this->session->public_lang_code]['image_home2'],1920,880);
$title2 = !empty($this->settings['home'][$this->session->public_lang_code]['title2']) ? $this->settings['home'][$this->session->public_lang_code]['title2'] : '' ;
$home_link2 = !empty($this->settings['home'][$this->session->public_lang_code]['home_link2']) ? $this->settings['home'][$this->session->public_lang_code]['home_link2'] : '' ;

$slide3 = getImageThumb($this->settings['home'][$this->session->public_lang_code]['image_home3'],1920,880);
$title3 = !empty($this->settings['home'][$this->session->public_lang_code]['title2']) ? $this->settings['home'][$this->session->public_lang_code]['title2'] : '' ;
$home_link3 = !empty($this->settings['home'][$this->session->public_lang_code]['home_link3']) ? $this->settings['home'][$this->session->public_lang_code]['home_link3'] : '' ;
 ?>


<div class="slide-home">
    <!-- <iframe data-src="<?php echo base_url() ?>slide_home.php" width = "100%" height = "100%" scrolling="no" frameborder="0" src="<?php echo base_url() ?>slide_home.php"></iframe> -->
    <iframe data-src="http://localhost/do-an/home/slide" width = "100%" height = "100%" scrolling="no" frameborder="0" src="http://localhost/do-an/home/slide"></iframe>
</div>
<div class="container">
    <div class="row div-new-product">
        <div class="col-lg-6 col-md-6">
            <h2>Sản phẩm mới nhất</h2>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="new-product">
                <div><a href="">Quần áo</a></div>
                <div><a href="">Giày dép</a></div>
                <!-- <div><a href="">Túi sách</a></div> -->
                <div><a href="">Phụ kiện</a></div>
            </div>
        </div>
    </div>
</div>
<section class="page-home">
    <div class="container page-home-border">
        <div class="row"><div class="tieude"><div class="tieude_"><div class="_left">Sản phẩm mới nhất</div><div class="_right"><a href="">Xem Thêm</a><i class="fa fa-caret-right" aria-hidden="true"></i></div></div></div></div>
        <div class="list-news">
            <div class="row">
                <?php foreach ($moinhat as $news_item): ?>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="item-news">
                            <a href="<?php echo base_url('details/'.$news_item->slug.'-p'.$news_item->id); ?>" title="<?php echo $news_item->title; ?>" class="img"><img src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>"></a>
                            <div class="ct">
                                <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>">
                                    <span class="time">
                                        <?php echo $news_item->title; ?>
                                    </span>
                                    <div class="discount-pt">
                                        <div class="discount-pt-text-decoration"><?php echo number_format($total = $news_item->price + $news_item->discount); ?> đ </div>
                                        <div> - <?php echo round(($news_item->discount/$total)*100,1); ?>%</div>
                                    </div>
                                </a>
                                <h3 class="title"><a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>"><?php echo number_format($news_item->price)?> đ</a></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>


        <div class="row"><div class="tieude"><div class="tieude_"><div class="_left">Bộ sưu tập</div><div class="_right"><a href="">Xem Thêm</a><i class="fa fa-caret-right" aria-hidden="true"></i></div></div></div></div>
        <div class="list-news">
            <div class="row">
                <?php foreach ($bosuutap as $news_item): ?>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="item-news">
                            <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>" class="img"><img src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>"></a>
                            <div class="ct">
                                <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>">
                                    <span class="time">
                                        <?php echo $news_item->title; ?>
                                    </span>
                                    <div class="discount-pt">
                                        <div class="discount-pt-text-decoration"><?php echo number_format($total = $news_item->price + $news_item->discount); ?> đ </div>
                                        <div> - <?php echo round(($news_item->discount/$total)*100,1); ?>%</div>
                                    </div>
                                </a>
                                <h3 class="title"><a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>"><?php echo number_format($news_item->price)?> đ</a></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="row"><div class="tieude"><div class="tieude_"><div class="_left">Xu hướng tìm kiếm</div><div class="_right"><a href="">Xem Thêm</a><i class="fa fa-caret-right" aria-hidden="true"></i></div></div></div></div>
        <div class="list-news">
            <div class="row">
                <?php foreach ($timkiem as $news_item): ?>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="item-news">
                            <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>" class="img"><img src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>"></a>
                            <div class="ct">
                                <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>">
                                    <span class="time">
                                        <?php echo $news_item->title; ?>
                                    </span>
                                    <div class="discount-pt">
                                        <div class="discount-pt-text-decoration"><?php echo number_format($total = $news_item->price + $news_item->discount); ?> đ </div>
                                        <div> - <?php echo round(($news_item->discount/$total)*100,1); ?>%</div>
                                    </div>
                                </a>
                                <h3 class="title"><a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>"><?php echo number_format($news_item->price)?> đ</a></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="row"><div class="tieude"><div class="tieude_"><div class="_left">Dành riêng cho bạn</div><div class="_right"><a href="">Xem Thêm</a><i class="fa fa-caret-right" aria-hidden="true"></i></div></div></div></div>
        <div class="list-news">
            <div class="row">
                <?php foreach ($giamgia as $news_item): ?>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="item-news">
                            <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>" class="img"><img src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>"></a>
                            <div class="ct">
                                <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>">
                                    <span class="time">
                                        <?php echo $news_item->title; ?>
                                    </span>
                                    <div class="discount-pt">
                                        <div class="discount-pt-text-decoration"><?php echo number_format($total = $news_item->price + $news_item->discount); ?> đ </div>
                                        <div> - <?php echo round(($news_item->discount/$total)*100,1); ?>%</div>
                                    </div>
                                </a>
                                <h3 class="title"><a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>"><?php echo number_format($news_item->price)?> đ</a></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?> 
            </div>
        </div>
        <div class="row"><div class="tieude"><div class="tieude_"><div class="_left">Phụ kiện</div><div class="_right"><a href="">Xem Thêm</a><i class="fa fa-caret-right" aria-hidden="true"></i></div></div></div></div>
        <div class="list-news">
            <div class="row">
                <?php foreach ($bosuutap as $news_item): ?>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="item-news">
                            <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>" class="img"><img src="<?php echo base_url('public/media/'.$news_item->thumbnail); ?>" alt="<?php echo $news_item->title; ?>"></a>
                            <div class="ct">
                                <a href="<?php echo base_url('public/media/'.$news_item->slug); ?>">
                                    <span class="time">
                                        <?php echo $news_item->title; ?>
                                    </span>
                                    <div class="discount-pt">
                                        <div class="discount-pt-text-decoration"><?php echo number_format($total = $news_item->price + $news_item->discount); ?> đ </div>
                                        <div> - <?php echo round(($news_item->discount/$total)*100,1); ?>%</div>
                                    </div>
                                </a>
                                <h3 class="title"><a href="<?php echo base_url('public/media/'.$news_item->slug); ?>" title="<?php echo $news_item->title; ?>"><?php echo number_format($news_item->price)?> đ</a></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>         
            </div>
            <!-- <nav aria-label="Page navigation">
                <div class="page"><ul class="pagination justify-content-center"><li class="active page-item"><a class="page-link">1</a></li><li class="page-item"><a href="http://localhost/tomita/news/2" class="page-link" data-ci-pagination-page="2">2</a></li><li class="page-item"><a href="http://localhost/tomita/news/2" class="page-link" data-ci-pagination-page="2" rel="next"><span class="arrow_right"></span></a></li></ul></div>
            </nav> -->
        </div>
    </div>
</section>

<!-- footer -->
 

